<?php

use Illuminate\Database\Seeder;
use App\TCG\Voyager\Src\Traits\Seedable;

class VoyagerDummyDatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__.'/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('CategoriesTableSeeder');
        $this->seed('UsersTableSeeder');
        $this->seed('PostsTableSeeder');
        $this->seed('PagesTableSeeder');
        $this->seed('SettingsTableSeeder');
        $this->seed('TranslationsTableSeeder');
    }
}
