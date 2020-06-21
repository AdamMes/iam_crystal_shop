<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MainController extends Controller
{
    static public $viewData = ['page_title' => 'I AM |'];

    public function __construct()
    {
        self::$viewData['menu'] = Menu::all()->toArray();
    }
}