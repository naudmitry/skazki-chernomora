<?php

namespace App\Widgets\Miracle;

use App\Models\SaltCave;
use Validator;

class MakeAppointment extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'text' => ''
        ];

    /**
     * @param $validatedData
     * @return \Illuminate\Validation\Validator|null
     */
    public function getSettingsValidator($validatedData)
    {
        return Validator::make(
            $validatedData,
            [
                'title' => 'required|string',
                'text' => 'required|string',
            ],
            [],
            [
                'title' => 'Введите текст.',
                'text' => 'Введите текст подтверждения.',
            ]
        );
    }

    /**
     * @return array
     */
    protected function getFrontViewData()
    {
        $showcase = $this->showcaseWidget->container->showcase;

        $saltCaves = SaltCave::query()
            ->where('showcase_id', $showcase->id)
            ->get();

        return array_merge(
            parent::getFrontViewData(),
            compact('saltCaves')
        );
    }
}
