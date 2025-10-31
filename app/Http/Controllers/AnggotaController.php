<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_anggota' => 'required|unique:anggotas,no_anggota',
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
        ]);

        Anggota::create([
            'no_anggota' => $request->no_anggota,
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_anggota' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
        ]);

        $anggota = Anggota::findOrFail($id);

        $anggota->update([
            'no_anggota' => $request->no_anggota,
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
        ]);

       return redirect()->back()->with('success', 'Data berhasil diubah!');
    }
}
