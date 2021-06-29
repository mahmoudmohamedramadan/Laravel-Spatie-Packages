<?php

use Illuminate\Support\Str;


/**
 * Upload your file via this function
 *
 * @param string
 * @return string
 */
function uploadFile($fileName, $filePath, $after)
{
    if (request()->hasFile($fileName)) {
        /* store uploaded file, then get the image path */
        $uploadedImage = request()->file($fileName)->store($filePath);
        /* get the image's hash name WITH its extension */
        return Str::after($uploadedImage, $after);
    }

    return NULL;
}
