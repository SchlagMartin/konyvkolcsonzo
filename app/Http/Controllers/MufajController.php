<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mufaj;


class MufajController extends Controller
{
    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'mufaj' => 'required|string',
    ]);

    Mufaj::create($request->all());

    return redirect('/mufajok')->with('success', 'A műfaj sikeresen hozzáadva.');
}
public function show($id)
{
    $mufaj = Mufaj::findOrFail($id);
    return view('mufaj.show', compact('mufaj'));
}
}
