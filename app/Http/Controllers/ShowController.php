<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function ShowContentByCate()
    {
        if (isset($_GET['id_cate'])) {
            return view('pages.content.content-by-cate')->with('id_cate', $_GET['id_cate']);
        }
        return;
    }
    public function ShowContentBySubCate()
    {
        if (isset($_GET['id_subcate'])) {
            return view('pages.content.content-by-sub-cate')->with('id_subcate', $_GET['id_subcate']);
        }
        return;
    }
}
