<?php

namespace App\Observers;

use App\Models\BlogCategory;

class BlogCategoryObserver
{
    /**
     * Обробка перед створенням запису.
     *
     * @param  BlogCategory  $blogCategory
     *
     */
    public function creating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }

    public function updating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }
    /**
     * якщо псевдонім порожній
     * то генеруємо псевдонім
     *
     * @param BlogCategory  $blogCategory
     */
    protected function setSlug(BlogCategory $blogCategory)
    {
        if (empty($blogCategory->slug)) {
            $blogCategory->slug = Str::slug($blogCategory->title);
        }
    }
    /**
     * Handle the logategory "created" event.
     *
     * @param  \App\Models\BlogCategory  $BlogCategory
     * @return void
     */
    public function created(BlogCategory $BlogCategory)
    {
        //
    }

    /**
     * Handle the logategory "updated" event.
     *
     * @param  \App\Models\BlogCategory  $BlogCategory
     * @return void
     */
    public function updated(BlogCategory $BlogCategory)
    {
        //
    }

    /**
     * Handle the logategory "deleted" event.
     *
     * @param  \App\Models\BlogCategory  $BlogCategory
     * @return void
     */
    public function deleted(BlogCategory $BlogCategory)
    {
        //
    }

    /**
     * Handle the logategory "restored" event.
     *
     * @param  \App\Models\BlogCategory  $BlogCategory
     * @return void
     */
    public function restored(BlogCategory $BlogCategory)
    {
        //
    }

    /**
     * Handle the logategory "force deleted" event.
     *
     * @param  \App\Models\BlogCategory  $BlogCategory
     * @return void
     */
    public function forceDeleted(BlogCategory $BlogCategory)
    {
        //
    }
}