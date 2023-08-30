<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class DataPelajaranController extends Controller
{
    function __construct()
    {
        $this->title = 'Data Pelajaran';
    }

    public function dataPelajaran()
    {
        $data['title'] = $this->title;
        $pelajaran = Pelajaran::Join('datakelas', 'datakelas.id', '=', 'datapelajaran.id_kelas')
            ->Join('guru', 'guru.id_guru', '=', 'datapelajaran.id_guru')
            ->orderBy('id_kelas', 'asc')->get();
        // return response()->json([
        //     'pelajaran' => $pelajaran
        // ]);
        return view('content.petugas.datapelajaran.main', compact('pelajaran'), $data);
    }

    public function tambahdataPelajaran()
    {
        $kelas = Kelas::orderBy('id', 'asc')->get();
        $guru = Guru::orderBy('id_guru', 'asc')->get();
        $pelajaran = Pelajaran::orderBy('id', 'asc')->get();
        $data['title'] = $this->title;
        return view('content.petugas.datapelajaran.tambahpelajaran', compact('guru', 'kelas', 'pelajaran'), $data);
    }

    public function simpandataPelajaran(Request $request)
    {
        Pelajaran::create([
            'id_kelas' => $request->id_kelas,
            'id_guru' => $request->id_guru,
            'mapel' => $request->mapel,
            'ta' => $request->ta,
            'semester' => $request->semester
        ]);
        return redirect('petugas-sekolah/data-Pelajaran')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    public function editdataPelajaran($id)
    {
        $kelas = Kelas::orderBy('id', 'asc')->get();
        $guru = Guru::orderBy('id_guru', 'asc')->get();
        $pelajaran = Pelajaran::findorfail($id);
        $data['title'] = $this->title;
        return view('content.petugas.datapelajaran.editpelajaran', compact('guru', 'kelas', 'pelajaran'), $data);
    }

    public function updatedataPelajaran(Request $request, $id)
    {
        $this->validate($request, [
            'id_kelas' => 'required',
            'id_guru' => 'required',
            'mapel' => 'required',
            'ta' => 'required',
            'semester' => 'required'
        ]);
        $pelajaran = Pelajaran::findorfail($id);
        $pelajaran->update($request->all());
        return redirect('petugas-sekolah/data-Pelajaran')->with('toast_success', 'Data Berhasil Diubah');
    }

    public function hapusdataPelajaran($id)
    {
        $pelajaran = Pelajaran::findorfail($id);
        $pelajaran->delete();
        return back()->with('toast_success', 'Data Berhasil Diubah');
    }
}
