<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foglalas;
use App\Models\Konyv;
use Carbon\Carbon;

class FoglalasController extends Controller
{
    // Bérlés létrehozása
    public function store(Request $request)
    {
        // Validálás
        $request->validate([
            'konyv_id' => 'required|exists:konyvek,id', // Az autó létezését ellenőrizzük
            'email' => 'required|email',
            'rent_start' => 'required|date',
        ]);

        // Ellenőrizzük, hogy az autó nem foglalt-e
        $konyv = Konyv::findOrFail($request->konyv_id);
        $existingRent = Foglalas::where('konyv_id', $konyv->id)
                            ->whereNull('rent_end') // Csak aktív bérlés esetén
                            ->first();

        if ($existingRent) {
            return redirect()->back()->withErrors('Ez az konyv már bérbe van véve!');
        }

        // Bérlés rögzítése
        Foglalas::create($request->all());

        return redirect('/foglalasok')->with('success', 'A kölcsönzés sikeresen létrehozva.');
    }

    // Bérlés lista
    public function index()
    {
        $foglalasok = Foglalas::all();
        return view('foglalsok.index', compact('foglalasok'));
    }

    // Bérlés részletei
    public function show($id)
    {
        $foglalas = Foglalas::findOrFail($id);
        return view('foglalasok.show', compact('foglalas'));
    }

    // Bérlés frissítése (visszavétel)
    public function update(Request $request, $id)
    {
        // Validálás
        $request->validate([
            'rent_end' => 'required|date'
        ]);

        // Bérlés és autó lekérése
        $foglalas = Foglalas::findOrFail($id);
        $konyv = $foglalas->konyv;

        // Ha nincs kapcsolódó autó, hibaüzenet
        if (!$konyv) {
            return redirect('/konyvek')->withErrors('Hiba: A konyv nem található.');
        }

        // Bérlés időszakának napjai
        $days = Carbon::parse($konyv->rent_start)->diffInDays(Carbon::parse($request->rent_end)) + 1;

        // Bérlés frissítése
        $foglalas->update([
            'rent_end' => $request->rent_end
        ]);

        // Visszajelzés a felhasználónak
        return redirect('/foglalasok')->with('success', 'A kölcsönzés sikeresen lezárva. ');
    }
}

