@extends('layouts.master')

@section('content')

    <h1>Here Is Your FrankenIpsum Text</h1>

    <div class='lorem'>
        {!! $lorem !!}
    </div>

@endsection
