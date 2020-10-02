<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => "ahmed",
            'email'=> "a@a.com",
            'group' => "super_admin",
            'password' => bcrypt(123456789),
        ]);
    }
}
