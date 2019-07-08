<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WishlistCreateRequest;
use App\Http\Requests\WishlistEditRequest;
use App\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(){
        return Wishlist::paginate();
    }

    public function store(UserCreateRequest $request){
        return User::create($request->all());
    }

    public function show($id){
        return User::find($id);
    }

    public function update(UserEditRequest $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return $user;
    }

    public function destroy($id){
        $user = User::find($id);
        $result = $user->delete();
        if($result){
            return response()->json(['message' =>'Data deleted!'], 200);
        }

        return response()->json(['message' =>'something wrong'], 500);
    }
}
