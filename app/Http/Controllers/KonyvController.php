<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Konyv;

class KonyvController extends Controller
{
    public function create()
    {
        return view('konyvek.create');
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

public function index(Request $request)
{
    $query = Konyv::query();

    if ($request->has('cim') && $request->cim != '') {
        $query->where('cim', 'like', '%' . $request->cim . '%');
    }

    if ($request->has('szerzo') && $request->szerzo != '') {
        $query->where('szerzo', $request->szerzo);
    }

    $query->whereDoesntHave('foglalasok', function ($query) {
        $query->whereNull('rent_end');  
    });

    $konyvek = $query->get(); 

    return view('konyvek.index', compact('konyvek')); 
}
public function show($id)
{
    $konyv = Konyv::findOrFail($id);
    return view('konyvek.show', compact('konyv'));
}
}
