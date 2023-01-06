<?php

namespace App\Http\Controllers\Api;

use App\Model\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::paginate(5);

        return view('kelass.kelas', compact('kelas'));
    }

    public function create()
    {
        return view('kelass.create-kelas');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kelas' => 'required',
            'nama_kelas' => 'required',
        ]);

        $kelas = new Kelas([
            'kode_kelas' => $request->get('kode_kelas'),
            'nama_kelas' => $request->get('nama_kelas'),
        ]);
        $kelas->save();

        return redirect('/kelas')->with('success', 'Kelas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('kelass.edit-kelas', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kelas' => 'required',
            'nama_kelas' => 'required',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->kode_kelas = $request->get('kode_kelas');
        $kelas->nama_kelas = $request->get('nama_kelas');
        $kelas->save();

        return redirect('/kelas')->with('success', 'Kelas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect('/kelas')->with('success', 'Kelas berhasil dihapus');
    }
}
