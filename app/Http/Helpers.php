<?php

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

const IMGAGE_FOLDER = 'images/';
const TYPE_NEWS = 'news';
const TYPE_PRODUCTS = 'products';
const TYPE_DETAILS = 'details';
const TYPE_BANNERS = 'banners';

function getImage($image, $option)
{
    switch ($option) {
        case "news":
            if ($image == null) {
                return asset('images/news/default.png');
            }
            return asset('images/news/' . $image);
        case "products":
            if ($image == null) {
                return asset('images/products/default.png');
            }
            return asset('images/products/' . $image);
        case "details":
            if ($image == null) {
                return asset('images/details/default.png');
            }
            return asset('images/details/' . $image);
        case "banners":
            return asset('images/banners/' . $image);
        default:
    }
}

function storeImage($image, $option = '', $imageName)
{
    try {
        $imageContent = resizeImage($image, $option);
        $path = getImagePath($option);
        $img = $imageContent->save(public_path($path . $imageName));

        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function deleteImage($name)
{
    try {
        $imagePath = public_path(IMGAGE_FOLDER);
        if (file_exists($imagePath . $name)) {
            @unlink($imagePath . $name);
        }

        $files = glob($imagePath . '**/' . $name);
        foreach ($files as $key => $file) {
            @unlink($file);
        }

        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function getUrl($name, $id)
{
    return [
        'name' => Str::slug($name),
        'id' => $id
    ];
}
  
/**
 * Random name for image
 * @return string
 */
function createImageName($extension)
{
    return rand(10000000, 99999999) . "_" . rand(10000000, 99999999) . "_" . rand(10000000, 99999999) . '.' . $extension;
}

/**
 * Resize and format images
 * @param $file
 * @param $option : avatar, logo, thumbnail, detail
 * @return \Intervention\Image\Image
 */
function resizeImage($file, $option)
{
    Image::configure(array('driver' => 'gd'));

    switch ($option) {
        case TYPE_NEWS:
            $img =  Image::make($file);
            return $img;
        case TYPE_PRODUCTS:
            $img =  Image::make($file);
            return $img;
        case TYPE_DETAILS:
            $img =  Image::make($file);
            return $img;
        case TYPE_BANNERS:
            $img =  Image::make($file);
            return $img;
        default:
            return Image::make($file);
    }
}

/**
 * Random name for image
 * @return string
 */
function getImagePath($option)
{
    $basePath = IMGAGE_FOLDER;
    switch ($option) {
        case TYPE_NEWS:
            return $basePath . $option . '/';
        case TYPE_PRODUCTS:
            return $basePath . $option . '/';
        case TYPE_DETAILS:
            return $basePath . $option . '/';
        case TYPE_BANNERS:
            return $basePath . $option . '/';
        default:
            return $basePath;
    }
}
