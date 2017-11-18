<?php

namespace App\Policies;

use App\User;
use App\Blog;
use App\Helpers\Authorize;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view Blogs.
     *
     * @param  \App\User  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function index(User $user)
    {
        return (new Authorize($user, 'view_blog'))->check();
    }

    /**
     * Determine whether the user can view the Blog.
     *
     * @param  \App\User  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function view(User $user, Blog $blog)
    {
        return (new Authorize($user, 'view_blog', $blog))->check();
    }

    /**
     * Determine whether the user can create Blogs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return (new Authorize($user, 'add_blog'))->check();
    }

    /**
     * Determine whether the user can update the Blog.
     *
     * @param  \App\User  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function update(User $user, Blog $blog)
    {
        return (new Authorize($user, 'edit_blog', $blog))->check();
    }

    /**
     * Determine whether the user can delete the Blog.
     *
     * @param  \App\User  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function delete(User $user, Blog $blog)
    {
        return (new Authorize($user, 'delete_blog', $blog))->check();
    }
}
