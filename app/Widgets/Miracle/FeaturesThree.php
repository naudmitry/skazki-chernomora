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
                        'icon' => 'fa-check',
                        'title' => '',
                        'subtitle' => '',
                        'link' => ''
                    ],
                    [
                        'icon' => 'fa-eye',
                        'title' => '',
                        'subtitle' => '',
                        'link' => ''
                    ],
                    [
                        'icon' => 'fa-tint',
                        'title' => '',
                        'subtitle' => '',
                        'link' => ''
                    ]
                ],
        ];
}