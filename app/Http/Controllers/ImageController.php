<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
class ImageController extends Controller
{
    public function show($path){
        $image = Storage::disk('s3')->get("img/profile/".$path);
        $type = explode(".",$path)[1];
        $response = Response::make($image, 200)->header("Content-Type",$type);
        return $response;
    }
}
