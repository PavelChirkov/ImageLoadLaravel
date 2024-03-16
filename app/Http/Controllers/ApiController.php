<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAll(){
        return response()->json([
            Image::get()
        ]);
    }
    public function getName(string $name){
        return response()->json([
            Image::where('name',$name)->take(1)->get()
        ]);
    }
    public function getId(int $id){
        return response()->json([
            Image::where('id',$id)->take(1)->get()
        ]);
    }
}
