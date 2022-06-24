<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProdukUmkm;
use App\Models\Foto;
use App\Models\CategoriProd;
use Illuminate\Http\Request;

class ProdukUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('category')){
            $category = CategoriProd::firstWhere('category_name', request('category'));
        }

        // if(request('author')){
        //     $author = User::firstWhere('username', request('author'));
        //     $title = ' by ' . $author->name;  
        // }
        $categories = CategoriProd::all();

        return view('layouts.company.product', [
            "title" => "Produk UMKM",
            "active" => "posts",
            "product" => ProdukUmkm::latest()->filter(request(['search', 'category']))->paginate(9)->withQueryString(),
            'categories' => $categories
        ]);

        // $umkm_prod = ProdukUmkm::all();

        // // return response()->json([
        // //     'code' => 200,
        // //     'status' => 'success',
        // //     'message' => 'Produk retrieved successfully',
        // //     'data' => $umkm_prod
        // // ]);

        // return view('layouts.company.product', [
        //     "title" => "Single Posts",
        //     "active" => "posts",
        //     "product" => $umkm_prod
        // ]);
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
        $umkm_prod = ProdukUmkm::create([
            'prod_name' => $request->prod_name,
            'prod_slug' => $request->prod_slug,
            'prod_title' => $request->prod_title,
            'prod_desc' => $request->prod_desc,
            'category_id' => $request->category_id,
            'photo_id' => $request->photo_id,
            'user_id' => $request->user_id
        ]);
        
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Produk created successfully',
            'data' => $umkm_prod
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukUmkm $umkm_prod)
    {
        $umkm_prod = ProdukUmkm::where('id', $umkm_prod->id);


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
    public function update(Request $request, ProdukUmkm $umkm_prod)
    {
        $umkm_prod->update([
            'prod_name' => $request->prod_name,
            'prod_slug' => $request->prod_slug,
            'prod_title' => $request->prod_title,
            'prod_desc' => $request->prod_desc,
            'category_id' => $request->category_id,
            'photo_id' => $request->photo_id,
            'user_id' => $request->user_id
        ]);
        
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Produk updated successfully',
            'data' => $umkm_prod
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukUmkm $umkm_prod)
    {
        $umkm_prod->delete();

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Produk deleted successfully',
            'data' => $umkm_prod
        ]);
    }
    
    public function byCategory($category)
    {
        $title = "Produk UMKM";
        $active = "posts";
        $product = ProdukUmkm::join('category_products as cp', 'umkm_products.category_id', '=', 'cp.id')
                              ->where('cp.id', $category)->get();
        $categories = CategoriProd::all();

        return view('layouts.company.product', compact('title', 'active', 'product', 'categories'));
    }
}
