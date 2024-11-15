<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Konyv;

class KonyvController extends Controller
{
    public function create()
    {
        return view('konyv.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'cim' => 'required|string',
        'szerzo' => 'required|string',
        'mufaj' => 'required|string',
        'kiadasev' => 'required|date',
    ]);

    Konyv::create($request->all());

    return redirect('/konyvek')->with('success', 'Az könyv sikeresen hozzáadva.');
}
}
