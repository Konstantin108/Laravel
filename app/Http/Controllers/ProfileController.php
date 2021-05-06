<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::select([
            'id',
            'name',
            'email',
            'email_verified_at',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
            'is_admin',
            'last_login',
            'avatar',
        ])
            ->get();
        return $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit()
    {
        //
    }

    /**
     * @param int $id
     */
    public function editProfile(int $id)
    {
        $user = User::findOrFail($id);
        return view('components.account.edit', [
            'user' => $user
        ]);
    }

    /**
     * @param UpdateAccount $request
     * @param User $user
     * @param Int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAccount $request, Int $id)
    {
        $data = $request->validated();
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $originalExt = $avatar->getClientOriginalExtension();
            $fileName = uniqid();
            $fileLink = $avatar->storeAs('news', $fileName . '.' . $originalExt, 'public');
            $data['avatar'] = $fileLink;
        }
        $user = User::findOrFail($id);
        $updatedUser = $user->fill($data)->save();
        if($updatedUser){
            return redirect()->route('account')
                ->with('success', __('messages.account.update.success'));
        }
        return back()->with('error', __('messages.account.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Int $id)
    {
        //
    }
}
