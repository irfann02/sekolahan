<?php

namespace App\Http\Controllers\Api;

use App\Model\Kelas;
use App\Model\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('kelas')->paginate(5);

        return view('siswas.siswa', compact('siswas'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('siswas.create-siswa', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required|unique:siswa',
            'gender' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'nama_ortu' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email|unique:siswa',
            'alamat' => 'required',
            'kelas_id' => 'required',
        ]);

        $siswa = Siswa::create($validatedData);

        return redirect('/siswa')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function show(Siswa $siswa)
    {
        return view('siswas.show', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        return view('siswas.edit-siswa', compact('siswa', 'kelas'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validatedData = $request->validate([
            'nis' => 'required|unique:siswa',
            'gender' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'nama_ortu' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email|unique:siswa',
            'alamat' => 'required',
            'kelas_id' => 'required',
        ]);

        $siswa->update($validatedData);

        return redirect('/siswa')->with('success', 'Siswa berhasil diupdate');
    }

    public function delete(Siswa $siswa)
    {
        $siswa->delete();

        return redirect('/siswa')->with('success', 'Siswa berhasil dihapus');
    }
}
