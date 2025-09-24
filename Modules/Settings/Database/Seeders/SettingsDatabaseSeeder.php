<?php

namespace Modules\Settings\Database\Seeders;

use App\Support\SettingJson;
use Illuminate\Database\Seeder;
use Laraeast\LaravelSettings\Facades\Settings;

class SettingsDatabaseSeeder extends Seeder
{
    /**
     * The list of the files keys.
     *
     * @var array
     */
    protected $files = [
        'logo',
        'favicon',
        'loginLogo',
        'loginBackground',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::set('name:en', 'Scaffolding');
        Settings::set('name:ar', 'Scaffolding');

        Settings::set('description:en', 'Scaffolding');
        Settings::set('description:ar', 'Scaffolding');

        Settings::set('meta_description:en', 'Scaffolding');
        Settings::set('meta_description:ar', 'Scaffolding');

        Settings::set('dashboard_template', 'qovex');

        // images
        //        foreach ($this->files as $file) {
        //            Settings::set($file)->addMedia(__DIR__ . '/images/' . $file . '.png')
        //                ->preservingOriginal()
        //                ->toMediaCollection($file);
        //        }

        app(SettingJson::class)->update();
    }
}
