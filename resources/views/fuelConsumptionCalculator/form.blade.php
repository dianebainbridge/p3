@extends('layouts.master')

@section('head')
    <link href='/css/fuelCalculator/form.css' rel='stylesheet'>
@endsection

@section('pageTitle')
    <h2 class="header">Fuel Consumption Calculator</h2>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6">
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
        </div>
        <div class="col-sm-6">
            <form method='GET' action='/fuelConsumptionCalculator/form-process'>
                <div class="form-group">
                    <i class="fas fa-tachometer-alt"></i><!--fontawesome kind of odometer icon-->
                    <label for="startDistance">Odometer reading - last fill-up </label>
                    <input id="startDistance" name="startDistance" type="number" value="{{ old('startDistance') }}"/>
                    {{-- Display the first error if there are any fof this input --}}
                    @if($errors->get('startDistance'))
                        <div class='error'>{{ $errors->first('startDistance') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <i class="fas fa-tachometer-alt"></i>
                    <label for="endDistance">Odometer reading - this fill-up </label>
                    <input id="endDistance" name="endDistance" type="number" value="{{ old('endDistance') }}"/>
                    {{-- Display the first error if there are any fof this input --}}
                    @if($errors->get('endDistance'))
                        <div class='error'>{{ $errors->first('endDistance') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    Select miles or kilometers
                    <br/>
                    <label class="radio-inline" for="miles">
                        <input type="radio" name="distanceUnit" value="miles"
                               {{-- If the old value i "miles" check this radio input--}}
                               @if (old('distanceUnit')=="miles")
                               checked="checked"
                                @endif
                        >Miles
                    </label>
                    <label class="radio-inline" for="kilometers">
                        <input type="radio" id="kilometers" name="distanceUnit" value="kilometers"
                               {{-- If the old value i "kilometers" check this radio input--}}
                               @if (old('distanceUnit')=="kilometers")
                               checked="checked"
                                @endif
                        >Kilometers
                    </label>
                    {{-- Display the first error if there are any fof this input --}}
                    @if($errors->get('distanceUnit'))
                        <div class='error'>{{ $errors->first('distanceUnit') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <i class="fas fa-gas-pump"></i>
                    <label for="fuelVolume">Fuel Reading from Gas Pump </label>
                    <input id="fuelVolume" name="fuelVolume" type="text" value="{{old('fuelVolume')}}"/>
                    @if($errors->get('fuelVolume'))
                        <div class='error'>{{ $errors->first('fuelVolume') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="volumeUnit">Select option</label>
                    <select id="volumeUnit" name="volumeUnit" class="custom-select volumeUnit">
                        <option value="">&#160;</option>
                        <option value="gallon"
                                {{-- If the old value is "gallon" select this option--}}
                                @if (old('volumeUnit')=="gallon")
                                selected
                                @endif
                        >
                            Gallons
                        </option>
                        <option value="liter"
                                {{-- If the old value is "liter" select this option--}}
                                @if (old('volumeUnit')=="liter")
                                selected
                                @endif
                        >
                            Liters
                        </option>
                    </select>
                    {{-- Display the first error if there are any fof this input --}}
                    @if($errors->get('volumeUnit'))
                        <div class='error'>{{ $errors->first('volumeUnit') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="addLog" class="checkbox-inline">
                        <input type="checkbox" id="addLog" name="addLog"
                               {{-- If the old value is "on" select this option--}}
                               @if (old('addLog')=="on")
                               checked="checked"
                                @endif
                        ><b>Add to log</b>
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Calculate</button>
                </div>
                {{-- Display the fuel calculation if there are no errors or the erorrs if there are errors--}}
                <div class="outcome">
                    @if(count($errors)==0)
                        @if(!empty($fuelConsumed))
                            <p class="calculationResult">
                                Fuel Consumed : {{$fuelConsumed}}  {{$distanceUnit}}/{{$volumeUnit}}
                            </p>
                        @endif
                    @else
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection