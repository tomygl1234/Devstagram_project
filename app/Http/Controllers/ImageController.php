<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function store(Request $request){
        $image = $request->file('file');
        $ImageName = Str::uuid() . "." . $image->extension();
        $imageServidor = Image::make($image);
        $imageServidor->fit(1000, 1000);
        $imagePath = public_path('uploads') . '/' . $ImageName;
        $imageServidor->save($imagePath);
        return response()->json(['image' => $ImageName]);
    }
}
