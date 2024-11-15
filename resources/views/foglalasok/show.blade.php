<!-- resources/views/rents/show.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Bérlés részletei</h1>

<p>Email: {{ $foglalas->email }}</p>
<p>Könyv: {{ $foglalas->konyv->cim }}</p>
<p>Kölcsönzés kezdete: {{ $rent->rent_start }}</p>
<p>Kölcsönzés vége: {{ $rent->rent_end ?? 'Folyamatban' }}</p>

@if (is_null($foglalas->rent_end))
    <h2>Visszavétel</h2>

    <form action="/foglalasok/{{ $foglalas->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="rent_end">Visszavétel dátuma</label>
            <input type="date" name="rent_end" id="rent_end" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Visszavétel</button>
    </form>
@endif
@endsection
