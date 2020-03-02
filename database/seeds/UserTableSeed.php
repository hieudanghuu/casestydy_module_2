<?php

use Illuminate\Database\Seeder;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'hieu';
        $user->email = 'hieu@gmail.com';
        $user->password = bcrypt('matkhau');
        $user->level = 2;
        $user->save();
    }
}
