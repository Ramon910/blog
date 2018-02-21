<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        //Storage::disk('public')->deleteDirectory('/');

        $user = new User;
        $user->name = 'ramon';
        $user->email = 'ramon@gmail.com';
        $user->password = bcrypt('123456');

        $user->save();
    }
}
