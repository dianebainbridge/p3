<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class FuelConsumptionController extends Controller
{
    public function index()
    {
        return view('fuelConsumptionCalculator.form');
    }

    /*
     * GET /books/getForm
     */
    public function showForm(Request $request)
    {
        $startDistance = $request->session()->get('startDistance', 0);
        $endDistance = $request->session()->get('endDistance', 0);
        $fuelVolume = $request->session()->get('fuelVolume', 0);
        $distanceUnit = $request->session()->get('distanceUnit', '');
        $volumeUnit = $request->session()->get('volumeUnit', '');
        $fuelConsumed = $request->session()->get('fuelConsumed', 0);

        return view('fuelConsumptionCalculator.form')->with([
            'startDistance' => $startDistance,
            'endDistance' => $endDistance,
            'fuelVolume' => $fuelVolume,
            'distanceUnit' => $distanceUnit,
            'volumeUnit' => $volumeUnit,
            'fuelConsumed' => $fuelConsumed,
        ]);
    }

    /*
     * GET //formProcess
     */
    public function formProcess(Request $request)
    {
        # Validate the form request
        $request->validate([
            'startDistance' => 'required|numeric|min:1',
            'endDistance' => 'required|numeric|min:1|gt:startDistance',
            'fuelVolume' => 'required|numeric|min:1',
            'distanceUnit' => 'required',
            'volumeUnit' => 'required'
        ]);

        # Store the startDistance, endDistance and fuelVolume in a variable for easy access
        # The second parameter (null) is what the variable
        # will be set to *if* the value is not in the request.

        $startDistance = $request->input('startDistance', null);
        $endDistance = $request->input('endDistance', null);
        $fuelVolume = $request->input('fuelVolume', null);
        $distanceUnit = $request->input('distanceUnit', null);
        $volumeUnit = $request->input('volumeUnit', null);
        $addLog = $request->input('addLog', null);

        #If startDistance, endDistance and fuelVolume are not nulland the request has no errors calculate fuel consumed
        $fuelConsumed = 0;
        if (!$request->hasErrors && $startDistance && $endDistance && $fuelVolume) {
            #calculate fuel consumed - this is intentionally without units so you could calculate miles/liter if desired
            $distance = (float)number_format($endDistance - $startDistance, 1, '.', '');
            $fuelConsumed = (float)number_format($distance / $fuelVolume, 1, '.', '');
        }

        #If the add log checkbox is checked add the data to the json file
        #If a cookie is already set get the fuelCalc d for this user and add to log with user's id
        if($addLog == "on")
        {
            $fuelCalcID = "";
            if (isset($_COOKIE["fuelCalcID"])) {
                $fuelCalcID = $_COOKIE["fuelCalcID"];
            }
            #create a fuelID for this user and set cookie
            else {
                $fuelCalcID = "8";
                setcookie("fuelCalcID", $fuelCalcID, time() + 180 * 24 * 60 * 60, "/", ".p3.dianebainbridge.com");
            }
            $fuelConsumption = $fuelConsumed . " " . $distanceUnit . " / " . $volumeUnit;
            $today = date("m/d/y");
            $data = (object) array(
                'fuelCalcID' => $fuelCalcID,
                'date' => $today,
                'distance' => $distance,
                'fuel' => $fuelVolume,
                'fuelConsumption' => $fuelConsumption,
            );
            $inp = file_get_contents(database_path('/fuelLog.json'));
            $tempArray = json_decode($inp);
            array_push($tempArray, $data);
            $jsonData = json_encode($tempArray);
            file_put_contents(database_path('/fuelLog.json'), $jsonData);
            return redirect('/fuelConsumptionCalculator/get-fuel-log');
        }
        # Redirect the user page to the page that shows the form
        return redirect('/fuelConsumptionCalculator/show-form')->with([
            'fuelConsumed' => $fuelConsumed,
            'startDistance' => $startDistance,
            'endDistance' => $endDistance,
            'fuelVolume' => $fuelVolume,
            'distanceUnit' => $request->get('distanceUnit'),
            'volumeUnit' => $request->get('volumeUnit'),
        ]);
    }

    public function getFuelLog()
    {
        #If a cookie is already set get the id for this user and add log entries with user's id
        $fuelCalcID = "";
        if (isset($_COOKIE["fuelCalcID"])) {
            $fuelCalcID = $_COOKIE["fuelCalcID"];
        }
        $log = [];
        #If the user has added entries to the log in the last 6 months they should have a cookie set
        #Note ideally I would use a database here but we have covered databases yet so I am using cookies which may not always be available
        if ($fuelCalcID != "") {
            # Start with an empty array of log entries that
            # match the cookie value
            $log = [];
            # Open the fuelLog.json data file
            $fuelLogData = file_get_contents(database_path('/fuelLog.json'));

            # Decode the book JSON data into an array
            $logEntries = json_decode($fuelLogData, true);

            # Loop through all the log data, looking for matches
            foreach ($logEntries as $logEntry) {
                if ($logEntry['fuelCalcID'] == $fuelCalcID) {
                    # If it was a match, add it to our results
                    $log[] = $logEntry;
                }
            }
        }
        return view('fuelConsumptionCalculator.viewLog')->with([
            'fuelLog' => $log,
        ]);
    }
}
