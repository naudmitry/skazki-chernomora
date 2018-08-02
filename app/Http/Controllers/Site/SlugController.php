<?php

namespace App\Http\Controllers\Site;

use App\Repositories\Slug\SlugsRepository;
use Illuminate\Http\Request;
use App\Models;

class SlugController extends Controller
{
    protected $slugRepository;

    /**
     * SlugController constructor.
     * @param SlugsRepository $slugRepository
     */
    public function __construct(SlugsRepository $slugRepository)
    {
        parent::__construct();

        $this->slugRepository = $slugRepository;
    }

    /**
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|Response|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Request $request, $slug)
    {
        $obj = $this->slugRepository->getSlug($this->showcase, $slug, $language);

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

//            case $entity instanceof Models\BlogCategory:
//                return app(BlogController::class)->category($entity);
//
//            case $entity instanceof Models\Faq:
//                return app(FaqController::class)->single($entity);
//
//            case $entity instanceof Models\FaqCategory:
//                return app(FaqController::class)->filter($entity);

        }

        return abort(Response::HTTP_NOT_FOUND);
    }
}
