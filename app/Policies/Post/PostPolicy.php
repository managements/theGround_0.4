<?php

namespace App\Policies\Post;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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
            if($authorize->authorize === 'post_index'){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can view the token.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function view(User $user)
    {
        $authorizes = $user->category->authorizes;
        foreach ($authorizes as $authorize)
        {
            if($authorize->authorize === 'post_view'){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can update the token.
     *
     * @param User $self
     * @param  \App\User $user
     * @return bool
     */
    public function update(User $self,User $user)
    {
        if($self->id == $user->id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the token.
     *
     * @param  \App\User $user
     * @return bool
     */
    public function delete(User $user)
    {
        $authorizes = $user->category->authorizes;
        foreach ($authorizes as $authorize)
        {
            if($authorize->authorize === 'post_delete'){
                return true;
            }
        }
        return false;
    }

    public function user_update(User $user)
    {
        $authorizes = $user->category->authorizes;
        foreach ($authorizes as $authorize)
        {
            if($authorize->authorize === 'user_update'){
                return true;
            }
        }
        return false;
    }
}
