<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;

class BlogPostObserver
{
    /**
     * Обробка перед створенням запису.
     *
     * @param  BlogPost  $blogPost
     *
     */
    public function creating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);

        $this->setSlug($blogPost);

        $this->setHtml($blogPost);

        $this->setUser($blogPost);
    }

    /**
     * Встановлюємо значення полю content_html з поля content_raw.
     *
     * @param BlogPost $blogPost
     */
    protected function setHtml(BlogPost $blogPost)
    {
        if ($blogPost->isDirty('content_raw')) {
            //Тут треба зробити генерацію markdown -> html
            $blogPost->content_html = $blogPost->content_raw;
        }
    }

    /**
     * Якщо user_id не вказано, то встановимо юзера 1.
     *
     * @param BlogPost $blogPost
     */
    protected function setUser(BlogPost $blogPost)
    {

        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;

    }
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