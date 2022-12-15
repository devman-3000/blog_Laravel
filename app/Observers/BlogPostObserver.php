<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;

class BlogPostObserver
{

    /**
     * Обробка перед оновленням запису.
     *
     * @param  BlogPost  $blogPost
     *
     */
    public function updating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);

        $this->setSlug($blogPost);
    }

    /**
     * якщо поле published_at порожнє і нам прийшло 1 в ключі is_published,
     * то генеруємо поточну дату
     *
     * @param BlogPost $blogPost
     */
    protected function setPublishedAt(BlogPost $blogPost)
    {
        if (empty($blogPost->published_at) && $blogPost->is_published) {
            $blogPost->published_at = Carbon::now();
        }
    }

    /**
     * якщо псевдонім порожній
     * то генеруємо псевдонім
     *
     * @param BlogPost $blogPost
     */
    protected function setSlug(BlogPost $blogPost)
    {
        if (empty($blogPost->slug)) {
            $blogPost->slug = \Str::slug($blogPost->title);
        }
    }
    /**
     * Handle the logost "created" event.
     *
     * @param  \App\Models\BlogPost  $BlogPost
     * @return void
     */
    public function created(BlogPost $BlogPost)
    {
        //
    }

    /**
     * Handle the logost "updated" event.
     *
     * @param  \App\Models\BlogPost  $BlogPost
     * @return void
     */
    public function updated(BlogPost $BlogPost)
    {
        //
    }

    /**
     * Handle the logost "deleted" event.
     *
     * @param  \App\Models\BlogPost  $BlogPost
     * @return void
     */
    public function deleted(BlogPost $BlogPost)
    {
        //
    }

    /**
     * Handle the logost "restored" event.
     *
     * @param  \App\Models\BlogPost  $BlogPost
     * @return void
     */
    public function restored(BlogPost $BlogPost)
    {
        //
    }

    /**
     * Handle the logost "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $BlogPost
     * @return void
     */
    public function forceDeleted(BlogPost $BlogPost)
    {
        //
    }
}