@extends('layouts.master')

@section('content')

    <div id='lorem'>

        <h1>Lorem Ipsem Generator</h1>

        <p>Create paragraphs of fake text for use in mockups</p>

        <form method='POST' action='/lorem'>
            {{ csrf_field() }}
            How many paragraphs? <input type='integer' name='paraCount'>
            <input type='submit' value='Get Paragraphs' name='lorem'>
        </form>

    </div>

    <div id='users'>

        <h1>Users Generator</h1>

        <form method='POST' action='/users'>
            {{ csrf_field() }}
            <label>How many users? <input type='integer' name='userCount'></label><br/>
            <label><input type='checkbox' name='birthdate' value='birthdate'> Include birthdate</label><br/>

            <input type='submit' value='Get Users' name='/users'>
        </form>

    </div>

@endsection
