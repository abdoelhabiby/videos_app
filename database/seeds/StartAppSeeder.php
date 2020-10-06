<?php

use Illuminate\Database\Seeder;

class StartAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class)->create();

         factory(App\Models\Page::class,2)->create();

        factory(App\Models\Skill::class,5)->create();
        factory(App\Models\Tag::class,5)->create();
    }
}
