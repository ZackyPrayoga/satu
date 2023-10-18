<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengaduanContoller extends Controller
{
    function pengaduan()
    {
        $pengaduan = DB::table('pengaduan')->get();

        return view('hasil', ['pengaduan' => $pengaduan]);
    }

    function detail_pengaduan($id)
    {
        $pengaduan = DB::table('pengaduan')
            ->where('id_pengaduan', '=', $id)
            ->first();
        return view('detail', ['pengaduan' => $pengaduan]);
    }

    function hapus($id)
    {
        DB::table('pengaduan')->where('id_pengaduan', '=', $id)->delete();
        return redirect('hasil');
    }

    function edit($id)
    {
        $data = DB::table('pengaduan')->where('id_pengaduan', $id)->first();
        $data = (array) $data;

        return view('update', ['data' => $data]);
    }

    function update_pengaduan(Request $request, $id)
    {
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

        DB::table('pengaduan')->where('id_pengaduan', $id)
            ->update([
                'isi_laporan' => $isi_pengaduan,
                'foto' => $namaFoto,
            ]);

            return redirect('hasil');
    }
}
