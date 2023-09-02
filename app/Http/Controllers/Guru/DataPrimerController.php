<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru\dataprimerguru;
use Illuminate\Http\Request;

class DataPrimerController extends Controller
{
    function __construct()
    {
        $this->title = 'Data Primer';
    }

    // public function mainDataPrimer()
    // {
    //     $data['title'] = $this->title;
    //     // $dataprimer = dataprimerguru::orderBy('created_at', 'DESC')->get();
    //     return view('content.guru.data-primer.main', $data);
    // }

    public function index()
    {
        $data['title'] = $this->title;
        $dataprimers = dataprimerguru::all();
        // return $dataprimers;
        return view('content.guru.data-primer.main', compact('dataprimers'), $data);
    }

    // public function edit()
    // {
    //     $data['title'] = $this->title;
    //     $dataprimers = dataprimerguru::find($id);
    //     // return $dataprimers;
    //     return view('content.guru.data-primer.modal', compact('dataprimers'), $data);
    // }

    // public function update(Request $request, $id)
    // {
    //     $dataprimers = dataprimerguru::find($id);
    //     $dataprimers->namadataprimer_guru = $request->namadataprimer_guru;
    //     $dataprimers->tahun = $request->tahun;
    //     $dataprimers->batas_upload = $request->batas_upload;
    //     $dataprimers->keterangan = $request->keterangan;
    //     $dataprimers->status = $request->status;
    //     $dataprimers->tgl_upload = $request->tgl_upload;
    //     $dataprimers->file = $request->file;

    //     return redirect('data-primer');
    // }

    // public function store(Request $request)
    // {
    //     // $validator = dataprimerguru::make($request->all(), [
    //     //     'photo' => 'required|mimes:png,jpg,jpeg',
    //     // ]);
    //     // $photo = $request->file('photo');
    //     dataprimerguru::creat([
    //         'namadataprimer_guru' => $request->namadataprimer_guru,
    //         'tahun' => $request->tahun,
    //         'batas_upload' => $request->batas_upload,
    //         'keterangan' => $request->keterangan,
    //         'status' => $request->status,
    //         'tgl_upload' => $request->tgl_upload,
    //         // 'file' => $request->file,
    //     ]);

    //     $dataprimers = dataprimerguru::create($request->all());
    //     if ($request->hasFile('file')) {
    //         $request->file('file')->move('assets\images', $request->file('file')->getClientOriginalName());
    //         $dataprimers->file = $request->file('file')->getClientOriginalName();
    //         $dataprimers->save();
    //     }

    //     return redirect('data-primer');
    // }
}
