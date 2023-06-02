<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobilController extends Controller
{
    protected $arrayMobil = [];

    function index()
    {
        $dataMobil = session()->get('dataMobilNew');
        return view('mobil.index', compact('dataMobil'));
    }

    function create()
    {
        return view('mobil.form');
    }

    function store(Request $request)
    {
        //menampung input dari form
        $namaMobil = $request->nama_mobil;
        $merkMobil = $request->merk_mobil;
        $cc = $request->cc;

        //menampung data mobil dari input ke array assosiatif
        $dataMobilBaru = [
            'namaMobil' => $namaMobil,
            'merkMobil' => $merkMobil,
            'cc' => $cc
        ];

        //push data ke arrayMobil
        array_push($this->arrayMobil, $dataMobilBaru);

        return redirect()->to('/mobil')->with('dataMobilNew', $this->arrayMobil);
    }
}