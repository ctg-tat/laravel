<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $articles = Article::query()
            ->where('status', '=', 'published')
            ->orderByDesc('created_at')
            ->get();
        return view('index', compact('articles'));
    }

    public function add(){
        $categories = Category::all();

        return view('add', compact('categories'));
    }

    public function blocked(){
        return view('blocked');
    }

    public function single(){
        return view('single');
    }

    public function user(User $user){
        return view('user', compact('user'));
    }

    public function update(Article $article){
        $categories = Category::all();

        return view('update', compact('categories', 'article'));
    }
}
