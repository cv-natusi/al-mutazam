<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use mysqli;

class UploadFIleController extends Controller
{
    function __construct()
    {
        $this->title = 'Upload Data Primer';
    }

    public function upprimerGuru()
    {
        $data['title'] = $this->title;
        return view('content.guru.data-primer.modal', $data);
    }

    public function fileUpload(Request $request): RedirectResponse
    {
        $request->validate([
            'file.*' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
        ]);

        // if (isset($_POST["upload"])) {
        //     $fileName = $_FILES["file[]"];
        //     $folder = "./image/" . $fileName;

        //     $db = mysqli_connect("localhost", "root", "", "mtsalmutazam");
        //     $sql = "INSERT INTO image (file) VALUES ('$fileName')";

        //     mysqli_query($db,$sql);

        //     if(move_uploaded_file($folder)){
        //         echo "<h3> Success </h3>"
        //     } else {
        //         echo "<h3> Failed </h3>"
        //     }
        // }

        foreach ($request->file as $value) {
            $fileName = time() . '_' . $value->getClientOriginalName();
            $value->move(public_path('assets/images'), $fileName);

            $fileName[] = $fileName;
        }

        return redirect()->back();
    }
}
