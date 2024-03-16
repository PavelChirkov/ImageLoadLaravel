<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\Image;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageController extends Controller
{
    public function upload(Request $request)
    {

        if ($files = $request->file('image')) {
            foreach ($files as $file) {

                $enNameExtension = Image::saveName($file);
                $file->move('images', $enNameExtension[0]);

                $manager = new ImageManager(new Driver());
                $image = $manager->read('.'.$enNameExtension[0]);
                $image->scale(width: 300)
                    ->toJpeg()
                    ->save('images/resize/' . $enNameExtension[1] );
            }
            return redirect()->route('info');
        }else{
            return redirect('/');
        }
    }

    public function zip(Request $request)
    {
        $name = explode(".", $request->input('name'));
        $file = './images/' .  $request->input('name');
        $zipFile = './export/' . $name[0] . '.zip';
        $zip = new \ZipArchive();
        if ($zip->open($zipFile, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== TRUE) {
            throw new \Exception('Cannot create a zip file');
        }
        $zip->addFile($file, $request->input('name'));
        $zip->close();
        return response()->download($zipFile);
    }

    public function info(Request $request)
    {
        $name = $request->input('name');
        $by = trim($request->input('by'));
        if($name && $by)  {
            $images = Image::orderBy($name, $by);
            if($by == 'asc') $by = 'desc';else $by = 'asc';
        }
        else $images = new Image();
        return view('images_info', ['images' =>  $images->get(), 'name' => $name, 'by' => $by ]);
    }

}
