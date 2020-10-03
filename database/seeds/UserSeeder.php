<?php

use App\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var User $admin */
        $admin = User::updateOrCreate([
            'name' => 'admin',
            'email' => 'admin@localhost',
        ], [
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
        $admin->assignRoles(['admin', 'employee']);

        User::updateOrCreate([
            'name' => 'user',
            'email' => 'user@localhost',
        ], [
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
