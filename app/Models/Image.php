<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public $fillable = ['name', 'options'];

    static public function saveName($file)
    {

        $enName = str_slug(str_replace("." . $file->extension(), "", $file->getClientOriginalName()));

        while (Image::where('name', $enName)->count() > 0) {
            $enName .= rand(1, 9);
        }

        $filePath = '/images/' . $enName . '.' . $file->extension();

        self::create([
            'name' => $enName,
            'options' => json_encode([
                'en_name_extension' => $enName . '.' . $file->extension(),
                'original_name' => $file->getClientOriginalName(),
                'extension' => $file->extension(),
                'file_path' => $filePath
            ])
        ]);

        return [$filePath,$enName.'.'. $file->extension()];
    }
}
