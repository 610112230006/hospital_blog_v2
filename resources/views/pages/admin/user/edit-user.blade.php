@extends('layouts.app')
@section('content')
    <edituser-component :id_user="{{ $id_user }}"></edituser-component>
@endsection
