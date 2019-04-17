<?php

use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = [
            'ребенок до 2 лет',
            'ребенок с 2-х до 6-ти лет',
            'ребенок с 6-х до 14-ти лет',
            'взрослый (с 14 лет)',
            'пенсионер',
        ];

        foreach ($titles as $title) {
            $subscription = new Subscription();
            $subscription->title = $title;
            $subscription->save();
        }
    }
}
