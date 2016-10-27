@extends('layouts.master')

@section('content')

    <h1>Here Is Your FrankenIpsum Text</h1>

    <a href="index.php" class="return">Back to the tools</a>

    <div class='lorem'>
        {!! $lorem !!}
    </div>

@endsection
