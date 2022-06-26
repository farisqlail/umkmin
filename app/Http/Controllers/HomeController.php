<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProdukUmkm;
use App\Models\CategoriProd;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // ss
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $title = '';
        // if(request('category')){
        //     $category = CategoriProd::firstWhere('category_name', request('category'));
        //     $title = ' in ' . $category->category_name;
        // }


        // return view('home', [
        //     "title" => "All Posts",
        //     "active" => "posts",
        //     "products" => ProdukUmkm::latest()->filter(request(['search', 'category']))->paginate(8)->withQueryString(),
        //     "umkms" => User::latest()->filter(request(['search']))->paginate(8)->withQueryString()
        // ]);

        $title = '';
        if (request('category')) {
            $category = CategoriProd::firstWhere('category_name', request('category'));
            $title = ' in ' . $category->category_name;
        }

        $title = "All Posts";
        $active = "posts";
        $products = ProdukUmkm::latest()->filter(request(['search', 'category']))->paginate(8)->withQueryString();
        $umkms = User::with('foto')->where('role', 'umkm')->filter(request(['search']))->paginate(8)->withQueryString();

        return view('home', compact('title', 'active', 'products', 'umkms'));
    }

    public function profile($username)
    {
        $title = "Detail Umkm";
        $active = "posts";
        $umkm = User::with('foto')->where('name', $username)->first();
        $user = User::where('name', $username)->first();
        $products = ProdukUmkm::join('category_products as cp', 'umkm_products.category_id', '=', 'cp.id')
            ->join('users as u', 'umkm_products.user_id', '=', 'u.id')
            ->join('photos as p', 'umkm_products.photo_id', '=', 'p.id')
            ->where('umkm_products.user_id', $user->id)
            ->get();


        return view('layouts.company.profile', compact('title', 'active', 'umkm', 'products'));
        // $dataUmkm = User::where('id', $request->idUmkm)->get();
        // $dataProduk = ProdukUmkm::where('id', $request->idUmkm)->get();

        // return view('layouts.company.profile', [
        //     "title" => "Detail Umkm",
        //     "active" => "posts",
        //     'umkm' => $user,
        //     'products' => $dataProduk
        // ]);
    }

    public function catalog($slug)
    {
        //$dataUmkm = User::where('id', $request->idUmkm)->get();
        //$prodc = ProdukUmkm::where('id', $prod->id)->get();
        $title = "Detail Katalog";
        $active = "posts";

        $id = ProdukUmkm::where('slug', $slug)->first();
        $product = ProdukUmkm::join('category_products as cp', 'umkm_products.category_id', '=', 'cp.id')
            ->join('users as u', 'umkm_products.user_id', '=', 'u.id')
            ->join('photos as p', 'umkm_products.photo_id', '=', 'p.id')
            ->where('umkm_products.slug', $slug)
            ->first();

        $products = ProdukUmkm::join('category_products as cp', 'umkm_products.category_id', '=', 'cp.id')
            ->join('users as u', 'umkm_products.user_id', '=', 'u.id')
            ->join('photos as p', 'umkm_products.photo_id', '=', 'p.id')
            ->where('umkm_products.user_id', $id->user_id)
            ->get();
        // dd($product);

        $umkm = User::with('foto')->where('users.id', $id->user_id)->first();

        return view('layouts.company.catalog', compact('title', 'active', 'products', 'product', 'umkm'));
    }

    public function catalogs($name)
    {
        $title = "Katalog";
        $active = "posts";
        $umkm = User::with('foto')->where('name', $name)->first();
        $user = User::where('name', $name)->first();
        $products = ProdukUmkm::join('category_products as cp', 'umkm_products.category_id', '=', 'cp.id')
            ->join('users as u', 'umkm_products.user_id', '=', 'u.id')
            ->join('photos as p', 'umkm_products.photo_id', '=', 'p.id')
            ->where('umkm_products.user_id', $user->id)
            ->get();

        return view('layouts.company.catalogs', compact('title', 'active', 'products', 'umkm'));
    }

    public function appoinment($id, $name)
    {
        $title = "Buat Janji";
        $active = "posts";
        $umkm = User::with('foto')->where('name', $name)->first();
        $user = User::where('name', $name)->first();
        $products = ProdukUmkm::join('category_products as cp', 'umkm_products.category_id', '=', 'cp.id')
            ->join('users as u', 'umkm_products.user_id', '=', 'u.id')
            ->join('photos as p', 'umkm_products.photo_id', '=', 'p.id')
            ->where('umkm_products.user_id', $user->id)
            ->where('umkm_products.id', $id)
            ->get();
        return view('layouts.company.appointment', compact('title', 'active', 'umkm', 'products'));
    }

    public function cari()
    {
        $title = '';
        if (request('')) {
            $category = CategoriProd::firstWhere('category_name', request('category'));
            $title = ' in ' . $category->category_name;
        }

        $title = "All Posts";
        $active = "posts";
        $products = ProdukUmkm::latest()->filter(request(['search', 'category']))->paginate(8)->withQueryString();
        $umkms = User::with('foto')->where('role', 'umkm')->filter(request(['search']))->paginate(8)->withQueryString();

        return view('/products', compact('title', 'active', 'products', 'umkms'));
    }
}
