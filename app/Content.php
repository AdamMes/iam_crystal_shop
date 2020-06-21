<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Content extends Model
{
    static public function getContent($url)
    {
        $content = DB::table('contents as c')
            ->join('menus as m', 'm.id', '=', 'c.menu_id')
            ->where('m.url', '=', $url)
            ->select('c.*', 'm.title')
            ->get()
            ->toArray();

        return $content;
    }

    static public function get_name_by_id($id)
    {

        $content_name = DB::table('contents as c')
            ->select('c.ctitle')
            ->where('c.id', '=', $id)
            ->first();

        return $content_name;
    }

    static public function save_new($request)
    {
        $content = new self();
        $content->menu_id = $request['menu_id'];
        $content->ctitle = $request['title'];
        $content->article = $request['article'];
        $content->save();

        Session::flash('sm', "Content is saved!");
    }

    static public function update_item($request, $id)
    {
        $content = self::find($id);
        $content->ctitle = $request['title'];
        $content->article = $request['article'];
        $content->save();

        Session::flash('sm', "Content is updated!");
    }
}