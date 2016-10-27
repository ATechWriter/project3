@extends('layouts.master')

@section('content')

    <h1>Here Are Your Fake Users</h1>

        <a href="index.php" class="return">Back to the tools</a>

        <p> {!! $usersTable !!} </p>

@endsection
