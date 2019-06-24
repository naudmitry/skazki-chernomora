<?php

namespace App\Http\Controllers;

use App\Repositories\ShowcaseRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    const DEFAULT_ADMIN_ROBOTS_PATH = '/public/robots-admin.txt';
    const DEFAULT_SHOWCASE_ROBOTS_PATH = '/public/robots-showcase.txt';

    /** @var ShowcaseRepository */
    protected $showcaseRepository;

    /**
     * SeoController constructor.
     * @param ShowcaseRepository $showcaseRepository
     */
    public function __construct(ShowcaseRepository $showcaseRepository)
    {
        $this->showcaseRepository = $showcaseRepository;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function robots(Request $request)
    {
        $host = $request->getHost();

        if ($host == env('DOMAIN_ADMIN')) {
            return response()
                ->header('Content-Type', 'text/plain')
                ->download(base_path(self::DEFAULT_ADMIN_ROBOTS_PATH), 'robots.txt', [], 'inline');
        }

        $showcase = $this->showcaseRepository->getShowcaseByHostname($host);

        if (is_null($showcase)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        $robotsContent = $showcase->config('seo-integration:robots-text');

        return $robotsContent
            ? response($robotsContent, 200)->header('Content-Type', 'text/plain')
            : response()->download(base_path(self::DEFAULT_SHOWCASE_ROBOTS_PATH), 'robots.txt', [], 'inline');
    }
}