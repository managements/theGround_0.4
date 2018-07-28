<?php

namespace App\Policies\Deal;

use App\User;
use App\Deal;
use Illuminate\Auth\Access\HandlesAuthorization;

class DealPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function before(User $user)
    {
        return $user->is_admin ?: null;
    }

    /**
     * Determine whether the user can view the company.
     *
     * @param  \App\User $user
     * @return bool
     */
    public function index(User $user)
    {
        $authorizes = $user->category->authorizes;
        foreach ($authorizes as $authorize)
        {
            if($authorize->authorize === 'deal_index'){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can view the deal.
     *
     * @param  \App\User  $user
     * @param  \App\Deal  $deal
     * @return mixed
     */
    public function view(User $user)
    {
        $authorizes = $user->category->authorizes;
        foreach ($authorizes as $authorize)
        {
            if($authorize->authorize === 'deal_view'){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can create deals.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $authorizes = $user->category->authorizes;
        foreach ($authorizes as $authorize)
        {
            if($authorize->authorize === 'deal_create'){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can update the deal.
     *
     * @param  \App\User  $user
     * @param  \App\Deal  $deal
     * @return mixed
     */
    public function update(User $user)
    {
        $authorizes = $user->category->authorizes;
        foreach ($authorizes as $authorize)
        {
            if($authorize->authorize === 'deal_update'){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the deal.
     *
     * @param  \App\User  $user
     * @param  \App\Deal  $deal
     * @return mixed
     */
    public function delete(User $user)
    {

        $authorizes = $user->category->authorizes;
        foreach ($authorizes as $authorize)
        {
            if($authorize->authorize === 'deal_delete'){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can restore the deal.
     *
     * @param  \App\User  $user
     * @param  \App\Deal  $deal
     * @return mixed
     */
    public function restore(User $user, Deal $deal)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the deal.
     *
     * @param  \App\User  $user
     * @param  \App\Deal  $deal
     * @return mixed
     */
    public function forceDelete(User $user, Deal $deal)
    {
        //
    }
}
