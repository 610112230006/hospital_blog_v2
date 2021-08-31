@extends('layouts.app')
@section('content')
    {{-- {{Auth::user()}} --}}
    <usereditpersonal-component :user="{{Auth::user()}}"></usereditpersonal-component>
@endsection