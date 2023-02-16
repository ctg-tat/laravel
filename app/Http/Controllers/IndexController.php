<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $users = User::query()
            ->where('role', '=', 'admin')
            ->orWhere('id', '=', '69')
            ->orderByDesc('id')
            ->limit(10)
            ->get();
        return view('index', [
            'users' => $users,
        ]);
    }

    public function add(){
        return view('add');
    }

    public function blocked(){
        return view('blocked');
    }

    public function single(){
        return view('single');
    }

    public function user(){
        return view('user');
    }
}
