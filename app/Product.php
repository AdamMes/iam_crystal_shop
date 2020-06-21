<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Cart;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;


class Product extends Model
{
    static public function getProducts($curl, &$viewData, $request)
    {
        $products = DB::table('products as p')
            ->join('categories as c', 'c.id', '=', 'p.categorie_id')
            ->select('p.*', 'c.ctitle', 'c.curl')
            ->where('c.curl', '=', $curl);

        if ($request['orderBy'] == 'lowest-price') {
            $products = $products->orderBy('p.pprice', 'asc');
        }
        if ($request['orderBy'] == 'heigh-price') {
            $products = $products->orderBy('p.pprice', 'desc');
        }
        if ($request['orderBy'] == 'newest') {
            $products = $products->orderBy('p.updated_at', 'desc');
        }
        if ($request['orderBy'] == 'oldest') {
            $products = $products->orderBy('p.updated_at', 'asc');
        }


        $products = $products->paginate(6);

        if ($products->count() == 0) {
            abort(404);
        }

        $viewData['ppagination'] = $products;
        $viewData['products'] = $products;
        $viewData['page_title'] .= ' ' . $products[0]->ctitle . ' Crystals';
    }


    static public function getItem($purl, &$viewData)
    {
        $product = DB::table('products as p')
            ->join('categories as c', 'c.id', '=', 'p.categorie_id')
            ->select('p.*', 'c.ctitle', 'c.curl')
            ->where('p.purl', '=', $purl)
            ->first();

        if (!$product) {
            abort(404);
        }

        $viewData['item'] = $product;
        $viewData['page_title'] .= ' ' . $product->ptitle;
    }

    static public function addToCart($pid)
    {
        if (is_numeric($pid)) {

            if ($product = self::find($pid)) {

                $product = $product->toArray();

                if (!Cart::get($pid)) {
                    Cart::add($pid, $product['ptitle'], $product['pprice'], 1, array('image' => $product['pimage']));
                    Session::flash('sm', $product['ptitle'] . ' was added to cart');
                }
            }
        }
    }

    static public function updateCart($pid, $op)
    {

        if (is_numeric($pid)) {

            if (Cart::get($pid)) {

                if ($op == 'dec-btn') {
                    Cart::update($pid, ['quantity' => -1]);
                    $product = self::find($pid);
                    Session::flash('sm', $product['ptitle'] . ' quantity updated');
                } else if ($op == 'inc-btn') {
                    Cart::update($pid, ['quantity' => 1]);
                    $product = self::find($pid);
                    Session::flash('sm', $product['ptitle'] . ' quantity updated');
                }
            }
        }
    }

    //CMS METHODS

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

        $product = new self();
        $product->categorie_id = $request['category_id'];
        $product->ptitle = $request['title'];
        $product->particle = $request['article'];
        $product->pimage = $image_name;
        $product->pcolor = $request['color'];
        $product->psize = $request['size'];
        $product->pweight = $request['weight'];
        $product->plocation = $request['location'];
        $product->pprice = $request['price'];
        $product->purl = $request['url'];
        $product->save();

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

        $product = self::find($id);
        $product->categorie_id = $request['category_id'];
        $product->ptitle = $request['title'];
        $product->particle = $request['article'];
        if ($image_name) {
            $product->pimage = $image_name;
        }
        $product->pcolor = $request['color'];
        $product->psize = $request['size'];
        $product->pweight = $request['weight'];
        $product->plocation = $request['location'];
        $product->pprice = $request['price'];
        $product->purl = $request['url'];
        $product->save();

        Session::flash('sm', "Products was updated!");
    }
}