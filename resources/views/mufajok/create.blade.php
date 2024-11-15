<!-- resources/views/cars/create.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Új könyv hozzáadása</h1>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="/new-genre" method="POST">
    @csrf
    <div class="form-group">
        <label for="mufaj">Műfaj</label>
        <input type="text" name="mufaj" id="mufaj" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Mentés</button>
</form>
@endsection
