@extends('layouts.app')
@section('content')

<searchcontent-component :wordsearch="'{{$word}}'"></searchcontent-component>
@endsection