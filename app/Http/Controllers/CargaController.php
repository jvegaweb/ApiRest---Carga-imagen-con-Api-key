<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CargaController extends Controller
{
 public function uploadFile(Request $request)
 {
    if ($request->hasFile('file')) {
        $file = $request->file('file');
         $filename = $file->getClientOriginalName();

         $filename = pathinfo($filename, PATHINFO_FILENAME);
         $name_File = str_replace(" ", "_", $filename);

         $extension = $file->getClientOriginalExtension();

         $picture = date('His') . '-' . $name_File . '.' . $extension;
         $file->move(public_path('Files/'), $picture);

      return response()->json(["mensaje" => "Image Upload Succes"]);

    }else{
        return response()->json(["mensaje" => "Error"]);

    }

 }
}
