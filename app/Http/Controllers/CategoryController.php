<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Discussion;

class CategoryController extends Controller
{
    public function show($categorySlug)
    {
        // get category berdasarkan categirySlug
        // cek apakah data category di atas ada
        // jika category tidak ada maka return abort 404
        // buat query discussion, eager load user dan category, get category berdasarkan id categpry di atas
        // discussionnya di sort by created at menurun
        // dipaginasi 10
        // lalu return view nya dengan semua variable di atas

        $category = Category::where('slug', $categorySlug)->first();

        if (!$category) {
            return abort(404);
        }

        $discussions = Discussion::with(['user', 'category'])
            ->where('category_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return response()->view('pages.discussions.index', [
            'discussions' => $discussions,
            'categories' => Category::all(),
            'withCategory' => $category,
        ]);
    }
}
