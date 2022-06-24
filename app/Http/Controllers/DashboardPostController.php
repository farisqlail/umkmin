<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProdukUmkm;
use App\Models\CategoriProd;
use App\Models\Foto;
use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idProduk = ProdukUmkm::where('user_id', auth()->user()->id)->first();
        return view('dashboard.posts.index', [
            'products' => ProdukUmkm::where('user_id', auth()->user()->id)->get(),
            'umkm' => User::where('id', auth()->user()->id)->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoriProd::all();
        return view('dashboard.posts.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            'category_id' => 'required',  
            'prod_title' => 'required|max:255',
            'prod_name' => 'required|max:255',
            'slug' => 'required',
            'image' => 'image|file|max:1024',
            'prod_desc' => 'required'
        ]);

        if($request->file('image')){
            $validatedPhoto['photo_name'] = $request->file('image')->store('post-images');
        }   

        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->prod_desc), 200);

        $idPhoto = Foto::create($validatedPhoto)->id;
        
        $validatedData['photo_id'] = $idPhoto;
        ProdukUmkm::create($validatedData);

        return redirect('/dashboard/posts')->with('status', 'product-created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdukUmkm  $post
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukUmkm $post)
    {
        return view('dashboard.posts.show', [
            'product' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukUmkm  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukUmkm $post)
    {
        return view('dashboard.posts.edit', [
            'product' => $post,
            'categories' => CategoriProd::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Models\Foto
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukUmkm  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdukUmkm $post)
    {
        $rules = [ 
            'category_id' => 'required',  
            'prod_title' => 'required|max:255',
            'prod_name' => 'required|max:255',
            'slug' => 'required',
            'prod_desc' => 'required'
        ];

        
        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:umkm_products';
        }

        $validatedPhoto = $request->validate([
            'photo_name' => 'image|file|max:1024'
        ]);

        $validatedData = $request->validate($rules);

        if($request->file('photo_name')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedPhoto['photo_name'] = $request->file('photo_name')->store('post-images');
        }   



        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        ProdukUmkm::where('id', $post->id)
                ->update($validatedData);
        
        Foto::where('id', $post->photo_id )
                ->update($validatedPhoto);

        return redirect('/dashboard/posts')->with('status', 'product-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukUmkm  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukUmkm $post)
    {
        ProdukUmkm::destroy($post->id);
        if($post->image){
            Storage::delete($post->image);
        }
        return redirect('/dashboard/posts')->with('status', 'product-destroy');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(ProdukUmkm::class, 'slug', $request->prod_name);
        return response()->json(['slug' => $slug]);
    }

    public function email()
    {
        $emails = Email::where('to_email', auth()->user()->email)
                        ->where('status', 'pending')->get();
        return view('dashboard.posts.email', compact('emails'));
    }

    public function user($id)
    {
        $user = User::with('foto')->where('id', $id)->first();
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'User',
            'data' => $user
        ]);
    }
    
    public function index2()
    {
        $idProduk = ProdukUmkm::where('user_id', auth()->user()->id)->first();
        if (auth()->user()->photo_id == null) {
            return view('dashboard.index', [
                'products' => ProdukUmkm::where('user_id', auth()->user()->id)->get(),
                'umkm' => User::with('foto')->where('id', auth()->user()->id)->first(),
                'umkms' => User::where('id', auth()->user()->id)->first()
            ]);
        } else {
            return view('dashboard.index', [
                'products' => ProdukUmkm::where('user_id', auth()->user()->id)->get(),
                'umkm' => User::with('foto')->where('users.id', auth()->user()->id)->first(),
                'umkms' => User::where('id', auth()->user()->id)->first()
            ]);
        }
        
    }

    public function showForgetPasswordForm()
    {
       return view('auth.pages.forgot');
    }

}
