<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Auth;

class BlogRepository
{
    /**
     * @param BlogCategory $category
     * @param $data
     * @return BlogCategory
     */
    public function saveCategory(BlogCategory $category = null, $data)
    {
        if (!isset($category)) {
            $category = new BlogCategory();
        }

        $fields =
            [
                'title',
                'name',
                'breadcrumbs',
                'meta_title',
                'meta_description',
                'meta_keywords',
                'image_link',
                'color'
            ];

        foreach ($fields as $fieldItem) {
            if (array_has($data, $fieldItem)) {
                $category->$fieldItem = array_get($data, $fieldItem);
            }
        }

        $category->save();

        return $category;
    }

    /**
     * @param Blog|null $blog
     * @param $data
     * @return Blog
     */
    public function saveBlog(Blog $blog = null, $data)
    {
        $admin = Auth::guard('admin')->user();

        if (!isset($blog)) {
            $blog = new Blog();
            $blog->author_id = $admin->id;
        }

        $blog->title = array_get($data, 'title');
        $blog->name = array_get($data, 'name');
        $blog->breadcrumbs = array_get($data, 'breadcrumbs');
        $blog->meta_title = array_get($data, 'meta_title');
        $blog->meta_description = array_get($data, 'meta_description');
        $blog->meta_keywords = array_get($data, 'meta_keywords');
        $blog->updater_id = $admin->id;
        $blog->save();

        if (array_get($data, 'categories')) {
            $blog->categories()->sync(array_get($data, 'categories'));
        } else {
            $blog->categories()->detach();
        }

        return $blog;
    }
}
