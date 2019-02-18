<?php

use App\Models\Company;
use App\Models\Showcase;
use Illuminate\Database\Seeder;

class ShowcasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->defaultHandler();
    }

    private function defaultHandler()
    {
        $faker = Faker\Factory::create();

        /** @var Company $superCompany */
        $superCompany = Company::query()
            ->where('super', true)
            ->firstOrFail();

        /** @var Company $company */
        $company = Company::query()
            ->where('super', false)
            ->firstOrFail();

        $showcasesMap = [
            [
                'company_id' => $superCompany->id,
                'title' => 'Super',
                'domain' => env('DOMAIN_CLIENT'),
                'theme' => 'main_theme',
                'email' => 'boss@' . env('DOMAIN_CLIENT'),
                'enable' => true,
            ],
            [
                'company_id' => $company->id,
                'title' => 'Витебск',
                'domain' => env('DOMAIN_CLIENT1'),
                'theme' => 'miracle',
                'email' => 'boss@' . env('DOMAIN_CLIENT1'),
                'enable' => true,
            ],
            [
                'company_id' => $company->id,
                'title' => 'Орша',
                'domain' => env('DOMAIN_CLIENT2'),
                'theme' => 'miracle',
                'email' => 'boss@' . env('DOMAIN_CLIENT2'),
                'enable' => true,
            ],
            [
                'company_id' => $company->id,
                'title' => 'Полоцк',
                'domain' => env('DOMAIN_CLIENT3'),
                'theme' => 'miracle',
                'email' => 'boss@' . env('DOMAIN_CLIENT3'),
                'enable' => true,
            ],
        ];

        foreach ($showcasesMap as $showcaseData) {
            /** @var Showcase $showcaseObj */
            $showcaseObj = Showcase::create($showcaseData);
            $showcaseObj->domains()->create(['name' => $showcaseData['domain']]);
        }
    }
}
