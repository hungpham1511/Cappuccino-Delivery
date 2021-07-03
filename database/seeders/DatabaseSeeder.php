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

        DB::table('menu')->insert([
            [
                'category' => 'Coffee',
                'name' => 'Affogato',
                'picture' => 'https://i.ibb.co/MP2brT2/image7.png',
                'price' => '50000',
                'description' => 'an Italian coffee-based dessert',
            ]
        ]);
        
        DB::table('menu')->insert([
            [
                'category' => 'Coffee',
                'name' => 'Cafe Latte',
                'picture' => 'https://i.ibb.co/vsNd2KH/cafe-latte.png',
                'price' => '45000',
                'description' => 'espresso and steamed milk',
            ]
        ]);

        DB::table('menu')->insert([
            [
                'category' => 'Coffee',
                'name' => 'Americano',
                'picture' => 'https://i.ibb.co/swCYCGr/americano.png',
                'price' => '45000',
                'description' => 'an espresso-based drink',
            ]
        ]);
        
        DB::table('menu')->insert([
            [
                'category' => 'Coffee',
                'name' => 'Cappuccino',
                'picture' => 'https://i.ibb.co/GJ8cJ3V/cappuccino.png',
                'price' => '45000',
                'description' => 'one-third espresso, one-third heated milk, one-third milk foam',
            ]
        ]);
        
        DB::table('menu')->insert([
            [
                'category' => 'Coffee',
                'name' => 'Cafe Au Lait',
                'picture' => 'https://i.ibb.co/1GGs3TV/cafe-au-lait.png',
                'price' => '45000',
                'description' => 'strong or bold coffee mixed with scalded milk',
            ]
        ]);
        
        DB::table('menu')->insert([
            [
                'category' => 'Iced Blended',
                'name' => 'Frappé',
                'picture' => 'https://i.ibb.co/9ZMt34Y/frappe.png',
                'price' => '50000',
                'description' => 'a foam-covered iced coffee drink made from instant coffee',
            ]
        ]);
        
        DB::table('menu')->insert([
            [
                'category' => 'Iced Blended',
                'name' => 'Iced Mocha',
                'picture' => 'https://i.ibb.co/P6Qg1SZ/iced-mocha.png',
                'price' => '50000',
                'description' => 'iced version of mocha coffee',
            ]
        ]);
        
        DB::table('menu')->insert([
            [
                'category' => 'Iced Blended',
                'name' => 'Iced Tiramisu',
                'picture' => 'https://i.ibb.co/VQ4BYrX/iced-tiramisu.png',
                'price' => '55000',
                'description' => 'cream cheese, dark chocolate, and sweet vanilla',
            ]
        ]);
        
        DB::table('menu')->insert([
            [
                'category' => 'Iced Blended',
                'name' => 'Frappuccino',
                'picture' => 'https://i.ibb.co/4twwHCf/frappuccino.png',
                'price' => '55000',
                'description' => 'coffee ice blended',
            ]
        ]);
        
        DB::table('menu')->insert([
            [
                'category' => 'Tea',
                'name' => 'Classic Milk Tea',
                'picture' => 'https://i.ibb.co/VBxmW6H/classic-milk-tea.png',
                'price' => '45000',
                'description' => 'iced tea with tapioca pearls',
            ]
        ]);

        DB::table('menu')->insert([
            [
                'category' => 'Tea',
                'name' => 'Lemon Tea',
                'picture' => 'https://i.ibb.co/CJndkyW/lemon-tea.png',
                'price' => '45000',
                'description' => 'add a range of vitamins to your diet',
            ]
        ]);

        DB::table('menu')->insert([
            [
                'category' => 'Tea',
                'name' => 'Ginger Tea',
                'picture' => 'https://i.ibb.co/41KCD6q/ginger-tea.png',
                'price' => '45000',
                'description' => 'perfect for cold weather, rainy days',
            ]
        ]);

        DB::table('menu')->insert([
            [
                'category' => 'Smoothie',
                'name' => 'Mango Smoothie',
                'picture' => 'https://i.ibb.co/g4Qb2V6/mango-smoothie.png',
                'price' => '50000',
                'description' => 'healthy drinks for life',
            ]
        ]);

        DB::table('menu')->insert([
            [
                'category' => 'Smoothie',
                'name' => 'Banana Smoothie',
                'picture' => 'https://i.ibb.co/njYyXSQ/banana-smoothie.png',
                'price' => '50000',
                'description' => 'brilliant way to start your day',
            ]
        ]);

        DB::table('menu')->insert([
            [
                'category' => 'Smoothie',
                'name' => 'Tropical Smoothie',
                'picture' => 'https://i.ibb.co/fkxzz68/tropical-smoothie.png',
                'price' => '55000',
                'description' => 'strawberry, raspberries and blueberry',
            ]
        ]);
        /*DB::table('detail_weekly_book')->insert([
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
        ]);*/
        
    }
}
