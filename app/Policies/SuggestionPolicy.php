<?php

namespace App\Policies;

use App\Models\Suggestion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SuggestionPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     * TODO UNCOMMENT WHEN READY
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
    // public function before(User $user, $ability)
    // {
    //     if ($user->is_admin()) {
    //         return true;
    //     }
    // }



    /**
     * Determine whether the user can approve a suggestion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function approve(User $user)
    {
        return $user->is_admin()
            ? Response::allow()
            : Response::deny("You cannot approve this suggestion");
    }


    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true
            ? Response::allow()
            : Response::deny("You cannot view all word suggestions");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return $user->is_admin()
            ? Response::allow()
            : Response::deny("You cannot view word suggestions");
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(?User $user)
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return $user->is_admin()
            ? Response::allow()
            : Response::deny("You cannot update word suggestions");
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->is_admin()
            ? Response::allow()
            : Response::deny("You cannot delete word suggestions");
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user)
    {
        //
    }
}
