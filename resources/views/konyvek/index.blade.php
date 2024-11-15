@extends('layouts.app')

@section('content')
<h1>Elérhető autók</h1>

<!-- Sikerüzenet megjelenítése, ha van -->
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Elérhető autók listázása -->
@foreach ($konyvek as $konyv)
    <div class="konyv-item mb-3">
        <h3>{{ $konyv->cim }}</h3>
        <p>Szerző: {{ $konyv->szerzo }}</p>
        <p>Műfaj: {{ $konyv->mufaj }}</p>
        <p>Kiadási éve: {{ $konyv->kiadasev }}</p>
        <a href="{{ route('konyvek.show', $konyv->id) }}" class="btn btn-info">Megnézem</a>
    </div>
@endforeach
@endsection
