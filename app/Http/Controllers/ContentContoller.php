<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;
use Illuminate\Support\Facades\Session;
use App\Menu;
use App\Content;

class ContentContoller extends MainController
{

    public function index()
    {
        self::$viewData['contents'] = Content::all()->toArray();
        return view('cms.content_index', self::$viewData);
    }


    public function create()
    {
        return view('cms.content_add', self::$viewData);
    }


    public function store(ContentRequest $request)
    {
        Content::save_new($request);
        return redirect('cms/content');
    }


    public function show($id)
    {
        self::$viewData['content_id'] = $id;
        self::$viewData['content_name'] = Content::get_name_by_id($id);
        return view('cms.content_delete', self::$viewData);
    }


    public function edit($id)
    {
        self::$viewData['item'] = Content::find($id)->toArray();
        return view('cms.content_edit', self::$viewData);
    }


    public function update(ContentRequest $request, $id)
    {
        Content::update_item($request, $id);
        return redirect('cms/content');
    }


    public function destroy($id)
    {
        Content::destroy($id);
        Session::flash('sm', 'Content was deleted');
        return redirect('cms/content');
    }
}