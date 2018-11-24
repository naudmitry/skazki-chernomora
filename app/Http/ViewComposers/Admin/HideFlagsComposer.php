<?php

namespace App\Http\ViewComposers\Admin;

use App\Models\Showcase;
use Illuminate\View\View;

class HideFlagsComposer
{
    public function compose(View $view)
    {
        /** @var Showcase $currentShowcase */
        $currentShowcase = config('admin.administeredShowcase');

        $view->with('hideInputCountryFlags', $currentShowcase && !($currentShowcase->languages->count() > 1));
    }
}