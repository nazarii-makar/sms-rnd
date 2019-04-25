<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Image extends Model
{
    protected $fillable = [
        'filename',
    ];

    public static function createFromFile(UploadedFile $file): self
    {
        $filename = self::generateFilename($file);

        $file->move(self::storagePath(), $filename);

        return self::create([
            'filename' => $filename,
        ]);
    }

    public static function generateFilename(UploadedFile $file): string
    {
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $extension = $file->getClientOriginalExtension();

        return $filename . '_' . time() . '.' . $extension;
    }

    public static function storagePath(): string
    {
        return public_path('storage/images');
    }

    public static function filepath(string $filename): string
    {
        return public_path('storage/images') . DIRECTORY_SEPARATOR . ltrim($filename, DIRECTORY_SEPARATOR);
    }

    public function getFilepathAttribute(): string
    {
        return self::filepath($this->filename);
    }

    public function delete()
    {
        $status = parent::delete();

        if ($status) {
            if (file_exists($this->filepath)) {
                unlink($this->filepath);
            }
        }

        return $status;
    }
}
