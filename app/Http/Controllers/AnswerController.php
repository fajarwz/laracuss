<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Discussion;
use App\Http\Requests\Answer\StoreRequest;
use App\Http\Requests\Answer\UpdateRequest;

class AnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, $slug)
    {
        // get request yg sudah tervalidasi
        // ke variable validated tambahkan user id 
        // tambahkan juga discussion id nya berdasarkan discussion slug
        // create answer
        // jika create berhasil maka buat notif success dan redirect ke detail discussion
        // jika tidak maka abort

        $validated = $request->validated();

        $validated['user_id'] = auth()->id();
        $validated['discussion_id'] = Discussion::where('slug', $slug)->first()->id;

        $create = Answer::create($validated);

        if ($create) {
            session()->flash('notif.success', 'Your answer posted successfully');
            return redirect()->route('discussions.show', $slug);
        }

        return abort(500);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // get answer berdasarkan id
        // cek apakah data answer dengan id tersebut tidak ada
        // jika tidak ada maka return page not found
        // cek apakah answer ini milik user yg sedang login
        // jika bukan maka return page not found
        // return view dengan data answer

        $answer = Answer::find($id);

        if (!$answer) {
            return abort(404);
        }

        $isOwnedByUser = $answer->user_id == auth()->id();

        if (!$isOwnedByUser) {
            return abort(404);
        }

        return response()->view('pages.answers.form', [
            'answer' => $answer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        // get answer berdasarkan id
        // cek apakah data answer dengan id tersebut tidak ada
        // jika tidak ada maka return page not found
        // cek apakah answer ini milik user yg sedang login
        // jika bukan maka return page not found
        // get request yg sudah tervalidasi
        // update answer dengan data validated tadi
        // cek apakah update berhasil
        // jika berhasil maka return notif success dan redirect ke detail discussion dari answer tsb
        // jika tidak berhasil maka lanjut ke bawah / ke kode abort 500

        $answer = Answer::find($id);

        if (!$answer) {
            return abort(404);
        }

        $isOwnedByUser = $answer->user_id == auth()->id();

        if (!$isOwnedByUser) {
            return abort(404);
        }

        $validated = $request->validated();

        $update = $answer->update($validated);

        if ($update) {
            session()->flash('notif.success', 'Answer updated successfully!');
            return redirect()->route('discussions.show', $answer->discussion->slug);
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get answer berdasarkan id
        // cek apakah data answer dengan id tersebut tidak ada
        // jika tidak ada maka return page not found
        // cek apakah answer ini milik user yg sedang login
        // jika bukan maka return page not found
        // delete answer
        // cek apakah delete berhasil
        // jika berhasil maka return notif success dan redirect ke detail discussion dari answer tsb
        // jika tidak berhasil maka lanjut ke bawah / ke kode abort 500

        $answer = Answer::find($id);

        if (!$answer) {
            return abort(404);
        }

        $isOwnedByUser = $answer->user_id == auth()->id();

        if (!$isOwnedByUser) {
            return abort(404);
        }

        $delete = $answer->delete();

        if ($delete) {
            session()->flash('notif.success', 'Answer deleted successfully!');
            return redirect()->route('discussions.show', $answer->discussion->slug);
        }

        return abort(500);
    }
}
