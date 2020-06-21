<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Session;
use App\Categorie;
use App\Product;

class ProductsContoller extends MainController
{

    public function index()
    {
        self::$viewData['products'] = Product::all()->toArray();
        self::$viewData['categories'] = Categorie::all()->toArray();
        return view('cms.products_index', self::$viewData);
    }


    public function create()
    {
        self::$viewData['categories'] = Categorie::all()->toArray();
        return view('cms.product_add', self::$viewData);
    }


    public function store(ProductRequest $request)
    {
        Product::save_new($request);
        return redirect('cms/products');
    }


    public function show($id)
    {
        self::$viewData['product_id'] = $id;
        self::$viewData['product_name'] = Product::find($id)->toArray();

        return view('cms.product_delete', self::$viewData);
    }


    public function edit($id)
    {
        self::$viewData['item'] = Product::find($id)->toArray();
        self::$viewData['categories'] = Categorie::all()->toArray();
        return view('cms.product_edit', self::$viewData);
    }


    public function update(ProductRequest $request, $id)
    {
        Product::update_item($request, $id);
        return redirect('cms/products');
    }


    public function destroy($id)
    {
        Product::destroy($id);
        Session::flash('sm', 'Product was deleted');
        return redirect('cms/products');
    }
}