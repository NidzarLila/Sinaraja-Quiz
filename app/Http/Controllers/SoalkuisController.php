<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Http\Request;

class SoalkuisController extends Controller
{
    //
    public function index()
    {   
        $soal = Soal::all();
        return view('admin.soalkuis.index', compact('soal'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'pilihan' => 'required|array|min:1',
            'pilihan.*' => 'required|string',
            'jawaban' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        

        $pilihan = $request->pilihan;
        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');
        }
        Soal::create([
            'pertanyaan' => $request->pertanyaan,
            'pilihan' => json_encode($pilihan), // Konversi array menjadi string JSON
            'jawaban' => $request->jawaban,
            'gambar' => $gambarPath,
        ]);
        return redirect('soalkuis')->with('pesan', 'Data berhasil ditambahkan');
    }
}
