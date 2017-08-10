<?php

namespace App\Policies;

use App\Model\admin\admin;
use App\Model\user\post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\admin  $user
     * @return mixed
     */
    public function create(admin $user)
    {
       return $this-> getPermission($user , 5);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\admin  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function update(admin $user)
    {
        //
        return $this-> getPermission($user , 6);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\admin  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function delete(admin $user)
    {
        //
        return $this-> getPermission($user , 7);
    }

   //Define tag p[olicy
    public function tag(admin $user)
    {
        //
        return $this-> getPermission($user ,12 );
    }

    //Define Category Policy

    public function category(admin $user)
    {
        //
        return $this-> getPermission($user , 13);
    }


    protected  function  getPermission($user, $p_id)   //$permission_id
    {
        //Check for every role of the user
        foreach ($user->roles as $role){
            foreach ($role->permissions  as $permission) {
                if($permission->id == $p_id){
                    return true;
                }
            }
        }
        return false;
    }
}
