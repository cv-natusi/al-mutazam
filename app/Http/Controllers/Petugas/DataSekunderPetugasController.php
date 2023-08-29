<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Guru\datasekunderguru;
use App\Models\Petugas\datasekunderpetugas;
use Illuminate\Http\Request;

class DataSekunderPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->title = 'Data Sekunder Petugas';
    }

    public function bankdataPetugasSekunder()
    {
        $data['title'] = $this->title;
        $datasekunders = datasekunderpetugas::all();
        return view('content.petugas.data-sekunder.bank-datasekunder', compact('datasekunders'), $data);
    }

    public function dataPetugasSekunder()
    {
        $data['title'] = $this->title;
        $datasekunders = datasekunderpetugas::all();
        return view('content.petugas.data-sekunder.main', compact('datasekunders'), $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = $this->title;
        return view('content.petugas.data-sekunder.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        // Request $request, string $id
        $data['title'] = $this->title;
        return view('content.petugas.data-sekunder.update', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
