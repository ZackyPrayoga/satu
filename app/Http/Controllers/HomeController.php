<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $TextParagraph = 'Laporkan Keluh Kesah Anda 😉';
        $TextJudul = 'Laporan Pengaduan Masyarakat';
    
        return view('home')->with('TextJudul', $TextJudul)->with('TextParagraph', $TextParagraph);
    }
    

    public function hasil()
    {
        $TextJudul = 'Hasil Page';
        return view('hasil')->with('TextJudul', $TextJudul);
    }

    public function home(){
        return view("/home", [
            "title" => "Home"
        ]);
    }
}
