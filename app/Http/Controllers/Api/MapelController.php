<?php

namespace App\Http\Controllers\Api;

use App\Model\Mapel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::paginate(5);

        return view('mapels.mapel', compact('mapels'));
    }

    public function create()
    {
        return view('mapels.create-mapel');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
        ]);

        $mapel = new Mapel([
            'kode_mapel' => $request->get('kode_mapel'),
            'nama_mapel' => $request->get('nama_mapel'),
        ]);
        $mapel->save();

        return redirect('/mapel')->with('success', 'Mapel berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);

        return view('mapels.edit-mapel', compact('mapel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->kode_mapel = $request->get('kode_mapel');
        $mapel->nama_mapel = $request->get('nama_mapel');
        $mapel->save();

        return redirect('/mapel')->with('success', 'Mapel berhasil diperbarui');
    }

    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect('/mapel')->with('success', 'Mapel berhasil dihapus');
    }
}
