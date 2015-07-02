<?php namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;

use DB;

class ImageController extends Controller {

    public function getImage($x, $y, $file) {
        // cari di database gambar dengan nama $file
        $image = DB::table('wallpaper')
        ->where('wallimg', $file)
        ->first();
        // ambil path-nya
        $fpath = public_path() . env('ASSET_SLUG') . $image->walldir . '/' . $image->wallimg;
        // resize
        $img = Image::make($fpath)->resize($x, $y);
        // return response
        return $img->response('jpg');

    }

}