<?php


namespace App\Http\Services;


use Illuminate\Support\Facades\Storage;

class FileService
{
    public static function uploadFile($file, $defaultFile = 'default.jpg', $folder = '/')
    {
        if ($file !== null) {
            $path = $file->store($folder, 'public');
        } else {
            $path = $defaultFile;
        }
        return $path;
    }


    public static function deleteFile($file, $folder = 'public/', $defaultFiles = ['default.jpg', 'logo.jpg', 'category.jpg', 'work.jpg'])
    {
       $path = $folder . $file;
        if (Storage::exists($path) && !in_array($file, $defaultFiles)) {
            Storage::delete($path);
        }
    }

    public static function updateFile($file , $previousFile, $folder="/", $disk="public/")
    {
        $path = $disk . $previousFile;
        if($file !== null){
            Storage::delete($path);
            $path = $file->store($folder,'public');
        } else {
            $path = $previousFile;
        }
        return $path;

    }

    public static function uploadFileCategory($file, $defaultFile = 'category.jpg', $folder = '/')
    {
        if ($file !== null) {
            $path = $file->store($folder, 'public');
        } else {
            $path = $defaultFile;
        }
        return $path;
    }


    public static function deleteFileCateg($file, $folder = 'public/', $defaultFiles = ['default.jpg', 'logo.jpg', 'category.jpg', 'work.jpg'])
    {
        $path = $folder . $file;
        if (Storage::exists($path) && !in_array($file, $defaultFiles)) {
            Storage::delete($path);
        }
    }

    public static function updateFileCategory($file , $previousFile, $folder="/", $disk="public/")
    {
        $path = $disk . $previousFile;
        if($file !== null){
            Storage::delete($path);
            $path = $file->store($folder,'public');
        } else {
            $path = $previousFile;
        }
        return $path;

    }

    public static function uploadFileWork($file, $defaultFile = 'default.jpg', $folder = '/')
    {
        if ($file !== null) {
            $path = $file->store($folder, 'public');
        } else {
            $path = $defaultFile;
        }
        return $path;
    }


    public static function deleteFileWork($file, $folder = 'public/', $defaultFiles = ['default.jpg', 'logo.jpg', 'category.jpg', 'work.jpg'])
    {
        $path = $folder . $file;
        if (Storage::exists($path) && !in_array($file, $defaultFiles)) {
            Storage::delete($path);
        }
    }

    public static function updateFileWork($file , $previousFile, $folder="/", $disk="public/")
    {
        $path = $disk . $previousFile;
        if($file !== null){
            Storage::delete($path);
            $path = $file->store($folder,'public');
        } else {
            $path = $previousFile;
        }
        return $path;

    }

}
