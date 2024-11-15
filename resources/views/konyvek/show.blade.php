<!-- resources/views/cars/show.blade.php -->
@extends('layouts.app')

@section('content')
<h1>{{ $konyv->cim }} részletei</h1>

<p>Szerző: {{ $konyv->cim }}</p>
<p>Műfaj: {{ $könyv->mufaj }}</p>
<p>Kiadási Éve: {{ $konyv->kiadasev }}</p>

<h2>Kölcsönzés létrehozása</h2>

<form action="/foglalas" method="POST">
    @csrf
    <input type="hidden" name="konyv_id" value="{{ $konyv->id }}">
    <div class="form-group">
        <label for="email">Email cím</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="rent_start">Kölcsönzés kezdete</label>
        <input type="date" name="rent_start" id="rent_start" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Kölcsönzés indítása</button>
</form>
@endsection
