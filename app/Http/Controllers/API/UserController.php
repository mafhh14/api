<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserAPI;

class UserController extends Controller
{
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(UserAPI $request) 
    {
    	if (!$request->validated()) { 
    		return response()->json(['error'=>$validator->errors()], 401);
    	}

    	$input = $request->all(); 
    	$input['password'] = bcrypt($input['password']); 
    	$user = User::create($input); 
    	$success['token'] =  $user->createToken('MyApp')-> accessToken; 
    	$success['name'] =  $user->name;
    	return response()->json(['success'=>$success], $this-> successStatus); 
    }
}
