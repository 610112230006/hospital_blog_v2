<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function show_detail()
    {   
        $id_content = $_GET["id_content"];
        return view('pages.content.detail-content', compact('id_content'));
    }
}
