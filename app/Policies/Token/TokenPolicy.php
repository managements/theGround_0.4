<?php

namespace App\Policies\Token;

use App\User;
use App\Token;
use Illuminate\Auth\Access\HandlesAuthorization;

class TokenPolicy
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
                if($authorize->authorize === 'token_index'){
                    return true;
                }
            }
        return false;
    }

    /**
     * Determine whether the user can view the token.
     *
     * @param  \App\User  $user
     * @param  \App\Token  $token
     * @return mixed
     */
    public function view(User $user, Token $token)
    {
        $authorizes = $user->category->authorizes;
        foreach ($authorizes as $authorize)
        {
            if($authorize->authorize === 'token_view'){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can create tokens.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $authorizes = $user->category->authorizes;
        foreach ($authorizes as $authorize)
        {
            if($authorize->authorize === 'token_create'){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can update the token.
     *
     * @param  \App\User  $user
     * @param  \App\Token  $token
     * @return mixed
     */
    public function update(User $user, Token $token)
    {
        $authorizes = $user->category->authorizes;
        foreach ($authorizes as $authorize)
        {
            if($authorize->authorize === 'token_update'){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the token.
     *
     * @param  \App\User  $user
     * @param  \App\Token  $token
     * @return mixed
     */
    public function delete(User $user, Token $token)
    {
        $authorizes = $user->category->authorizes;
        foreach ($authorizes as $authorize)
        {
            if($authorize->authorize === 'token_delete'){
                return true;
            }
        }
        return false;
    }
}
