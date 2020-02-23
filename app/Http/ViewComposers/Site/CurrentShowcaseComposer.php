<?php

namespace App\Http\ViewComposers\Site;

use Illuminate\View\View;

class CurrentShowcaseComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('currentShowcase', config('front.showcase'));
    }
}
