<?php

use Illuminate\Database\Seeder;

class StagairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Stagaire::class, 100)->create();
    }
}
