<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUser;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::select([
            'id',
            'name',
            'email',
            'created_at',
            'updated_at',
            'is_admin'
        ])
            ->get();
        $count = User::select([
            'id',
            'name',
            'email',
            'created_at',
            'updated_at',
            'is_admin'
        ])
            ->count();
        return view('components.admin-users', [
            'user' => $user,
            'count' => $count
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('components.users.edit', [
            'user'=> $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUser $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUser $request, User $user)
    {
        $data = $request->only([
            'name',
            'email',
            'is_admin'
        ]);
        $user = $user->fill($data);
        if($user->save()){
            return redirect()->route('admin.user.index')
                ->with('success', __('messages.admin.user.update.success'));
        }
        return back()->with('error', __('messages.admin.user.update.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        if($user){
            return redirect()->route('admin.user.index')
                ->with('success', __('messages.admin.user.delete.success'));
        }
        return back()->with('error', __('messages.admin.users.delete.fail'));
    }
}
