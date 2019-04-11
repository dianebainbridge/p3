@extends('layouts.master')

@section('title')
    View Fuel Log
@endsection

@section('head')
@endsection

@section('pageTitle')
    <h2>View Fuel Log</h2>
@endsection

@section('content')
    <table id="table" class="table table-striped table-bordered table-hover table-condensed" style=width:75%>
        <thead>
        <tr>
            <th data-field="date">Date</th>
            <th data-field="distance">Distance</th>
            <th data-field="fuel">Fuel</th>
            <th data-field="fuelConsumption">Fuel Consumption</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($fuelLog))
            @foreach($fuelLog as $logEntry)
                <tr>
                    <td>{{ $logEntry['date']}}</td>
                    <td>{{ $logEntry['distance'] }}</td>
                    <td>{{ $logEntry['fuel']}}</td>
                    <td>{{ $logEntry['fuelConsumption'] }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
