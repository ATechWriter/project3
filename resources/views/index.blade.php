@extends('layouts.master')

@section('content')

    <div id='lorem'>

        <h1>FrankenIpsem Generator</h1>

        <p>Create paragraphs of fake text for use in mockups with words pulled from Mary Shelley's classic novel <i>Frankenstein; Or, The Modern Prometheus</i></p>

        <form method='POST' action='/lorem'>
            {{ csrf_field() }}
            How many paragraphs? <input type='integer' name='paraCount'>
            <input type='submit' value='Get Paragraphs' name='lorem'>
            @if(count($errors) > 0)
                <ul class='errors'>
                    @foreach ($errors->get('paraCount') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>

    </div>

    <div id='users'>

        <h1>Users Generator</h1>

        <p>Generate fake users</p>

        <form method='POST' action='/users'>
            {{ csrf_field() }}
            <label>How many users? <input type='integer' name='userCount'></label><br/>

            @if(count($errors) > 0)
                <ul class='errors'>
                    @foreach ($errors->get('userCount') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <br/>

            <label><input type='checkbox' name='birthdate'> Include birthdate</label><br/><br/>


            <input type='submit' value='Get Users' name='/users'>
        </form>

    </div>

@endsection
