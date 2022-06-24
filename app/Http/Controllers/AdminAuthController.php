<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Admin;
use Illuminate\Support\Carbon;
use App\Models\CategoriProd;
use App\Models\User;
use Validator;

class AdminAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories = CategoriProd::paginate(10);
        $users = User::paginate(10);

        return view('dashboard.posts.admin', compact('categories','users'));
    }


    // public function loginadmin(Request $request)
    // {
    //     $this->validate($request, [
    //         'name_emp' => 'required',
    //         'pass_emp' => 'required',
    //     ]);

    //     if (Auth::guard('admin')->attempt(['name_emp' => $request->name_emp, 'password' => $request->pass_emp])) {
    //         $request->session()->regenerate();
    //         // return redirect()->intended('/admin/dashboard');
    //         echo ('Login Berhasil');
    //     } else {
    //         return redirect()->intended('login')
    //         // ->with('error', 'Akun tidak ditemukan, periksa kembali email/password Anda')
    //         ;
    //     }
    // }



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
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:category_products',
        ]);

        if($validator->fails()) {
            return redirect('/manajemen')->with('danger', $validator->errors());
        }
        
        $category = [
            'category_name' => $request->category_name
        ];

        CategoriProd::create($category);
        return redirect('/manajemen/categories')->with('success', 'New category han been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = CategoriProd::where('id', $id)->first();
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
    public function update(Request $request)
    {
        $data = [
            'category_name' => $request->category_name2
        ];
        CategoriProd::where('id', $request->id)->update($data);
        return redirect('/manajemen/categories')->with('success', 'Category has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriProd $category)
    {
        CategoriProd::destroy($category->id);
        return redirect('/manajemen/categories')->with('success', 'Category has been deleted!');
    }

    public function storeCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:category_products',
        ]);

        if($validator->fails()) {
            return redirect('/manajemen/categories')->with('danger', $validator->errors());
        }
        
        $category = [
            'category_name' => $request->category_name
        ];

        CategoriProd::create($category);
        return redirect('/manajemen/categories')->with('success', 'New category han been added!');
    }
}
