<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IsiController extends Controller
{
    function proses_tambah_pengaduan(Request $request) {

        // validasi
        $request->validate([
            'isi_laporan' => 'required'
        ]);

        $namaFoto = "";
        // Jika File Foto Ada
        if ($request->hasFile('foto')) {
             $namaFoto = time() . $request->foto->getClientOriginalName();
             $request->foto->move('img', $namaFoto);
}
        $isi_pengaduan = $request->isi_laporan;

        DB::table('pengaduan')->insert([
            'tgl_pengaduan' => date('Y-m-d'),
            'nik' => '435435345341',
            'isi_laporan' => $isi_pengaduan,
            'foto' => $namaFoto,
            'status' => '0',
        ]);
        return redirect('/hasil');
    }
}