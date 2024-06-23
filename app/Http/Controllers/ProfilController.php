<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::all();
        return view('admin.profil.index', compact('profil'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'ttl' => 'required|string',
            'univ' => 'required|string',
            'prodi' => 'required|string',
        ]);
         $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('images', 'public');
        }
        Profil::create([

            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'univ' => $request->univ,
            'prodi' => $request->prodi,
            'foto' => $path,

        ]);
       
      
        // dd($request->all());
        return redirect('profil')->with('pesan', 'Data berhasil ditambahkan');
    }
    public function update(Request $request, $id)
    {
       $profil = Profil::find($id);
       $profil->update([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'univ' => $request->univ,
            'prodi' => $request->prodi,
            'foto' => $request->foto,
       ]);
       if($request->hasFile('foto')){
            $request->file('foto')->storeAs('public/foto', $request->file('foto')->getClientOriginalName());
        }
       return redirect('profil')->with('pesan', 'Data berhasil diubah');
    }
    public function destroy($id)
    {
        $profil = Profil::find($id);
        $profil->delete();
        return redirect('profil')->with('pesan', 'Data berhasil dihapus');
    }
}
