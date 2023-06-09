<?php

namespace App\Http\Controllers\My;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Discussion;
use App\Models\Answer;
use Storage;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    public function show($username)
    {
        // get user berdasarkan username
        // cek apakah user dengan username tsb ada
        // jika tidak ada maka return page not found
        // buat var picture, bikin conditinalnya
        // cek apakah picture ini url, 
        // kalau iya maka tampilkan langsung, 
        // kalau bukan maka tampilkan dengan facade storage
        // get discussions berdasarkan id user dan get dengan paginasi per 5 row
        // get answers berdasarkan id user dan get dengan paginasi per 5 row
        // return view

        $user = User::where('username', $username)->first();
        if (!$user) {
            return abort(404);
        }

        $picture = filter_var($user->picture, FILTER_VALIDATE_URL)
            ? $user->picture : Storage::url($user->picture);

        $perPage = 5;
        $columns = ['*'];
        $discussionsPageName = 'discussions';
        $answersPageName = 'answers';

        return view('pages.users.show', [
            'user' => $user,
            'picture' => $picture,
            'discussions' => Discussion::where('user_id', $user->id)
                ->paginate($perPage, $columns, $discussionsPageName),
            'answers' => Answer::where('user_id', $user->id)
                ->paginate($perPage, $columns, $answersPageName),
        ]);
    }

    public function edit($username) 
    {
        // get user berdasarkan username
        // jika user tidak ada atau user id tidak sama dengan id milik user yg sedang login 
        // maka return page not found
        // return view

        $user = User::where('username', $username)->first();
        if (!$user || $user->id !== auth()->id()) {
            return abort(404);
        }

        $picture = filter_var($user->picture, FILTER_VALIDATE_URL)
            ? $user->picture : Storage::url($user->picture);

        return view('pages.users.form', [
            'user' => $user,
            'picture' => $picture,
        ]);
    }

    public function update(UpdateRequest $request, $username)
    {
        // get user berdasarkan username
        // cek jika user tidak ada atau user id tidak sama dengan id milik user yg sedang login 
        // maka return page not found
        // get request yg sudah tervalidasi
        // cek apakah password diisi
        // jika iya maka nilainya dibiarkan dan hash password tsb
        // jika tidak maka hapus password di validated
        // cek apakah nilai picture tidak kosong
        //  jika iya maka 
        //   cek apakah nilai picture di tabel itu bukan url
        //   jika memang bukan maka hapus dulu picture tsb dari disk storage kita
        //  kita masukkan picture tsb ke disk storage kita dan get url nya
        //  masukkan url tsb ke variabel validated
        // update record
        // jika update berhasil maka kirim notif success dan redirect ke user profile kita
        // jika tidak maka abort 500

        $user = User::where('username', $username)->first();
        if (!$user || $user->id !== auth()->id()) {
            return abort(404);
        }

        $validated = $request->validated();

        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }
        else {
            unset($validated['password']);
        }

        if ($request->hasFile('picture')) {
            if (filter_var($user->picture, FILTER_VALIDATE_URL) === false) {
                Storage::disk('public')->delete($user->picture);
            }

            $filePath = Storage::disk('public')->put('images/users/picture', request()->file('picture'));
            $validated['picture'] = $filePath;
        }

        $update = $user->update($validated);

        if ($update) {
            session()->flash('notif.success', 'User profile updated successfully!');
            return redirect()->route('users.show', $validated['username']);
        }

        return abort(500);
    }
}
