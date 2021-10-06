<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $user = User::create([
            'name' => 'User',
            'email' => 'user@app.com',
<<<<<<< HEAD
            'code'  =>  'user_code',
=======
>>>>>>> 067fd75c7dc15a452907c838c4f003d39372ff04
            'password' => bcrypt('123123'),
        ]);
    }
}
