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
                'name' => 'Super',
                'domain' => env('DOMAIN_CLIENT'),
                'theme' => 'site',
                'email' => 'boss@' . env('DOMAIN_CLIENT'),
                'enable' => true,
                'slug' => env('DOMAIN_CLIENT'),
            ],
            [
                'company_id' => $company->id,
                'name' => 'Alfa',
                'domain' => env('DOMAIN_CLIENT1'),
                'theme' => 'site',
                'email' => 'boss@' . env('DOMAIN_CLIENT1'),
                'enable' => true,
                'slug' => env('DOMAIN_CLIENT1'),
            ],
            [
                'company_id' => $company->id,
                'name' => 'Beta',
                'domain' => env('DOMAIN_CLIENT2'),
                'theme' => 'site',
                'email' => 'boss@' . env('DOMAIN_CLIENT2'),
                'enable' => true,
                'slug' => env('DOMAIN_CLIENT2'),
            ],
            [
                'company_id' => $company->id,
                'name' => 'Omega',
                'domain' => env('DOMAIN_CLIENT3'),
                'theme' => 'site',
                'email' => 'boss@' . env('DOMAIN_CLIENT3'),
                'enable' => true,
                'slug' => env('DOMAIN_CLIENT3'),
            ],
        ];

        foreach($showcasesMap as $showcaseData)
        {
            /** @var Showcase $showcaseObj */
            $showcaseObj = Showcase::create($showcaseData);
            $showcaseObj->domains()->create(['name' => $showcaseData['domain']]);
        }
    }
}
