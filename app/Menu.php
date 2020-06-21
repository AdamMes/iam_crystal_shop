<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    static public function save_new($request)
    {
        $menu = new self();
        $menu->link = $request['link'];
        $menu->url = $request['url'];
        $menu->title = $request['title'];
        $menu->save();

        Session::flash('sm', "Menu is saved!");
    }

    static public function get_name_by_id($id)
    {

        $menu_name = DB::table('menus as m')
            ->select('m.title')
            ->where('m.id', '=', $id)
            ->first();

        return $menu_name;
    }

    static public function update_item($request, $id)
    {
        $menu = self::find($id);
        $menu->link = $request['link'];
        $menu->url = $request['url'];
        $menu->title = $request['title'];
        $menu->save();

        Session::flash('sm', "Menu is updated!");
    }
}