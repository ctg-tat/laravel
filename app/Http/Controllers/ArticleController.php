<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'anons_title' => 'nullable',
            'content' => 'required|min:5',
            'file' => 'mimes:png,jpg,jpeg',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator->errors())
                ->withInput($request->all());
        }

        $image_path = null;

        if ($request->file('file')) {
            $image_path = $request->file('file')->store('/public/images');
        }

        Article::query()->create([
                'image_path' => $image_path,
                'author_id' => Auth::user()->id,
            ] + $validator->validated());

        return redirect()->route('home');
    }

    public function show($id)
    {
        $article = Article::query()->find($id);

        if ($article === null) {
            return redirect()->route('home');
        }

        return view('single', [
            'article' => $article
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Article::destroy($id);

        return redirect()->route('home');
    }
}
