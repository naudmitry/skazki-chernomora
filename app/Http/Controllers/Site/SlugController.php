<?php

namespace App\Http\Controllers\Site;

use App\Models;
use App\Repositories\Slug\SlugRepository;
use Illuminate\Http\Response;

class SlugController extends Controller
{
    protected $slugRepository;

    /**
     * SlugController constructor.
     * @param SlugRepository $slugRepository
     */
    public function __construct(SlugRepository $slugRepository)
    {
        $this->slugRepository = $slugRepository;
    }

    /**
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function index($slug)
    {
        $obj = $this->slugRepository->getSlug($slug);

        if (is_null($obj)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        if ($obj->slug != $slug) {
            return redirect()->route('slug.index', $obj->slug);
        }

        $entity = $obj->entity;

        switch (true) {
            case $entity instanceof Models\Blog:
                return app(BlogController::class)->single($entity);
            case $entity instanceof Models\BlogCategory:
                return app(BlogController::class)->category($entity);

        }

        return abort(Response::HTTP_NOT_FOUND);
    }
}
