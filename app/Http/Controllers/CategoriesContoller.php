<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieRequest;
use Illuminate\Support\Facades\Session;
use App\Categorie;

class CategoriesContoller extends MainController
{

    public function index()
    {
        self::$viewData['categories'] = Categorie::all()->toArray();
        return view('cms.categories_index', self::$viewData);
    }


    public function create()
    {
        return view('cms.category_add', self::$viewData);
    }


    public function store(CategorieRequest $request)
    {
        Categorie::save_new($request);
        return redirect('cms/categories');
    }


    public function show($id)
    {
        self::$viewData['category_id'] = $id;
        self::$viewData['category_name'] = Categorie::find($id)->toArray();

        return view('cms.category_delete', self::$viewData);
    }


    public function edit($id)
    {
        self::$viewData['item'] = Categorie::find($id)->toArray();
        return view('cms.category_edit', self::$viewData);
    }


    public function update(CategorieRequest $request, $id)
    {
        Categorie::update_item($request, $id);
        return redirect('cms/categories');
    }


    public function destroy($id)
    {
        Categorie::destroy($id);
        Session::flash('sm', 'Category was deleted');
        return redirect('cms/categories');
    }
}