<?php

namespace App\Widgets\Miracle;

class FeaturesThree extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'items' =>
                [
                    [
                        'icon' => 'check',
                        'animation_delay' => 0
                    ],
                    [
                        'icon' => 'eye',
                        'animation_delay' => 0.5
                    ],
                    [
                        'icon' => 'tint',
                        'animation_delay' => 1
                    ]
                ],
        ];
}