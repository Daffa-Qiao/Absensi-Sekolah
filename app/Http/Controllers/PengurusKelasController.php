<?php

namespace App\Http\Controllers;

use App\Models\PengurusKelasModel;
use Illuminate\Http\Request;

class PengurusKelasController extends Controller
{
    public function index(){
        $pengurus_kelas = PengurusKelasModel::all()->map(function ($pengurus_kelas, $index) {
        $pengurus_kelas->index = $index + 1; // Menambahkan nomor urut manual
        return $pengurus_kelas;
    });
        return view('admin.pengurus-kelas.index',compact('pengurus_kelas'));
    }
    public function store(Request $request)
    {
        //memvalidasi data yang diperlukan
        $request->validate([
            'jabatan' => 'required',
        ]);
        //membuat data
        PengurusKelasModel::create($request->all());
        //mengalihkan halaman
        return redirect()->back()->with('success', 'Pengurus Kelas berhasil ditambahkan!');
    }

    public function update(Request $request, $id_pengurus_kelas)
    {
        //memvalidasi data yang dibutuhkan
        $request->validate([
            'jabatan' => 'required',
        ]);
        //mencari kondisi id_pengurus_kelas
        $pengurus_kelas = PengurusKelasModel::where('id_pengurus_kelas', $id_pengurus_kelas)->firstOrFail();
        //mengupdate data
        $pengurus_kelas->update($request->all());
        //mengalihkan halaman ke /admin/pengurus-kelas
        return redirect()->route('pengurus-kelas.index')->with('success', 'Kelas berhasil diubah!');
    }

    public function hapus($id_pengurus_kelas)
    {
        //mencari kondisi id_pengurus_kelas
        $pengurus_kelas = PengurusKelasModel::where('id_pengurus_kelas', $id_pengurus_kelas)->firstOrFail();

        //delete kode kelas yang sudah dimasukan ke variable
        $pengurus_kelas->delete();
        return redirect()->back()->with('success', 'Pengurus Kelas berhasil dihapus!');
    }
}
