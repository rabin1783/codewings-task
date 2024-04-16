<?php

namespace App;

trait Upload
{
    public function uploadFile($file) {
        $path = 'uploads/backend/';
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move($path, $fileName);
        $filePath = $path.$fileName;

        return $filePath;
    }
}
