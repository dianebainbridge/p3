@extends('layouts.master')

@section('pageTitle')
    <h2>About</h2>
@endsection

@section('content')
    <p>
        The Fuel Consumption Calculator came about because of my husband's infatuation with his car's gas mileage.
        Each time we stop for gas he pulls out a little notebook and records the gallons of gas he uses and his current mileage.
        Hopefully this application will help him with his calculations and I won't have to wait so long at the pumps!
    </p>
    <p>
        The source code for this project can be viewed here:
        <a href='{{ config('app.githubUrl') }}'>{{ config('app.githubUrl') }}</a>
    </p>
@endsection