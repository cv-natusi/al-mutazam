<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    
    public function editor(Request $request)
    {
        $data['menuActive'] = 'pengguna';
        $data['subMenuActive'] = 'dashboard';
        $data['title'] = 'Pengguna';
        $data['users'] = Users::where('level','2')->get();
        return view('Admin.pengguna.editor.main', $data);
    }
    public function editorDatagrid(Request $request)
    {
        $data = Users::getJsonEditor($request);
        return response()->json($data);
    }
    public function formAddEditor(Request $request)
    {
        $content = view('Admin.pengguna.editor.formAdd')->render();
        return ['status' => 'success', 'content' => $content];
    }
    public function AddEditor(Request $request)
    {
        $user = Sentinel::registerAndActivate([
            'email' => $request->email,
            'password' => $request->email,
        ]);
        $user->level = '2';
        $user->name_user = $request->name_user;
        $user->alias = $request->alias;
        $user->address_user = $request->address_user;
        $user->phone = $request->phone;
        $user->active = $request->active;
        if (!empty($request->photo_user)) {
        	$ukuranFile1 = filesize($request->photo_user);
            if ($ukuranFile1 <= 500000) {
                $ext_foto1 = $request->photo_user->getClientOriginalExtension();
                $filename1 = "Editor".date('Ymd-His').".".$ext_foto1;
                $temp_foto1 = 'AssetsAdmin/dist/img/Editor/';
                $proses1 = $request->photo_user->move($temp_foto1, $filename1);
                $user->photo_user = $filename1;
            }else{
                $file1=$_FILES['photo_user']['name'];
                $ext_foto1 = $request->photo_user->getClientOriginalExtension();
                if(!empty($file1)){
                    $direktori1= 'AssetsAdmin/dist/img/Editor/'; //tempat upload foto
                    $name1='photo_user'; //name pada input type file
                    $namaBaru1="Editor".date('Ymd-His'); //name pada input type file
                    $quality1=50; //konversi kualitas gambar dalam satuan %
                    $upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
                }
                $user->photo_user = $namaBaru1.".".$ext_foto1;
            }
        }
        // return $user;
        $user->save();
        if ($user) {
            return Redirect::route('editor')->with('title', 'Success !')->with('message', 'Editor Iklan Successfully Created !!')->with('type', 'success');
        } else {
            return Redirect::route('editor')->with('title', 'Whoops!!!')->with('message', 'Editor Iklan Failed to Create !!')->with('type', 'error');
        }
    }
    public function formUpdateEditor(Request $request)
    {
        $data['user'] = Users::find($request->id);
        $content = view('Admin.pengguna.editor.formEdit', $data)->render();
        return ['status' => 'success', 'content' => $content];
    }
    public function UpdateEditor(Request $request)
    {
        $user = Users::find($request->id);
        $user->name_user = $request->name_user;
        $user->alias = $request->alias;
        $user->address_user = $request->address_user;
        $user->phone = $request->phone;
        $user->active = $request->active;
        if (!empty($request->photo_user)) {
        	if($user->photo_user!=''){
	        	if(file_exists('AssetsAdmin/dist/img/Editor/'.$user->photo_user)){
	                unlink('AssetsAdmin/dist/img/Editor/'.$user->photo_user);
	            }
            }
            $ukuranFile1 = filesize($request->photo_user);
            if ($ukuranFile1 <= 500000) {
                $ext_foto1 = $request->photo_user->getClientOriginalExtension();
                $filename1 = "Editor".date('Ymd-His').".".$ext_foto1;
                $temp_foto1 = 'AssetsAdmin/dist/img/Editor/';
                $proses1 = $request->photo_user->move($temp_foto1, $filename1);
                $user->photo_user = $filename1;
            }else{
                $file1=$_FILES['photo_user']['name'];
                $ext_foto1 = $request->photo_user->getClientOriginalExtension();
                if(!empty($file1)){
                    $direktori1= 'AssetsAdmin/dist/img/Editor/'; //tempat upload foto
                    $name1='photo_user'; //name pada input type file
                    $namaBaru1="Editor".date('Ymd-His'); //name pada input type file
                    $quality1=50; //konversi kualitas gambar dalam satuan %
                    $upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
                }
                $user->photo_user = $namaBaru1.".".$ext_foto1;
            }
        }
        $user->save();
        if ($user) {
            return Redirect::route('editor')->with('title', 'Success !')->with('message', 'Editor Iklan Successfully Updated !!')->with('type', 'success');
        } else {
            return Redirect::route('editor')->with('title', 'Whoops!!!')->with('message', 'Editor Iklan Failed to Update !!')->with('type', 'error');
        }
    }
    public function resetSandiEditor(Request $request)
    {
        $user = Sentinel::findById($request->id);
        $email = $user->email;
        $credentials = [
            'password' => $email,
        ];
        $user = Sentinel::update($user, $credentials);
        if ($user) {
            return ['status' => 'success', 'message' => 'Password Successfully Reseted !!'];
        } else {
            return ['status'=>'error', 'message'=>'Password Failed to Reset !!'];
        }
    }
}
