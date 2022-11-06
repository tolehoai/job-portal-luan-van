<?php

namespace App\Service;

use App\Models\Company;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UploadImageService
{
    public function store(UploadedFile $uploadedFile, Model $model)
    {
        $fileData = $this->uploads($uploadedFile, 'images/');
        return $model->image()->create([
            'path' => $fileData['filePath']
        ]);
    }

    public function uploads($file, $path)
    {
        if ($file) {

            $fileName = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName, File::get($file));
            $file_name = $file->getClientOriginalName();
            $file_type = $file->getClientOriginalExtension();
            $filePath = 'storage/' . $path . $fileName;

            return $file = [
                'fileName' => $file_name,
                'fileType' => $file_type,
                'filePath' => $filePath,
                'fileSize' => $this->fileSize($file)
            ];
        }
    }

    public function fileSize($file, $precision = 2)
    {
        $size = $file->getSize();

        if ($size > 0) {
            $size = (int)$size;
            $base = log($size) / log(1024);
            $suffixes = [' bytes', ' KB', ' MB', ' GB', ' TB'];
            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        }

        return $size;
    }

    public function updateImage(UploadedFile $uploadedFile, $companyId): Image
    {
        $fileData = $this->uploads($uploadedFile, 'images/');
        $imagePath = Company::find($companyId)->image->path;
        File::delete($imagePath);
        Log::info('Delete image path: ' . Company::find($companyId)->image->path);
        $image = Image::find(['imageable_id' => Auth::id()])->first();
        $image->path = $fileData['filePath'];
        $image->save();

        return $image;
    }
}
