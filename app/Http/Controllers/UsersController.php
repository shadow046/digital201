<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use DataTables;

class UsersController extends Controller
{
    public function listOfUsers(){
        $users = User::all();
        return DataTables::of($users)->make(true);
    }

    public function save(Request $request){

        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $sql = $users->save();//To save data

        return $sql ? 'true' : 'false';
    }

}
