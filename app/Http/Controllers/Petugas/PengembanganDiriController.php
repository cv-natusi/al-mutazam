<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengembanganDiri;
use App\Models\Guru;
use App\Models\MstPengembanganDiri;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use DataTables,Validator,DB,Auth,PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class PengembanganDiriController extends Controller
{
    # Petugas
    public function main() {
        $data['title'] = 'Data Pengembangan Diri';
        return view('content.petugas.pengembanganDiri.main', $data);
    }
    public function pengembanganDiri(Request $request)
    {
        if ($request->ajax()) {
            $data = PengembanganDiri::select(
                    'pengembangan_diri.id_pengembangan_diri',
                    'pengembangan_diri.guru_id',
                    'pengembangan_diri.mst_pengembangan_diri_id',
                    'pengembangan_diri.file',
                    'pengembangan_diri.status',
                    'g.id_guru',
                    'g.nama',
                    'g.nip',
                    'mpd.id_mst_pengembangan_diri',
                    'mpd.nama_dokumen',
                )
                ->leftJoin('data_guru as g', 'g.id_guru', 'pengembangan_diri.guru_id')
                ->leftJoin('mst_pengembangan_diri as mpd', 'mpd.id_mst_pengembangan_diri', 'pengembangan_diri.mst_pengembangan_diri_id')
                ->whereNotIn('status', ['buat','tolak'])
                ->orderBy('pengembangan_diri.id_pengembangan_diri','ASC')->get();

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('verifikasi', function($row){
                if($row->status=='upload'){
                    $txt = "
                    <button class='btn btn-sm btn-primary' title='verifikasi' onclick='verifikasi(`$row->id_pengembangan_diri`)'>Verifikasi</button>
                    <button class='btn btn-sm btn-danger' title='tolak' onclick='tolak(`$row->id_pengembangan_diri`)'>Tolak</button>
                    ";
                    return $txt;
                }else{
                    $txt = "
                    <button class='btn btn-sm btn-primary disabled' title='verifikasi'>Verifikasi</button>
                    <button class='btn btn-sm btn-danger disabled' title='tolak'>Tolak</button>
                    ";
                    return $txt;
                }
            })
            ->addColumn('btnStatus', function($row){
                if ($row->status!='verif') {
                    $txt = "<p class='disabled'>Menunggu</p>";
                } else {
                    $txt = "<p style='color: #0000FF'>Terverifikasi</p>";
                }
                return $txt;
            })
            ->addColumn('actions', function($row){
                if ($row->status!='verif') {
                    $txt = "<button class='btn btn-sm btn-success text-center' title='lihat' onclick='formFirstLihat(`$row->id_pengembangan_diri`)'><i class='bx bxs-bullseye'></i> Lihat</button>";
                } else {
                    $txt = "<button class='btn btn-sm btn-success text-center disabled' title='lihat'><i class='bx bxs-bullseye'></i> Lihat</button>";  
                }
                return $txt;
            })
            ->rawColumns(['actions', 'btnStatus', 'verifikasi'])
            ->toJson();
		}

        $data['title'] = 'Data Pengembangan Diri';
        return view('content.petugas.pengembanganDiri.main', $data);
    }
    public function mstPengembanganDiri(Request $request)
    {
        if ($request->ajax()) {
            $data = MstPengembanganDiri::orderBy('id_mst_pengembangan_diri','ASC')->get();
            
            return DataTables::of($data)
				->addIndexColumn()
				->addColumn('actions', function($row){
					$txt = "
                    <button class='btn btn-sm btn-secondary' title='Edit' onclick='formSecond(`$row->id_mst_pengembangan_diri`)'><i class='fadeIn animated bx bxs-file' aria-hidden='true'></i></button>
                    <button class='btn btn-sm btn-danger' title='Hapus' onclick='deleteSecond(`$row->id_mst_pengembangan_diri`)'><i class='fadeIn animated bx bxs-trash' aria-hidden='true'></i></button>
					";
					return $txt;
				})
				->rawColumns(['actions'])
				->toJson();
		}

        $data['title'] = 'Data Master Pengembangan Diri';
        return view('content.petugas.pengembanganDiri.main', $data);
    }
    public function formPengembanganDiri(Request $request) {
        if (empty($request->id)) {
            $data['title'] = "Tambah Data Pengembangan Diri";
            $data['data'] = '';    
		}else{
            $data['title'] = "Edit Data Pengembangan Diri";
            $data['data'] = PengembanganDiri::select(
                    'pengembangan_diri.id_pengembangan_diri',
                    'pengembangan_diri.guru_id',
                    'pengembangan_diri.mst_pengembangan_diri_id',
                    'pengembangan_diri.file',
                    'pengembangan_diri.status',
                    'g.id_guru',
                    'g.nama',
                    'g.nip',
                    'mpd.id_mst_pengembangan_diri',
                    'mpd.nama_dokumen',
                )
                ->leftJoin('data_guru as g', 'g.id_guru', 'pengembangan_diri.guru_id')
                ->leftJoin('mst_pengembangan_diri as mpd', 'mpd.id_mst_pengembangan_diri', 'pengembangan_diri.mst_pengembangan_diri_id')
                ->where('pengembangan_diri.id_pengembangan_diri',$request->id)->first();
		}
        $data['guru'] = Guru::all();
        $data['dokumen'] = MstPengembanganDiri::all();
        $content = view('content.petugas.pengembanganDiri.modalFirstAdd', $data)->render();
		return ['content'=>$content];
    }
    public function formLihatPengembanganDiri(Request $request) {
        $data['title'] = "Lihat Data Pengembangan Diri";
        $data['data'] = PengembanganDiri::where('id_pengembangan_diri',$request->id)->first();
        $data['guru'] = Guru::where('id_guru',$data['data']->guru_id)->first();
        $data['dokumen'] = MstPengembanganDiri::where('id_mst_pengembangan_diri',$data['data']->mst_pengembangan_diri_id)->first();
        $content = view('content.petugas.pengembanganDiri.modalFirstLihat', $data)->render();
		return ['content'=>$content];
    }
    public function formMstPengembanganDiri(Request $request) {
        if (empty($request->id)) {
            $data['title'] = "Tambah Master Data Pengembangan Diri";
            $data['data'] = '';    
		}else{
            $data['title'] = "Edit Master Data Pengembangan Diri";
            $data['data'] = MstPengembanganDiri::where('id_mst_pengembangan_diri',$request->id)->first();
		}
        $content = view('content.petugas.pengembanganDiri.modalSecond', $data)->render();
		return ['content'=>$content];
    }
    public function savePengembanganDiri(Request $request) {
        if (empty($request->id)) {
            $data = new PengembanganDiri;
        } else {
            $data = PengembanganDiri::find($request->id);
        }
        $data->guru_id = $request->guru_id;
        $data->mst_pengembangan_diri_id = $request->nama_dokumen;
        $data->status = 'buat';
        $data->tahun = date('Y');
        $data->save();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Disimpan.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Disimpan.'];
        }
    }
    public function verifPengembanganDiri(Request $request) {
        try {
            $data = PengembanganDiri::find($request->id);
            $data->status = 'verif';
            $data->save();
            if ($data) {
                return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Diverifikasi.'];
            } else {
                return ['code'=>201,'status'=>'error','message'=>'Data Gagal Diverifikasi.'];
            }
        } catch (\Throwable $e) {
            Log::error('Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }
    public function tolakPengembanganDiri(Request $request) {
        try {
            $data = PengembanganDiri::find($request->id);
            $data->status = 'tolak';
            $data->save();
            if ($data) {
                return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Ditolak.'];
            } else {
                return ['code'=>201,'status'=>'error','message'=>'Data Gagal Ditolak.'];
            }
        } catch (\Throwable $e) {
            Log::error('Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }
    public function saveMstPengembanganDiri(Request $request) {
        if (empty($request->id)) {
            $data = new MstPengembanganDiri;
		}else{
            $data = MstPengembanganDiri::where('id_mst_pengembangan_diri',$request->id)->first();
		}
        $data->nama_dokumen = $request->nama_dokumen;
        $data->save();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Disimpan.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Disimpan.'];
        }
    }
    # guru pengajar
    public function mainPengembanganDiriGuru(Request $request) {
        if ($request->ajax()) {
            $data = PengembanganDiri::
            // select(
            //         'pengembangan_diri.id_pengembangan_diri',
            //         'pengembangan_diri.guru_id',
            //         'pengembangan_diri.mst_pengembangan_diri_id',
            //         'pengembangan_diri.tahun',
            //         'pengembangan_diri.status',
            //         'mpd.id_mst_pengembangan_diri',
            //         'mpd.nama_dokumen',
            //     )
                // ->leftJoin('data_guru as g', 'g.id_guru', 'pengembangan_diri.guru_id')
                // ->leftJoin('mst_pengembangan_diri as mpd', 'mpd.id_mst_pengembangan_diri', 'pengembangan_diri.mst_pengembangan_diri_id')
                where('guru_id', Auth::User()->guru_id)
                // ->whereIn('status', ['buat', 'tolak'])
                ->orderBy('pengembangan_diri.id_pengembangan_diri','DESC');

            return DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('stts', function($row){
                if ($row->status=='tolak') {
                    $txt = "Ditolak";
                } else if($row->status!='verif') {
                    $txt = "Belum Diverifikasi";
                } else {
                    $txt = "Terverifikasi";
                }
                return $txt;
            })
            ->addColumn('actions', function($row){
                if ($row->status=='buat') {
                    $txt = "
                    <button class='btn btn-sm btn-secondary' title='Edit' onclick='formAdd(`$row->id_pengembangan_diri`)'><i class='fadeIn animated bx bxs-file' aria-hidden='true'></i></button>
                    <button class='btn btn-sm btn-danger' title='Hapus' onclick='hapusData(`$row->id_pengembangan_diri`)'><i class='fadeIn animated bx bxs-trash' aria-hidden='true'></i></button>";
                } else {
                    $txt = "<button class='btn btn-sm btn-success text-center disabled' title='Upload'>Upload</button>";  
                }
                return $txt;
            })
            ->rawColumns(['actions'])
            ->toJson();
		}

        $data['title'] = 'Data Pengembangan Diri Guru';
        return view('content.guru.pengembanganDiri.main', $data);
    }
    public function formPengembanganDiriGuru(Request $request) {
        $data['title'] = "Upload Data Pengembangan Diri Guru";
        $data['data'] = PengembanganDiri::where('id_pengembangan_diri',$request->id)->first();
        $content = view('content.guru.pengembanganDiri.modal', $data)->render();
		return ['content'=>$content];
    }
    public function savePengembanganDiriGuru(Request $request) {
        // return $request->all();
        try {
            if (empty($request->id)) {
                $rules = array(
                    'nama_kegiatan' => 'required',
                    'tgl_mulai' => 'required',
                    'tgl_selesai' => 'required',
                    'file_dokumen' => 'required|mimes:jpeg,png,jpg,pdf,docx|max:2048',
                );
            }else{
                $rules = array(
                    'nama_kegiatan' => 'required',
                    'tgl_mulai' => 'required',
                    'tgl_selesai' => 'required',
                );
            }
            $messages = array(
                'required'  => 'harus diisi',
                'mimes'  => 'format file tidak diperbolehkan',
                'max' => 'ukuran file terlalu besar'
            );
            $validator = FacadesValidator::make($request->all(), $rules, $messages);
            if (!$validator->fails()) {
                if(empty($request->id)) {
                    $data = new PengembanganDiri;
                } else {
                    $data = PengembanganDiri::find($request->id);
                }
                $data->status = 'buat';
                $data->guru_id = Auth::User()->guru_id;
                $data->nama_kegiatan = $request->nama_kegiatan;
                $data->tgl_mulai = $request->tgl_mulai;
                $data->tgl_selesai = $request->tgl_selesai;

                if ($request->file_dokumen) {
                    $check = Storage::disk('public')->exists("/uploads/pengembanganDiri/$data->file");
                    if($check == 1 || $check == true){
                        Storage::disk('public')->delete("uploads/pengembanganDiri/$data->file");
                    }
                    $fileName = $request->file_dokumen->getClientOriginalName();
                    $filePath = 'uploads/pengembanganDiri/' . $fileName;
                    $path = Storage::disk('public')->put($filePath, file_get_contents($request->file_dokumen));
                    $path = Storage::disk('public')->url($path);
                    $data->file = $fileName;
                }   
                
                $data->save(); 
                // return $data;
                if ($data) {
                    return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Diupload.'];
                } else {
                    return ['code'=>201,'status'=>'error','message'=>'Data Gagal Diupload.'];
                }
            }else{
                return ['code'=>403,'status'=>'failed','message'=> $validator->messages()];
            }
        } catch (\Throwable $e) {
            Log::error('Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }
    public function delete(Request $request) {
        $data = PengembanganDiri::find($request->id);
        //DELETE IMAGE IF HAS IMAGE
        if (isset($data->file)) {
            $check = Storage::disk('public')->exists("/uploads/pengembanganDiri/$data->file");
            if($check == 1 || $check == true){
                Storage::disk('public')->delete("uploads/pengembanganDiri/$data->file");
            }
        }
        $data->delete();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Dihapus.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Dihapus.'];
        }
    }
}
