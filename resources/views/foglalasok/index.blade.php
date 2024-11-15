<!-- resources/views/rents/index.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Bérlések listája</h1>

@foreach ($foglalasok as $foglalas)
    <div class="foglalas-item">
        <p>Email: {{ $foglalas->email }}</p>
        <p>Könyv: {{ $foglalas->konyv->cim }}</p>
        <p>Kezdés: {{ $foglalas->rent_start }}</p>
        <p>Befejezés: {{ $foglalas->rent_end ?? 'Folyamatban' }}</p>
        @if (is_null($foglalas->rent_end))
            <a href="/foglalasok/{{ $foglalas->id }}" class="btn btn-warning">Visszavétel</a>
        @endif
    </div>
@endforeach
@endsection
