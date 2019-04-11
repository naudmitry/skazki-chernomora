<?php

use App\Models\SaltCave;
use App\Models\Showcase;
use Illuminate\Database\Seeder;

class SaltCavesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $showcase = Showcase::query()
            ->whereDomain(env('DOMAIN_CLIENT1'))
            ->first();

        $saltCave = new SaltCave();
        $saltCave->title = 'Соляная пещера на Чкалова';
        $saltCave->address = 'Витебск, ул. Чкалова, 14в';
        $saltCave->phone_numbers = ['+375 (33) 300-82-36', '+375 (44) 501-71-04'];
        $saltCave->is_enabled = true;
        $saltCave->showcase_id = $showcase->id;
        $saltCave->company_id = $showcase->company_id;
        $saltCave->working_time = ['Пн–пт: 09:00–19:00', 'Сб, вс: выходные'];
        $saltCave->save();

        $saltCave = new SaltCave();
        $saltCave->title = 'Соляная пещера на Фрунзе';
        $saltCave->address = 'Витебск, пр-т Фрунзе, 81, корп. 33';
        $saltCave->phone_numbers = ['+375 (29) 738-98-48', '+375 (29) 668-98-48'];
        $saltCave->is_enabled = true;
        $saltCave->showcase_id = $showcase->id;
        $saltCave->company_id = $showcase->company_id;
        $saltCave->working_time = ['Пн–вс: 09:00–21:00'];
        $saltCave->save();

        $saltCave = new SaltCave();
        $saltCave->title = 'Соляная пещера на Гончарной';
        $saltCave->address = 'Витебск, ул. Гончарная, 3';
        $saltCave->phone_numbers = ['+375 (29) 768-78-00', '+375 (44) 758-78-00'];
        $saltCave->is_enabled = true;
        $saltCave->showcase_id = $showcase->id;
        $saltCave->company_id = $showcase->company_id;
        $saltCave->working_time = ['Пн–вс: 09:00–21:00'];
        $saltCave->save();

        $saltCave = new SaltCave();
        $saltCave->title = 'Соляная пещера на Коммунистической';
        $saltCave->address = 'Витебск, ул. Коммунистическая, 16';
        $saltCave->phone_numbers = ['+375 (44) 512-25-08', '+375 (29) 894-45-17'];
        $saltCave->is_enabled = true;
        $saltCave->showcase_id = $showcase->id;
        $saltCave->company_id = $showcase->company_id;
        $saltCave->working_time = ['Пн–вс: 09:00–21:00'];
        $saltCave->save();
    }
}
