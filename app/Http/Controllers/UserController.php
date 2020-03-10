<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     *
     * @param User $user
     * @return UserResource
     */
    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     *
     * @return UserResourceCollection
     */
    public function index(): UserResourceCollection
    {
        return new UserResourceCollection(User::paginate());
    }

    /**
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required'
        ]);

        $user = User::create($request->all());

        return new UserResource($user);
    }

    /**
     *
     * @param User $user
     * @param Request $request
     * @return UserResource
     */
    public function update(User $user, Request $request): UserResource
    {
        $user->update($request->all());

        return new UserResource($user);
    }

    /**
     *
     * @param User $user
     * @return void
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json();
    }
}
