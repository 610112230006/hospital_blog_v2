<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditCategory extends Controller
{
    public function EditCate()
    {
        if (isset($_GET['id_cate'])) {
            return view('pages.admin.category.edit-category')->with('id_cate',$_GET['id_cate']);
        }
    }
    public function EditSubCate()
    {
        if (isset($_GET['id_subcate'])) {
            return view('pages.admin.category.edit-category')->with('id_subcate',$_GET['id_subcate']);
        }
    }
}
