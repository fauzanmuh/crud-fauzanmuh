<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * * Display a listing of the resource.
     * *
     * * * @return \Illuminate\Http\Response
     * */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $mahasiswas = Mahasiswa::all(); // Mengambil semua isi tabel
        $paginatedMahasiswas = Mahasiswa::orderBy('nim', 'desc')->paginate(5);
        return view('mahasiswa.index', compact('mahasiswas', 'paginatedMahasiswas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('mahasiswas.create');
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
        'Nim' => 'required',
        'Nama' => 'required',
        'Kelas' => 'required',
        'Jurusan' => 'required',
        'No_Handphone' => 'required',
        ]);
        
        //fungsi eloquent untuk menambah data
        Mahasiswa::create($request->all());
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    public function show($Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::find($Nim);
        
        //eloquent untuk mengambil data sebelum dan sesudah data sekarang
        $next = Mahasiswa::where('nim', '<', $Nim)->orderBy('nim','desc')->first();
        $prev = Mahasiswa::where('nim', '>', $Nim)->orderBy('nim')->first();

        return view('mahasiswa.detail', compact('mahasiswa', 'prev', 'next'));
    }

    public function edit($Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = Mahasiswa::find($Nim);
        return view('mahasiswas.edit', compact('Mahasiswa'));
    }

    public function update(Request $request, $Nim)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        Mahasiswa::find($Nim)->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
        ->with('success', 'Mahasiswa Berhasil Diupdate');
    }
   
    public function destroy( $Nim)
   {
       //fungsi eloquent untuk menghapus data
       Mahasiswa::find($Nim)->delete();
       return redirect()->route('mahasiswas.index')
            -> with('success', 'Mahasiswa Berhasil Dihapus');
   }
}
