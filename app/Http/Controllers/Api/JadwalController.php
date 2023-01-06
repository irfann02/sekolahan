<?php

namespace App\Http\Controllers\Api;

use App\Model\Guru;
use App\Model\Kelas;
use App\Model\Mapel;
use App\Model\Jadwal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::paginate(5);
        return view('jadwals.jadwal', compact('jadwals'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $guru = Guru::all();
        return view('jadwals.create-jadwal', compact('kelas', 'mapel', 'guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'guru_id' => 'required',
            'hari' => 'required',
            'jam_pelajaran' => 'required',
        ]);

        $jadwal = new Jadwal([
            'kelas_id' => $request->get('kelas_id'),
            'mapel_id' => $request->get('mapel_id'),
            'guru_id' => $request->get('guru_id'),
            'hari' => $request->get('hari'),
            'jam_pelajaran' => $request->get('jam_pelajaran'),
        ]);
        $jadwal->save();

        return redirect('/jadwal')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $guru = Guru::all();
        return view('jadwals.edit-jadwal', compact('jadwal','kelas', 'mapel', 'guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'guru_id' => 'required',
            'hari' => 'required',
            'jam_pelajaran' => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->kelas_id = $request->get('kelas_id');
        $jadwal->mapel_id = $request->get('mapel_id');
        $jadwal->guru_id = $request->get('guru_id');
        $jadwal->hari = $request->get('hari');
        $jadwal->jam_pelajaran = $request->get('jam_pelajaran');
        $jadwal->save();

        return redirect('/jadwal')->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect('/jadwal')->with('success', 'Jadwal berhasil dihapus');
    }
}
