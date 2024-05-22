<?php
namespace App\Helper;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
trait ImageManagerTrait
{
    /**
     * @param object $file
     * @param string $path
     * @return array|void
     */
    public function uploads(object $file, string $path = 'images')
    {
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $file->storeAs($path, $fileName);
            $originFileName = $file->getClientOriginalName();
            $fileType = $file->getClientOriginalExtension();
            $filePath = asset('storage/images/'. $fileName);
            return [
                'path' => $filePath,
            ];
        }
    }
    /**
     * @param object $file
     * @param int $precision
     * @return mixed|string
     */
    public function fileSize(object $file, int $precision = 2): mixed
    {
        $size = $file->getSize();
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');
            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        }
        return $size;
    }
}
