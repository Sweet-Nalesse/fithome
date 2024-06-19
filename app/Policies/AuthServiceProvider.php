<?php
namespace App\Providers;

use App\Models\ProgressEntry;
use App\Models\Forum;
use App\Models\Post;
use App\Policies\ProgressEntryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\UserProfile;
use App\Policies\UserProfilePolicy;
use App\Policies\ForumPolicy;
use App\Policies\PostPolicy;
use App\Models\Comment;
use App\Policies\CommentPolicy;
use App\Models\ChatMessage;
use App\Policies\ChatMessagePolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        ProgressEntry::class => ProgressEntryPolicy::class,
        UserProfile::class => UserProfilePolicy::class,
        Forum::class => ForumPolicy::class,
        Post::class => PostPolicy::class,   
        Comment::class => CommentPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
    
}
