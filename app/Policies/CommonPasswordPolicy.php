<?php

namespace App\Policies;

use App\Models\CommonPassword;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CommonPasswordPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(?User $user)
    {
        return true
            ? Response::allow()
            : Response::deny("You cannot view common passwords");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CommonPassword  $commonPassword
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CommonPassword $commonPassword)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CommonPassword  $commonPassword
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CommonPassword $commonPassword)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CommonPassword  $commonPassword
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->is_admin()
            ? Response::allow()
            : Response::deny("You cannot delete common passwords");
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CommonPassword  $commonPassword
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CommonPassword $commonPassword)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CommonPassword  $commonPassword
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CommonPassword $commonPassword)
    {
        //
    }
}
