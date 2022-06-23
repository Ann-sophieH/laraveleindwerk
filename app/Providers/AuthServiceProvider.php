<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use App\Policies\CommentPolicy;
use App\Policies\OrderPolicy;
use App\Policies\PostPolicy;
use App\Policies\ProductPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Product::class => ProductPolicy::class,
        Order::class => OrderPolicy::class,
        Post::class => PostPolicy::class,
        Comment::class => CommentPolicy::class,




    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //IF USER = ADMIN, the policy functions will all return TRUE and admin has access to everything
        Gate::before(function (User $user){
            if($user->isAdmin()){
                return true;
            }
        });

    }
}
