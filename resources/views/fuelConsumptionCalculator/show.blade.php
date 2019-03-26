@extends('layouts.master')

@section('title')
    Fuel Consumption Calculator
@endsection

@section('head')
    <link href='/css/fuelCalculator/show.css' rel='stylesheet'>
@endsection

@section('content')
<div class="content">
    <h1 class="header">Fuel Consumption Calculator</h1>
    <p class="subHeader">Use the steps below to calculate your fuel consumption.</p>
    <ol>
        <li>Enter the odometer reading from the last time you filled your gas tank.</li>
        <li>Enter the odometer reading at the time of your current fill up.</li>
        <li>Enter the amount of fuel required to completely fill your tank at this fill up.</li>
        <li>Be sure to select the units you are using to measure your distance and the amount of gas.</li>
    </ol>
    <p class="note">
        Note: before you use this the first time completely fill up your gas tank
        and save the distance read from your odometer.
    </p>
    <table id="formTable">
        <tr>
            <td class="leftTD">
                <label for="startDistance">Odometer reading - last fill-up </label>
                <input id="startDistance" name="startDistance" type="text"/>
                // value="<?= $results['startDistance'] ?? ''; ?>"

                <p class="attention">*required, must be greater than 0</p>
                <label for="endDistance">Odometer reading - this fill-up </label>
                <input id="endDistance" name="endDistance" type="text"/>

                <p class="attention">*required, must be greater than 0</p>
            </td>
            <td class="rightTD">
                <input type="radio" name="distanceUnit" id="miles" value="miles"/>
                <label for="miles">Miles</label>
                <br/>
                <input type="radio" name="distanceUnit" id="kilometers" value="kilometers"/>

                <label for="kilometers">Kilometers</label>
                <p class="attention">*required, one option must be selected.</p>
            </td>
        </tr>
        <tr>
            <td class="leftTD">
                <label for="fuelVolume">Fuel Reading from Gas Pump </label>
                <input id="fuelVolume" name="fuelVolume" type="text"/>

                <p class="attention">*required, must be greater than 0</p>
            </td>
            <td class="rightTD">
                <select id="volumeUnit" name="volumeUnit">
                    <option value="">&#160;</option>
                    <option value="gallon">
                        Gallons
                    </option>
                    <option value="liter">
                        Liters
                    </option>
                </select>
                <label for="volumeUnit">Select option</label>
                <p class="attention">*required, one option must be selected</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="buttonTD">
                <input type='submit' value='Calculate Fuel Consumption'>
            </td>
        </tr>
    </table>
</div>
@endsection


