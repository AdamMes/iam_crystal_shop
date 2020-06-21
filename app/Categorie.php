<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class Categorie extends Model
{
    static public function save_new($request)
    {
        $image_name = 'default-image.jpg';
        $ex = ['png', 'jpg', 'jpeg', 'gif', 'bmp'];

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if (isset($_FILES['image']['name'])) {
                $file_info = pathinfo($_FILES['image']['name']);
                if (in_array(strtolower($file_info['extension']), $ex)) {
                    if (isset($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {

                        $file = $request->file('image');
                        $image_name = date('d.m.Y.H.i.s') . '-' . $file->getClientOriginalName();
                        $request->file('image')->move(public_path() . '/images', $image_name);
                        $img = Image::make(public_path() . '/images/' . $image_name);
                        $img->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        $img->save();
                    }
                }
            }
        }

        $category = new self();
        $category->ctitle = $request['title'];
        $category->carticle = $request['article'];
        $category->curl = $request['url'];
        $category->cimage = $image_name;
        $category->save();

        Session::flash('sm', "Category was saved!");
    }

    static public function update_item($request, $id)
    {

        $image_name = '';
        $ex = ['png', 'jpg', 'jpeg', 'gif', 'bmp'];

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if (isset($_FILES['image']['name'])) {
                $file_info = pathinfo($_FILES['image']['name']);
                if (in_array(strtolower($file_info['extension']), $ex)) {
                    if (isset($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {

                        $file = $request->file('image');
                        $image_name = date('d.m.Y.H.i.s') . '-' . $file->getClientOriginalName();
                        $request->file('image')->move(public_path() . '/images', $image_name);
                        $img = Image::make(public_path() . '/images/' . $image_name);
                        $img->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        $img->save();
                    }
                }
            }
        }

        $category = self::find($id);
        $category->ctitle = $request['title'];
        $category->carticle = $request['article'];
        $category->curl = $request['url'];
        if ($image_name) {
            $category->cimage = $image_name;
        }
        $category->save();

        Session::flash('sm', "Category was updated!");
    }
}