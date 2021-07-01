<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
            ]
        ]);

        DB::table('detail_weekly_book')->insert([
            [
                'startDay'=> '2021-',
                'finishDay'=> 'Coffee',
                'deliveryTime'=> 'one-third espresso, one-third heated milk, one-third milk foam.',
                'mon'=> '50000',
                'tue'=> 'https://bitly.com.vn/18xixr',
                'wed',
                'thu',
                'fri',
                'sat',
                'sun'
            ]
        ]);
        
    }
}
