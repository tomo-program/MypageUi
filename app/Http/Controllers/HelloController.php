<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class HelloController extends Controller
{
    public function index(): string
    {
        // dd("aa");
        return 'Hello World';
    }

    public function make(Request $request): string
    {
        // dd($request);
    //   dd($request->name,$request->email,$request->password);
            //$request->name;
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|',
                'password' => 'required|string|min:8',
            ]);
        
                
                    User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                    ]);
        
           
            return 'success';
        
    }
}