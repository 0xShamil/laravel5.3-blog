<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

use Image;

class ImageRepository
{

    public function upload($photo)
    {
        $upload_dir = base_path() . '/public/uploads/';
        $originalName = $photo->getClientOriginalName();
        $extension = $photo->getClientOriginalExtension();
        $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - strlen($extension) - 1);

        $filename = $this->sanitize($originalNameWithoutExt);
        $allowed_filename = $this->createUniqueFilename( $filename, $extension, $upload_dir );

        //Image::make($photo)->resize(800, 240)->save( public_path('uploads/thumbs/' . $allowed_filename ) );

        $photo->move(base_path() . '/public/uploads/', $allowed_filename);

        return $allowed_filename;

    }

    public function update_avatar($avatar)
    {
        $avatar_dir = base_path() . '/public/uploads/avatars';

        $originalName = $avatar->getClientOriginalName();
        $extension = $avatar->getClientOriginalExtension();
        $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - strlen($extension) - 1);

        $filename = $this->sanitize($originalNameWithoutExt);
        $allowed_filename = $this->createUniqueFilename( $filename, $extension, $avatar_dir );

        Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $allowed_filename ) );

        return $allowed_filename;
    }

    public function createUniqueFilename( $filename, $extension, $dir_path )
    {
        if(!File::exists($dir_path)) {
            File::makeDirectory($dir_path, 0777, true, true);
        }

        $full_image_path = $dir_path . $filename . '.' . $extension;

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
