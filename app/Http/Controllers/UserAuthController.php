<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User\User;
use Illuminate\Support\Carbon;
use App\Models\CategoriProd;

class UserAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function indexregistervisitor()
    {
     
        return view ('user.visitor.pages.register_visitor');
    }

    public function indexregistermitra()
    {
        $categories = CategoriProd::all();
        return view ('user.mitra.pages.register_mitra', compact('categories'));
    }
    // public function indexregisteruser()
    // {
    //     return view ('layout.user.register');
    // }

    // public function indexforgotuser()
    // {
    //     return view ('layout.user.forgot');
    // }

    // public function indexotpuser()
    // {
    //     return view ('layout.user.otp');
    // }

    // public function indexsandiuser()
    // {
    //     return view ('layout.user.sandi');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
