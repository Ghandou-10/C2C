<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Accounts\Database\Seeders\UsersTableSeeder;
use Modules\Articles\Database\Seeders\ArticlesDatabaseSeeder;
use Modules\Countries\Database\Seeders\CountriesTableSeeder;
use Modules\Pages\Database\Seeders\PagesDatabaseSeeder;
use Modules\Settings\Database\Seeders\SettingsDatabaseSeeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(UsersTableSeeder::class);
        if (\Module::isEnabled('Articles')) {
            $this->call(ArticlesDatabaseSeeder::class);
        }
        if (\Module::isEnabled('Pages')) {
            $this->call(PagesDatabaseSeeder::class);
        }
        if (\Module::isEnabled('Countries')) {
            $this->call(CountriesTableSeeder::class);
        }
        $this->call(SettingsDatabaseSeeder::class);
    }
}
