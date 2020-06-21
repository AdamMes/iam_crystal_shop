<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Product;
use App\Categorie;

class PagesController extends MainController
{


    public function home()
    {

        self::$viewData['page_title'] .= ' Crystal Shop';
        self::$viewData['products'] = Product::all()->toArray();
        self::$viewData['categories'] = Categorie::all()->toArray();
        return view('home', self::$viewData);
    }

    public function content($url)
    {
        self::$viewData['contents'] = Content::getContent($url);
        self::$viewData['page_title'] .= !empty(self::$viewData['contents'][0]->title) ? self::$viewData['contents'][0]->title : ' Site Content';
        return view('content', self::$viewData);
    }
}