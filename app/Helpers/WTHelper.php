<?php

namespace App\Helpers;
use Image;

class WTHelper
{
	public static function processPost($image){

        $img = Image::make($image);

        // //landscape
        // if($img->width() > $img->height()){
        //     $img->resize(1280, null, function ($constraint){    $constraint->aspectRatio(); });
        // }
        // //portrait
        // if($img->width() <= $img->height()){
        //     $img->resize(null, 1280, function ($constraint){    $constraint->aspectRatio(); });
        // }

        // $img->brightness(0);
        // $img->contrast(5);
        // $img->encode('jpg',90);

        return $img;

    }
    public static function processAvatar($image){

    }

    public static function randomString($length) {
      $str = "";
      $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
      $max = count($characters) - 1;
      for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
      }
      return $str;
    }

}
