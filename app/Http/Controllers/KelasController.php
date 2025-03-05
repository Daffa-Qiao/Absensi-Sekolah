<?php

namespace App\Http\Controllers;

use App\Models\KelasModel;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request){
        //mendeklarasikan search
        $search = $request->input('search');
        //memasukan query sql untuk mencari kode kelas atau nama kelas sesuai yang cari 
        $kelas=KelasModel::query()
                     ->where('kode_kelas', 'like', "%{$search}%")
                     ->orWhere('nama_kelas', 'like', "%{$search}%")
                     ->paginate(5);
        //mengalihkan halaman dengan membawa variable kelas dan search
        return view('admin.kelas.index',compact('kelas','search'));
    }

    public function store(Request $request)
    {
        //memvalidasi data yang diperlukan
        $request->validate([
            'kode_kelas' => 'required',
            'nama_kelas' => 'required'
        ]);
        //membuat data
        KelasModel::create($request->all());
        //mengalihkan halaman
        return redirect()->back()->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function update(Request $request, $kode_kelas)
    {
        //memvalidasi data yang dibutuhkan
        $request->validate([
            'kode_kelas' => 'required',
            'nama_kelas' => 'required'
        ]);
        //mencari kondisi kode_kelas
        $kelas = KelasModel::where('kode_kelas', $kode_kelas)->firstOrFail();
        //mengupdate data
        $kelas->update($request->all());
        //mengalihkan halaman ke /admin/kelas/
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diubah!');
    }

    public function hapus($kode_kelas)
    {
        //mencari kondisi kode_kelas
        $kelas = KelasModel::where('kode_kelas', $kode_kelas)->firstOrFail();

        //delete kode kelas yang sudah dimasukan ke variable
        $kelas->delete();
        return redirect()->back()->with('success', 'Kelas berhasil dihapus!');
    }

}
