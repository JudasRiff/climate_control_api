@extends('templates.main')

@section('title', 'Device toevoegen')

@section('content')
    <a href="/">&leftarrow; Ga terug</a>
    <h1>Device toevoegen</h1>

    <form method="POST" action="/new_device">
        @csrf
        <div class="form-group" style="width:50%">
            <label for="device_name">Apparaatnaam:</label>
            <input type="text" class="form-control" name="device_name" required>
        </div>
        <div class="form-group" style="width:50%">
            <label for="school">School:</label>
            <input type="text" class="form-control" name="school" required>
        </div>
        <div class="form-group" style="width:50%">
            <label for="lokaal">Klaslokaal:</label>
            <input type="text" class="form-control" name="lokaal" required>
        </div>
        <div class="form-group" style="width:50%">
            <label for="max_people">Max aantal mensen:</label>
            <input type="text" class="form-control" name="max_people" required>
        </div>
        <div class="form-group" style="width:50%">
            <label for="max_temp">Max temperatuur:</label>
            <input type="text" class="form-control" name="max_temp" required>
        </div>
        <button type="submit" name="UpdateItem" class="btn btn-primary">Submit</button>
    </form>
@endsection