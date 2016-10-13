<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

use Image;

class ImageRepository
{

    public function upload($photo)
    {
        $originalName = $photo->getClientOriginalName();
        $extension = $photo->getClientOriginalExtension();
        $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - strlen($extension) - 1);

        $filename = $this->sanitize($originalNameWithoutExt);
        $allowed_filename = $this->createUniqueFilename( $filename, $extension );

        //create thumb
        Image::make($photo)->resize(800, 240)->save( public_path('uploads/thumbs/' . $allowed_filename ) );

        $photo->move(base_path() . '/public/uploads/', $allowed_filename);

        return $allowed_filename;

    }

    public function update_avatar($avatar)
    {
        $originalName = $avatar->getClientOriginalName();
        $extension = $avatar->getClientOriginalExtension();
        $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - strlen($extension) - 1);

        $filename = $this->sanitize($originalNameWithoutExt);
        $allowed_filename = $this->createUniqueFilename( $filename, $extension );

        Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $allowed_filename ) );

        return $allowed_filename;
    }

    public function createUniqueFilename( $filename, $extension )
    {
        $full_size_dir = base_path() . '/public/uploads/';
        $full_image_path = $full_size_dir . $filename . '.' . $extension;

        if ( File::exists( $full_image_path ) )
        {
            // Generate token for image
            $imageToken = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $imageToken . '.' . $extension;
        }

        return $filename . '.' . $extension;
    }

    function sanitize($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }
}
