<?php

namespace App\Http\Controllers\Api;

use App\FileUpload;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function uploadImg(Request $request)
    {
        if ($request->images) {
            $uploadedFiles = $request->images;
            foreach ($uploadedFiles as $file) {
                $name = $file->getClientOriginalName();
                $pathFile = 'content/' . date('Y-m');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file_path = $file->storeAs($pathFile, $file_name, 'public');


                $resFile = FileUpload::create([
                    'id_content' => $_GET['content_id'],
                    'type' => 'image',
                    'url' => $file_path,
                    'name' => $name
                ]);
                // echo $file;
            }
            return response()->json(['status' => 'ok', 'name' => $file_path], 200);
        }
        return;
    }
    public function uploadFile(Request $request)
    {

        if ($request->file) {
            $uploadedFiles = $request->file;
            foreach ($uploadedFiles as $file) {
                $name = $file->getClientOriginalName();
                $pathFile = 'content/' . date('Y-m');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file_path = $file->storeAs($pathFile, $file_name, 'public');
                $resFile = FileUpload::create([
                    'id_content' => $_GET['content_id'],
                    'type' => 'file',
                    'url' => $file_path,
                    'name' => $name,
                ]);
                // echo $file;
            }
            return response()->json($resFile);
        }
        return;
    }
    
}
