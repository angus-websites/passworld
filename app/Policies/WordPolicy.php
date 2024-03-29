<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Word;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;


class WordPolicy
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
            : Response::deny("You cannot view words");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Word $word)
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
        return $user->is_admin()
            ? Response::allow()
            : Response::deny("You cannot create words");
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Word $word)
    {
        return $user->is_admin()
            ? Response::allow()
            : Response::deny("You cannot update words");
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->is_admin()
            ? Response::allow()
            : Response::deny("You cannot delete words");
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Word $word)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Word $word)
    {
        //
    }
}
