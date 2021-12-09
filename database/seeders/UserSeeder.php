<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        User::create([
            'name' => 'Enrique Tellez',
            'email' => 'enriqcruz884@gmail.com',
            'password' => bcrypt('qwaszx123')
        ])->assignRole('admin');

    }
}
