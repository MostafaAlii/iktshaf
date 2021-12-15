<?php

namespace Database\Seeders;

use App\Models\pattern;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class patternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patterns')->delete();

        $patterns = [
            [
                'name'=> 'ميول',
            ],
            [
                'name'=> 'شخصية',
            ],
            [
                'name'=> 'قدرات',
            ],
        ];

        DB::table('patterns')->insert($patterns);

    }
}
