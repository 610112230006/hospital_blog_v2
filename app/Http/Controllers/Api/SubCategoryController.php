<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcate = SubCategory::get();
        return response()->json($subcate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubCategory::create([
            'name'=> $request->nameSubCate,            
            'category_id'=> $request->category_id,            
            'type'=> $request->type,            
        ]);
        return response()->json('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'category_id' => 'required',
                'type' => 'required',
            ],
            [
                'name.required' => 'กรุณากรอกชื่อหมวดหมู่',
                'category_id.required' => 'กรุณาเลือกหมวดหมู่หลัก',
                'type.required' => 'กรุณาเลือกประเภทหมวดหมู่',
            ]
        );
        $data = SubCategory::find($id)->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'type' => $request->type,
        ]);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcate = SubCategory::find($id)->delete();
        return response()->json($subcate);
    }
}
