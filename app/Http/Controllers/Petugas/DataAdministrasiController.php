<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\DataAdministrasi;
Use App\Models\Guru;
use DB, Validator, Storage, Auth, DataTables;

class DataAdministrasiController extends Controller
{
    function __construct()
    {
        $this->title = 'Data Administrasi';
    }

    # Data Administrasi guru
    public function main(Request $request) {
        if(request()->ajax()){
            $data = DataAdministrasi::where('guru_id', Auth::User()->guru_id)
            // ->orderByRaw('field(status, "0","1","2","3")')
            ->orderBy('id_administrasi','desc')
            ->get();
			
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('actions', function($row){
					if ($row->status=='2') {
                        $txt = "
                        <button class='btn btn-sm btn-primary' title='Edit' disabled>Upload</button>
                        ";
                    } else if ($row->status=='3') {
                        $txt = "
                        <button class='btn btn-sm btn-primary' title='Edit' disabled>Terverifikasi</button>
                        ";
                    } else {
                        $txt = "
                        <button class='btn btn-sm btn-warning' title='Edit' onclick='uploadBerkas(`$row->id_administrasi`)'>Upload</button>
                        ";
                    }
					return $txt;
				})
                ->addColumn('modifyTanggal', function($row){
                    if (!empty($row->tanggal_upload)) {
                        return $row->tanggal_upload;
                    } else {
                        return "-";
                    }
                })
                ->addColumn('modifyBatas', function($row){
                    if (!empty($row->deadline_upload)) {
                        return $row->deadline_upload;
                    } else {
                        return "-";
                    }
                })
                ->addColumn('tahun', function($row){
                    return $row->tahun_ajaran;
                })
                ->addColumn('modifySemester', function($row){
                    return "Semester ".$row->semester;
                })
                ->addColumn('modifyKeterangan', function($row){
                    if ($row->status=='0'&&!empty($row->keterangan_tolak)) {
                        return $row->keterangan_tolak;
                    } else {
                        return "-";
                    }
                })
                ->addColumn('modifyFile', function($row){
                    if (!empty($row->file)) {
                        $txt = "<a href='javascript:void(0)' onclick='showFile(`$row->id_administrasi`)'>$row->file</a>"; 
                    } else {
                        $txt = '-';
                    }
                    return $txt;
                })
                ->addColumn('modifyStatus', function($row){
					if ($row->status=='0') {
                        $txt = "<button style='width: 28px; height: 28px; background-color: #C70039; border-radius: 50%;'></button>";
                    } else if($row->status=='1'){
                        $txt = "<button style='width: 28px; height: 28px; background-color: #A6FF96; border-radius: 50%;'></button>";
                    } else {
                        $txt = "<button style='width: 28px; height: 28px; background-color: #7091F5; border-radius: 50%;'></button>";
                    }
					return $txt;
				})
				->rawColumns(['actions','modifyStatus','modifyFile','modifyKeterangan','modifyTanggal'])
				->toJson();
		}

        $data['title'] = $this->title;
        return view('content.guru.dataAdministrasi.main', $data);
    }
    public function modalForm(Request $request) {
        if (empty($request->id)) {
            $data['title'] = "Tambah ".$this->title;
            $data['data'] = '';    
		}else{
            $data['title'] = "Edit ".$this->title;
            $data['data'] = DataAdministrasi::where('id_administrasi',$request->id)->first();
		}
        $data['guru'] = Guru::all();
        $content = view('content.petugas.dataAdministrasi.modalForm', $data)->render();
		return ['content'=>$content];
    }
    public function uploadBerkas(Request $request) {
        $rules = array(
            'file' => 'required|mimes:jpeg,png,jpg,pdf,docx|max:2048',
        );
        $messages = array(
            'required'  => 'harus diisi',
            'mimes'  => 'format file tidak diperbolehkan',
            'max' => 'ukuran file terlalu besar'
        );
        $validator = Validator::make($request->all(), $rules, $messages);
        if (!$validator->fails()) {
            $data = DataAdministrasi::find($request->id);
            $data->tanggal_upload = date('Y-m-d');
            if ($image = $request->file('file')) {
                $check = Storage::disk('public')->exists("/uploads/dataAdministrasi/$data->file");
                if($check == 1 || $check == true){
                    Storage::disk('public')->delete("uploads/dataAdministrasi/$data->file");
                }
                $fileName = $request->file->getClientOriginalName();
                $filePath = 'uploads/dataAdministrasi/' . $fileName;
                $path = Storage::disk('public')->put($filePath, file_get_contents($request->file));
                $path = Storage::disk('public')->url($path);
                $data->file = $fileName;

                //DELETE PREV FILE IF NOT NULL
                // if (isset($data->file)) {
                //     $check = Storage::disk('public')->exists("/uploads/administrasi/$data->file");
                //     if($check == 1 || $check == true){
                //         Storage::disk('public')->delete("uploads/administrasi/$data->file");
                //     }
                // }
                // $destinationPath = 'images/administrasi';
                // $fileUpload = date('YmdHis') . "." . $image->getClientOriginalExtension();
                // $image->move($destinationPath, $fileUpload);
                // $data->file = "$fileUpload";
            }
            $data->status = '2';
            $data->save();
            if ($data) {
                return ['code'=>200,'status'=>'success','message'=>'Berhasil.'];
            } else {
                return ['code'=>201,'status'=>'error','message'=>'Ada kesalahan.'];
            }
        }else{
            return ['code'=>403,'status'=>'failed','message'=> $validator->messages()];
        }
    }
    public function delete(Request $request) {
        $data = DataAdministrasi::find($request->id);
        $data->delete();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Dihapus.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Dihapus.'];
        }
    }

    # Data Administrasi Petugas
    public function mainPetugas(Request $request) {
        if(request()->ajax()){
            if (!empty($request->tahun)&&!empty($request->semester)) {
                $data = DataAdministrasi::where('tahun_ajaran',$request->tahun)
                ->where('semester',$request->semester)
                // ->whereIn('status', ['1','2'])
                ->orderBy('id_administrasi','DESC')
                ->get();
            } else {
                $data = DataAdministrasi::orderBy('id_administrasi','DESC')->get();
            }
			
			return DataTables::of($data)
				->addIndexColumn()
				// ->addColumn('nik', function($row){
				// 	$txt = Guru::where('id_guru', $row->guru_id)->first()->nik;
				// 	return $txt;
				// })
				->addColumn('guru', function($row){
				    $txt = Guru::where('id_guru', $row->guru_id)->first();
					return $txt ? $txt->nama : 'Guru tidak ditemukan';;
				})
                ->addColumn('modifySemester', function($row){
					$txt = "<text>Semester $row->semester</text>";
					return $txt;
				})
                ->addColumn('modifyName', function($row){
					$txt = ($row->nama_berkas)?$row->nama_berkas:'-';
					return $txt;
				})
                ->addColumn('verifikasi', function($row){
                    $txt = '';
					if($row->status=='2') {
                        $txt .= "
                        <button class='btn btn-sm btn-primary' title='verifikasi' onclick='verifikasi(`$row->id_administrasi`)'>Verifikasi</button>
                        <button class='btn btn-sm btn-danger' title='tolak' onclick='tolak(`$row->id_administrasi`)'>Tolak</button>
                        <button style='color: #fff' class='btn btn-sm btn-secondary' title='Detail' onclick='formAdd(`$row->id_administrasi`)'><i class='fadeIn animated bx bxs-file-find' aria-hidden='true'></i></button>
                        <button style='color: #fff' class='btn btn-sm btn-danger' title='Delete' onclick='hapusData(`$row->id_administrasi`)'><i class='fadeIn animated bx bxs-trash' aria-hidden='true'></i></button>
                        ";
                    } else{
                        $txt .= "
                        <button class='btn btn-sm btn-primary disabled' title='verifikasi' onclick='verifikasi(`$row->id_administrasi`)'>Verifikasi</button>
                        <button class='btn btn-sm btn-danger disabled' title='tolak' onclick='tolak(`$row->id_administrasi`)'>Tolak</button>
                        <button style='color: #fff' class='btn btn-sm btn-secondary' title='Detail' onclick='formAdd(`$row->id_administrasi`)'><i class='fadeIn animated bx bxs-file-find' aria-hidden='true'></i></button>
                        <button style='color: #fff' class='btn btn-sm btn-danger' title='Delete' onclick='hapusData(`$row->id_administrasi`)'><i class='fadeIn animated bx bxs-trash' aria-hidden='true'></i></button>
                        ";
                    }
                    return $txt;
				})
                ->addColumn('btnStatus', function($row){

					if ($row->status=='0') {
                        $txt = "<text class='disabled'>Di Tolak</text>";
                    } else if($row->status=='3'){
                        $txt = "<text style='color: #blue'>Terverifikasi</text>";
                    } else{
                        $txt = "<text style='color: #blue'>Menunggu</text>";
                    }
					return $txt;
				})
				->addColumn('actions', function($row){
                    $txt = "<button class='btn btn-sm btn-success text-center' title='lihat' onclick='lihat(`$row->id_administrasi`)'><i class='bx bxs-bullseye'></i> Lihat</button>";
					return $txt;
				})
				->rawColumns(['actions', 'btnStatus', 'verifikasi','modifySemester','guru'])
				->toJson();
		}

        $data['title'] = $this->title;
        return view('content.petugas.dataAdministrasi.main', $data);
    }
    public function modalFormPetugas(Request $request)
    {
        try {
            $data['title'] = "Lihat Data Administrasi";
            $data['data'] = DataAdministrasi::where('id_administrasi',$request->id)->first();
            $content = view('content.petugas.dataAdministrasi.modalShow', $data)->render();
			return ['status' => 'success', 'content' => $content, 'data' => $data];
		} catch (\Exception $e) {
			return ['status' => 'error', 'content' => '','errMsg'=>$e];
		}
    }
    public function verifikasi(Request $request)
    {
        $data = DataAdministrasi::find($request->id);
        $data->status = '3';
        $data->save();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Diverifikasi.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Diverifikasi.'];
        }
    }
    public function formTolak(Request $request) {
        try {
            $data['title'] = "Tolak Data Administrasi";
            $data['data'] = DataAdministrasi::where('id_administrasi',$request->id)->first();
            $content = view('content.petugas.dataAdministrasi.modalTolak', $data)->render();
			return ['status' => 'success', 'content' => $content, 'data' => $data];
		} catch (\Exception $e) {
			return ['status' => 'success', 'content' => '','errMsg'=>$e];
		}
    }
    public function tolak(Request $request)
    {
        $data = DataAdministrasi::find($request->id);
        $data->status = '0';
        $data->keterangan_tolak = $request->keterangan;
        $data->save();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Ditolak.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Ditolak.'];
        }
    }
    public function modalBerkas(Request $request)
    {
        $data['title'] = "Upload Berkas Guru";
        $data['data'] = DataAdministrasi::where('id_administrasi',$request->id)->first();
        $content = view('content.guru.dataAdministrasi.modalBerkas', $data)->render();
		return ['content'=>$content];
    }
    public function save(Request $request) {
        try {
            if (!empty($request->id)) {
                $data = DataAdministrasi::where('id_administrasi',$request->id)->first();
                $data->nama_berkas = $request->nama_berkas;
                $data->tahun_ajaran = $request->tahun_ajaran;
                $data->semester = $request->semester;
                $data->deadline_upload = $request->deadline_upload;
                $data->save();
                if (!$data) {
                    return ['code'=>204,'status'=>'error','message'=>'Data Gagal Disimpan.'];
                }
            } else {
                foreach ($request->guru_id as $key => $v) {
                    $data = new DataAdministrasi;
                    $data->guru_id = $v;
                    $data->nama_berkas = $request->nama_berkas;
                    $data->tahun_ajaran = $request->tahun_ajaran;
                    $data->semester = $request->semester;
                    $data->deadline_upload = $request->deadline_upload;
                    $data->status = '1'; # Meminta pengupload-an kepada guru
                    $data->save();
                    if (!$data) {
                        return ['code'=>204,'status'=>'error','message'=>'Data Gagal Disimpan.'];
                    }
                }
            }
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Disimpan.'];
        } catch (\Throwable $th) {
           return $th->getMessage();
        }
    }
    public function exportDataAdministrasi(Request $request) {
		try {
            $data['date'] = date('Y-m-d');
            $data['tahun'] = $request->tahun;
            $data['semester'] = "Semester ".$request->semester;
            $data['judul'] = 'LAPORAN KELENGKAPAN ADMINISTRASI GURU MTS AL-MUTAZAM';

            $this->query($request->tahun, $request->semester);
            $data['data'] = $this->data;
            if (count($this->data) > 0) {
                $content = view('content.petugas.dataAdministrasi.excel', $data)->render();
                return ['status' => 'success', 'content' => $content];
            }
            return ['status' => 'error', 'message' => 'Data tidak ditemukan pada tanggal tersebut!'];
        } catch (\Throwable $e) {
            $log = ['ERROR EXPORT DATA ADMINISTRASI ('.$e->getFile().')',false,$e->getMessage(),$e->getLine()];
            Help::logging($log);
            return Help::resApi('Terjadi kesalahan sistem',500);
        }
    }
    public function query($tahun, $semester) {
        $data = DataAdministrasi::select(
            'data_administrasi.*',
            'g.id_guru',
            'g.nama',
            'g.nip'
        )
        ->leftJoin('data_guru as g', 'g.id_guru', 'data_administrasi.guru_id')
        ->where('data_administrasi.tahun_ajaran',$tahun)
        ->where('data_administrasi.semester',$semester)
        ->orderBy('data_administrasi.id_administrasi','ASC')->get();
        
		$this->data = $data;
	}
}
