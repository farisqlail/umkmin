<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Models\CategoriProd;
use Illuminate\Http\Request;

class CategoriController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = CategoriProd::with('produk')->get();

        return $this->sendResponse($category, 'Successfully get category');
    
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
        $category = CategoriProd::create([
            'category_name' => $request->category_name
        ]);
    
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Categori created successfully',
            'data' => $category
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = CategoriProd::where('id', $id);
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Categori update',
            'data' => $category
        ]);
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
    public function update(Request $request, CategoriProd $category)
    {
        $category->update([
            'category_name' => $request->category_name
        ]);
    
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Categori updated successfully',
            'data' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriProd $category)
    {
        $category->delete();

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Categori deleted successfully',
            'data' => $category
        ]);
    }

}
