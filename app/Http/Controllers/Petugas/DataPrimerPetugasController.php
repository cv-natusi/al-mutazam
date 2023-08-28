<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas\dataprimerguru;
use App\Models\Petugas\dataprimerpetugas;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class DataPrimerPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->title = 'Data Primer Petugas';
    }

    public function bankdataPetugasPrimer()
    {
        $data['title'] = $this->title;
        $dataprimers = dataprimerpetugas::all();
        return view('content.petugas.data-primer.bank-dataprimer', compact('dataprimers'), $data);
    }

    public function dataPetugasPrimer()
    {
        $data['title'] = $this->title;
        $dataprimers = dataprimerpetugas::all();
        return view('content.petugas.data-primer.main', compact('dataprimers'), $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model = new dataprimerpetugas();

        $data['title'] = $this->title;
        return view('content.petugas.data-primer.tambah', compact('model'), $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dataprimerpetugas::create([
            'namadataprimer_guru' => $request->namadataprimer_guru,
            'tahun' => $request->tahun,
            'batas_upload' => $request->batas_upload,
            'keterangan' => $request->keterangan,
            'status' => 'Selesai',
            'tgl_upload' => date(today()),
            'file' => 'file'
        ]);
        return redirect('petugas-sekolah/datapetugas-primer');
        // $model = new dataprimerguru;
        // $model->namadataprimer_guru = $request->namadataprimer_guru;
        // $model->tahun = $request->tahun;
        // $model->batas_upload = $request->batas_upload;
        // $model->keterangan = $request->keterangan;
        // $model->save();

        // return redirect('createdataprimerPetugas');
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
    public function edit($id)
    {
        $primer = dataprimerpetugas::find($id);
        $data['title'] = $this->title;
        return view('content.petugas.data-primer.update', compact('primer'), $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'namadataprimer_guru' => 'required',
            'tahun' => 'required',
            'batas_uploud' => 'required',
            'keterangan' => 'required',
            // 'status' => 'required',
            // 'tgl_upload' => 'required',
            // 'file' => 'required'
        ]);
        $primer = dataprimerpetugas::findorfail($id);
        $primer->update($request->all());
        return redirect('petugas-sekolah/datapetugas-primer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
