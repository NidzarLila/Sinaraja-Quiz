<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materi = Materi::all();
        return view('admin.materi.index', compact('materi'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'materi' => 'required|string|max:65535', // Pastikan panjang maksimal cukup besar
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
        }

        Materi::create([
            'materi' => $request->materi,
            'gambar' => $path,
        ]);

        return redirect('materi')->with('pesan', 'Data berhasil ditambahkan');
    }
    public function update(Request $request, $id)
    {
        $materi = Materi::find($id);
        $materi->update($request->all());
        return redirect('materi')->with('pesan', 'Data berhasil diubah');
    }
    public function destroy($id)
    {
        $materi = Materi::find($id);
        $materi->delete();
        return redirect('materi')->with('pesan', 'Data berhasil dihapus');
    }
}
