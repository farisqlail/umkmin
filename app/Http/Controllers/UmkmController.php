<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProdukUmkm;
use App\Models\CategoriProd;

class UmkmController extends Controller
{
    public function index()
    {
        $categories = CategoriProd::all();
        return view('layouts.company.index', [
            "title" => "UMKM",
            "active" => "posts",
            "umkms" => User::with('foto')->where('role', 'umkm')->latest()->filter(request(['search']))->paginate(9)->withQueryString(),
            'categories' => $categories
        ]);

        // $umkm = User::where('role', 'umkm')->get();

        // return view('layouts.company.index', [
        //     "title" => "Single Posts",
        //     "active" => "posts",
        //     "umkms" => $umkm
        // ]);
    }

    public function show(ProdukUmkm $umkm_prod)
    {
        $umkm_prod = ProdukUmkm::where('id', $umkm_prod->id);
        $umkm_prods = ProdukUmkm::all();
        $umkm = User::where('id', $umkm_prod->id);

        return view('layouts.company.profile', [
            'product' => $umkm_prod,
            'products' => $umkm_prods,
            'umkm' => $umkm
        ]);
        
    }

    public function byCategory($category)
    {
        $title = "UMKM";
        $active = "posts";
        $umkms = User::where('business_sector' , 'like' , '%' . $category . '%')->get();
        $categories = CategoriProd::all();

        return view('layouts.company.index', compact('title', 'active', 'umkms', 'categories'));
        
    }

    public function ubah(Request $request)
    {
        $data['category_name'] = $request->category_name;
        CategoriProd::where('id', $request->id)->update($data);
        return redirect('/manajemen/categories')->with('success', 'Category has been update!');
    }

}
