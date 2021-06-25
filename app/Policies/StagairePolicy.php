<?php

namespace App\Policies;

use App\User;
use App\Stagaire;
use Illuminate\Auth\Access\HandlesAuthorization;

class StagairePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the stagaire.
     *
     * @param  \App\User  $user
     * @param  \App\Stagaire  $stagaire
     * @return mixed
     */
    public function view(User $user, Stagaire $stagaire)
    {
        //
    }

    /**
     * Determine whether the user can create stagaires.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the stagaire.
     *
     * @param  \App\User  $user
     * @param  \App\Stagaire  $stagaire
     * @return mixed
     */
    public function update(User $user, Stagaire $stagaire)
    {
        //
    }

    /**
     * Determine whether the user can delete the stagaire.
     *
     * @param  \App\User  $user
     * @param  \App\Stagaire  $stagaire
     * @return mixed
     */
    public function delete(User $user, Stagaire $stagaire)
    {
        //
    }

    /**
     * Determine whether the user can restore the stagaire.
     *
     * @param  \App\User  $user
     * @param  \App\Stagaire  $stagaire
     * @return mixed
     */
    public function restore(User $user, Stagaire $stagaire)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the stagaire.
     *
     * @param  \App\User  $user
     * @param  \App\Stagaire  $stagaire
     * @return mixed
     */
    public function forceDelete(User $user, Stagaire $stagaire)
    {
        //
    }
}
