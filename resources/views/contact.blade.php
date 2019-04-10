@extends('layouts.master')

@section('pageTitle')
    <h2>Contact</h2>
@endsection

@section('content')
    <i class="far fa-envelope"></i>&#160;<a href="mailto:{{ config('mail.supportEmail') }}">{{ config('app.name')}}
        Support</a>
@endsection