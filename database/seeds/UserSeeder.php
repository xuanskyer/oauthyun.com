<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

    public function run()
    {
        app('db')->table('users')->delete();

        $user = app()->make('App\Models\User');
        $hasher = app()->make('hash');

        $user->fill([
            'name' => 'furthestworld',
            'email' => 'furthestworld@icloud.com',
            'password' => $hasher->make('furthest@world')
        ]);
        $user->save();
    }

}