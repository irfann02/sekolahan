<?php

namespace App\Http\Controllers\Api;

use App\Model\Guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gurus = Guru::all();
        return view('gurus.guru', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gurus.create-guru');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'pendidikan' => 'required',
        ]);

        $guru = new Guru([
            'user_id' => $request->get('user_id'),
            'nip' => $request->get('nip'),
            'nama' => $request->get('nama'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tgl_lahir' => $request->get('tgl_lahir'),
            'gender' => $request->get('gender'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'alamat' => $request->get('alamat'),
            'pendidikan' => $request->get('pendidikan'),
        ]);
        $guru->save();

        return redirect('/guru')->with('success', 'Data guru berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        return view('guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nip' => 'required|unique:guru|max:18',
            'nama' => 'required|max:50',
            'tempat_lahir' => 'required|max:50',
            'tgl_lahir' => 'required|date',
            'gender' => 'required|in:l,p',
            'phone_number' => 'required|max:15',
            'email' => 'required|email|max:50|unique:guru',
            'alamat' => 'required|max:100',
            'pendidikan' => 'required|max:50',
        ]);

        $guru->nip = $request->get('nip');
        $guru->nama = $request->get('nama');
        $guru->tempat_lahir = $request->get('tempat_lahir');
        $guru->tgl_lahir = $request->get('tgl_lahir');
        $guru->gender = $request->get('gender');
        $guru->phone_number = $request->get('phone_number');
        $guru->email = $request->get('email');
        $guru->alamat = $request->get('alamat');
        $guru->pendidikan = $request->get('pendidikan');
        $guru->save();

        return redirect('/guru')->with('success', 'Data guru berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect('/guru')->with('success', 'Data guru berhasil dihapus');
    }
}
