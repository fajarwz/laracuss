<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Discussion;
use App\Http\Requests\Discussion\StoreRequest;
use Str;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // load semua discussion
        // eager load relationshipnya / relasinya
        // apakah ada request data "search"
        // jika ada maka load discussion dengan kata kunci title dan content yg nilainya seperti nilai "search"
        // return page index beserta datanya
        // data yg dipass ke view adl:
        // discussion yang sudah disort dengan created at menurun, pagination per 10 / 20
        // data semua category

        $discussions = Discussion::with('user', 'category');

        if ($request->search) {
            $discussions->where('title', 'like', "%$request->search%")
                ->orWhere('content', 'like', "%$request->search%");
        }

        return response()->view('pages.discussions.index', [
            'discussions' => $discussions->orderBy('created_at', 'desc')
                ->paginate(10)->withQueryString(),
            'categories' => Category::all(),
            'search' => $request->search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('pages.discussions.form', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // dapatkan dulu data dari form request yang sudah tervalidasi
        // get data category berdasarkan slug nya
        // dapatkan id dari category nya
        // masukkan user id ke array validated
        // tambahkan slug + timestamp berdasarkan title ke array validated
        // buat content_preview berdasarkan content
        // caranya bersihkan content dari tag
        // cek apakah content ini karakternya lebih 120
        // jika iya maka masukkan content tersebut ke content preview + '...'
        // jika tidak maka masukkan content tersebut ke content preview tanpa '...'
        // baru masukkan data detail question itu ke tabel discussions
        // jika berhasil maka buat notif berhasil lalu redirect ke list discussion
        // jika tidak maka kembalikan error 500

        $validated = $request->validated();
        $categoryId = Category::where('slug', $validated['category_slug'])->first()->id;

        $validated['category_id'] = $categoryId;
        $validated['user_id'] = auth()->id();
        $validated['slug'] = Str::slug($validated['title']) . '-' . time();

        $stripContent = strip_tags($validated['content']);
        $isContentLong = strlen($stripContent) > 120;
        $validated['content_preview'] = $isContentLong 
            ? (substr($stripContent, 0, 120) . '...') : $stripContent;

        $create = Discussion::create($validated);

        if ($create) {
            session()->flash('notif.success', 'Discussion created successfully!');
            return redirect()->route('discussions.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
