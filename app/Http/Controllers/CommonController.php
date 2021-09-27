<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function getVideoFile($foldername , $filename){
// dd('asdfsdfasdfdsafsadfsadf');
        $path = $foldername.'/'.$filename;

        if(Storage::exists($path)){
            // return Storage::download($path);
            return response()->file($path);
        }

        abort(404);
    }
}