<?php

namespace App\Policies;

use App\Models\ShowIt;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShowItPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        // if($user->isAdmin())
        if ($user->roles_id === 2) {

            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShowIt  $showIt
     * @return mixed
     */
    public function view(User $user, ShowIt $showIt)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShowIt  $showIt
     * @return mixed
     */
    public function update(User $user, ShowIt $showIt)
    {
        if (($user->id === $showIt->user_id) || ($user->roles_id === 2)) {

            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShowIt  $showIt
     * @return mixed
     */
    public function delete(User $user, ShowIt $showIt)
    {
        if (($user->id === $showIt->user_id) || ($user->roles_id === 2)) {
            
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShowIt  $showIt
     * @return mixed
     */
    public function restore(User $user, ShowIt $showIt)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShowIt  $showIt
     * @return mixed
     */
    public function forceDelete(User $user, ShowIt $showIt)
    {
        //
    }
}
