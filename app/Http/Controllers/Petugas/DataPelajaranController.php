<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MstPelajaran;
use Illuminate\Http\Request;
use DataTables, Validator, DB, Auth;

class DataPelajaranController extends Controller
{
    function __construct()
    {
        $this->title = 'Data Pelajaran';
    }

    public function main(Request $request)
    {
        if(request()->ajax()){
            $data = MstPelajaran::orderBy('id_pelajaran','ASC')->get();
			
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('actions', function($row){
					$txt = "
                    <button class='btn btn-sm btn-secondary' title='Edit' onclick='editData(`$row->id_tugas_pegawai`)'><i class='fadeIn animated bx bxs-file' aria-hidden='true'></i></button>
                    <button class='btn btn-sm btn-danger' title='Hapus' onclick='hapusData(`$row->id_tugas_pegawai`)'><i class='fadeIn animated bx bxs-trash' aria-hidden='true'></i></button>
					";
					return $txt;
				})
                ->addColumn('kelas', function($row){
					return "Testinggg";
				})
                ->addColumn('guru', function($row){
					return "Testinggg";
				})
				->rawColumns(['actions'])
				->toJson();
		}

        $data['title'] = $this->title;
        return view('content.petugas.datapelajaran.main', $data);
    }

    public function form()
    {
        if (empty($request->id)) {
            $data['title'] = "Tambah ".$this->title;
            $data['data'] = '';    
		}else{
            $data['title'] = "Edit ".$this->title;
            $data['data'] = MstPelajaran::where('id_pelajaran',$request->id)->first();
		}
        $content = view('content.petugas.datapelajaran.form', $data)->render();
		return ['status' => 'success', 'content' => $content, 'data' => $data];
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
