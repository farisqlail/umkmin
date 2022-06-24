<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use Auth;
use App\Models\User;
use App\Models\Foto;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.pages.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function register(Request $request)
    {
        if($request->role === 'umkm'){
            $validator = Validator::make($request->all(), [
                'role' => 'required',
                'name' => 'required',
                'email' => 'required|email:dns|unique:users',
                'username' => 'required|unique:users',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);
    
            if($validator->fails()) {
                return redirect('/registermitra')->with('danger', $validator->errors());
            }
    
            $user = User::create([
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'telp' => $request->telp,
                'address' => $request->address,
                'website' => $request->website,
                'business_sector' => $request->business_sector,
                'desc' => $request->desc,
            ]);
    
            $token = $user->createToken('auth_token')->plainTextToken;
            $user->sendEmailVerificationNotification();
    
            return redirect('/login')->with('status', 'success');
        }
        elseif ($request->role === 'user'){
            $validator = Validator::make($request->all(), [
                'role' => 'required',
                'name' => 'required',
                'email' => 'required|email:dns|unique:users',
                'username' => 'required|unique:users',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);
    
            if($validator->fails()) {
                return redirect('/registervisitor')->with('danger', $validator->errors());
            }
    
            $user = User::create([
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
    
            $token = $user->createToken('auth_token')->plainTextToken;
            $user->sendEmailVerificationNotification();
    
            return redirect('/login')->with('status', 'success');
        }
        


    }

    public function login(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(!FacadesAuth::attempt($data))
        { 
            return redirect('/login')->with('status', 'failed');
        }

        $user = User::where('username', $request->username)->firstOrFail();

        $token = $user->createToken($request->username)->plainTextToken;

        return redirect('/')->with('status', 'success');
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout success!!!');
    }

    public function verify($userId, Request $request)
    {
        if(!$request->hasValidSignature()) 
        {
            return response()->json([
                'code' => 400,
                'message' => 'Invalid signature'
            ], 400);
        }

        $user = User::findOrFail($userId);

        if(!$user->hasVerifiedEmail()) 
        {
            $user->markEmailAsVerified();
        }

        return redirect('/login')->with('success', 'Email verified success');
    }

    public function resend(Request $request)
    {
        $user = User::find($equest->id);

        if(auth()->user()->hasVerifiedEmail()) {
            return response()->json([
                'code' => 422,
                'message' => 'Email already verified'
            ], 422);
        }

        $user->sendEmailVerificationNotification();

        return response()->json([
            'code' => 200,
            'message' => 'Success resend email verification'
        ]);
    }

    public function update(Request $request)
    {
        if($request->role === 'umkm'){

            if(auth()->user()->photo_id == null){

                if ($request->photo_name == null) {
                    $user = [
                        'name' => 'required',
                        'telp' => 'required',
                        'address' => 'required',
                        'website' => 'required',
                        'business_sector' => 'required',
                        'desc' => 'required'
    
                    ];
        
                    $validatedData = $request->validate($user);
        
                    User::where('id', $request->id_umkm)->update($validatedData);
                    return redirect('/dashboard')->with('status', 'umkm-updated');
                } else {
                    $validatedPhoto = $request->validate([
                        'photo_name' => 'image|file|max:1024'
                    ]);
    
                    if($request->file('photo_name')){
                        $validatedPhoto['photo_name'] = $request->file('photo_name')->store('post-images');
                    }   
                    $idPhoto = Foto::create($validatedPhoto)->id;
                    $user = [
                        'name' => 'required',
                        'telp' => 'required',
                        'address' => 'required',
                        'website' => 'required',
                        'business_sector' => 'required',
                        'desc' => 'required'
    
                    ];
        
                    $validatedData = $request->validate($user);
                    $validatedData['photo_id'] = $idPhoto;
        
                    User::where('id', $request->id_umkm)->update($validatedData);
                    return redirect('/dashboard')->with('status', 'umkm-updated');
                }

            }else{
                $validatedPhoto = $request->validate([
                    'photo_name' => 'image|file|max:1024'
                ]);
    
                if($request->file('photo_name')){
                    if($request->oldImage){
                        Storage::delete($request->oldImage);
                    }
                    $validatedPhoto['photo_name'] = $request->file('photo_name')->store('post-images');
                }   
                $idPhoto = $request->photo_id;
                
                
                Foto::where('id', $request->photo_id)
                ->update($validatedPhoto);
                $user = [
                    'name' => 'required',
                    'telp' => 'required',
                    'address' => 'required',
                    'website' => 'required',
                    'business_sector' => 'required',
                    'desc' => 'required'
                ];
    
                $validatedData = $request->validate($user);
                $validatedData['photo_id'] = $idPhoto;
    
                User::where('id', $request->id_umkm)->update($validatedData);
                
                return redirect('/dashboard')->with('status', 'umkm-updated');
            }

          
        }
        elseif ($request->role === 'user'){
            $validator = Validator::make($request->all(), [
                'role' => 'required',
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'username' => 'required|unique:users',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);
    
            if($validator->fails()) {
                return redirect('/registervisitor')->with('danger', $validator->errors());
            }
    
            $user = User::create([
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
    
            return redirect('/login')->with('status', 'user-updated');
        }
        
    }

 
}
