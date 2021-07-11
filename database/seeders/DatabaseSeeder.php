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

        DB::table('users')->insert([
            [
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345678'),
                'fullName'=> 'User',
                'gender'=> '3',
                'phone' => '1234567890',
                'address' => 'Thuận Kiều Plaza, Quận 5, Tp.HCM',
            ]
        ]);

        DB::table('users')->insert([
            [
                'username' => 'Quân',
                'email' => 'quan@gmail.com',
                'password' => bcrypt('12345678'),
                'fullName'=> 'Đặng Minh Quân',
                'gender'=> '1',
                'phone' => '0123456788',
                'address' => '196 Võ Văn Ngân, Bình Thọ, Thủ Đức',
            ]
        ]);

        DB::table('users')->insert([
            [
                'username' => 'Ngân',
                'email' => 'ngan@gmail.com',
                'password' => bcrypt('12345678'),
                'fullName'=> 'Mai Thị Hà Ngân',
                'gender'=> '2',
                'phone' => '0843085555',
                'address' => 'Ktx khu A, Linh Trung, Thủ Đức',
            ]
        ]);

        DB::table('users')->insert([
            [
                'username' => 'Ngọc',
                'email' => 'ngoc@gmail.com',
                'password' => bcrypt('12345678'),
                'fullName'=> 'Trần Nguyễn Minh Ngọc',
                'gender'=> '2',
                'phone' => '0935452777',
                'address' => 'Suối Tân, Cam Lâm, Khánh Hòa',
            ]
        ]);

        DB::table('users')->insert([
            [
                'username' => 'Hưng',
                'email' => 'hung@gmail.com',
                'password' => bcrypt('12345678'),
                'fullName'=> 'Phạm Quốc Duy Hưng',
                'gender'=> '1',
                'phone' => '0389651234',
                'address' => '20 Trần Phú, Lộc Thọ, Thành phố Nha Trang, Khánh Hòa',
            ]
        ]);

        DB::table('users')->insert([
            [
                'username' => 'Đạo',
                'email' => 'dao@gmail.com',
                'password' => bcrypt('12345678'),
                'fullName'=> 'Dương Đức Đạo',
                'gender'=> '1',
                'phone' => '038659147',
                'address' => 'Ktx khu B, Dĩ An, Bình Dương',
            ]
        ]);

        DB::table('users')->insert([
            [
                'username' => 'Dung',
                'email' => 'dung@gmail.com',
                'password' => bcrypt('12345678'),
                'fullName'=> 'Nguyễn Thị Mỹ Dung',
                'gender'=> '2',
                'phone' => '038659547',
                'address' => '129 Đường Man Thiện, Hiệp Phú, Quận 9, Tp.HCM',
            ]
        ]);

        DB::table('menu')->insert([
            [
                'category' => 'Coffee',
                'name' => 'Affogato',
                'picture' => 'https://i.ibb.co/MP2brT2/image7.png',
                'price' => '50000',
                'description' => 'a dessert with two main parts: vanilla ice cream and espress',
            ]
        ]);
        
        DB::table('menu')->insert([
            [
                'category' => 'Coffee',
                'name' => 'Cafe Latte',
                'picture' => 'https://i.ibb.co/vsNd2KH/cafe-latte.png',
                'price' => '45000',
                'description' => 'a hot drink made from espresso (= strong coffee) and warm milk',
            ]
        ]);

        DB::table('menu')->insert([
            [
                'category' => 'Coffee',
                'name' => 'Americano',
                'picture' => 'https://i.ibb.co/swCYCGr/americano.png',
                'price' => '45000',
                'description' => 'a type of coffee drink made by adding hot water to espresso coffee',
            ]
        ]);
        
        DB::table('menu')->insert([
            [
                'category' => 'Coffee',
                'name' => 'Cappucino',
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
                'picture' => 'https://i.ibb.co/WcdKfn3/iced-mocha.png',
                'price' => '50000',
                'description' => 'delicious coffee extract and skimmed milk, blended with ice',
            ]
        ]);
        
        DB::table('menu')->insert([
            [
                'category' => 'Iced Blended',
                'name' => 'Iced Tiramisu',
                'picture' => 'https://i.ibb.co/L0Rr0kV/iced-tiramisu.png',
                'price' => '55000',
                'description' => 'cream cheese, dark chocolate, and sweet vanilla',
            ]
        ]);
        
        DB::table('menu')->insert([
            [
                'category' => 'Iced Blended',
                'name' => 'Frappucino',
                'picture' => 'https://i.ibb.co/zbPyJ2Y/frappucino.png',
                'price' => '55000',
                'description' => 'a line of highly-sweetened iced, blended coffee drinks',
            ]
        ]);
        
        DB::table('menu')->insert([
            [
                'category' => 'Tea',
                'name' => 'Classic Milk Tea',
                'picture' => 'https://i.ibb.co/qmkRSHm/classic-milk-tea.png',
                'price' => '45000',
                'description' => 'A cold drink, sweet, milky with a strong taste of creamy black tea',
            ]
        ]);

        DB::table('menu')->insert([
            [
                'category' => 'Tea',
                'name' => 'Lemon Tea',
                'picture' => 'https://i.ibb.co/sR22CzJ/lemon-tea.png',
                'price' => '45000',
                'description' => 'a refreshing tea where lemon juice is added in black or green tea',
            ]
        ]);

        DB::table('menu')->insert([
            [
                'category' => 'Tea',
                'name' => 'Ginger Tea',
                'picture' => 'https://i.ibb.co/JK0HPK6/ginger-tea.png',
                'price' => '45000',
                'description' => 'a lovely, lightly spicy drink for warming up on cold days',
            ]
        ]);

        DB::table('menu')->insert([
            [
                'category' => 'Smoothie',
                'name' => 'Mango Smoothie',
                'picture' => 'https://i.ibb.co/tszyNJf/mango-smoothie.png',
                'price' => '50000',
                'description' => 'made with fresh mango and a handful of ingredients (dairy or dairy-free)',
            ]
        ]);

        DB::table('menu')->insert([
            [
                'category' => 'Smoothie',
                'name' => 'Banana Smoothie',
                'picture' => 'https://i.ibb.co/dbxnq3D/banana-smoothie.png',
                'price' => '50000',
                'description' => 'full of rich banana flavor and is a good source of potassium',
            ]
        ]);

        DB::table('menu')->insert([
            [
                'category' => 'Smoothie',
                'name' => 'Tropical Smoothie',
                'picture' => 'https://i.ibb.co/4ScrN4T/tropical-smoothie.png',
                'price' => '55000',
                'description' => 'strawberry, raspberries and blueberry',
            ]
        ]);

        DB::table('topping')->insert([
            [
                'name' => 'Ice Cream',
                'price' => '5000',
            ]
        ]);

        DB::table('topping')->insert([
            [
                'name' => 'Sweet Serup',
                'price' => '10000',
            ]
        ]);
        
        DB::table('topping')->insert([
            [
                'name' => 'Vanilla',
                'price' => '5000',
            ]
        ]);

        DB::table('topping')->insert([
            [
                'name' => 'Butter',
                'price' => '8000',
            ]
        ]);

        DB::table('topping')->insert([
            [
                'name' => 'Spices',
                'price' => '5000',
            ]
        ]);

        DB::table('topping')->insert([
            [
                'name' => 'Nondairy milks',
                'price' => '5000',
            ]
        ]);

        DB::table('promotion')->insert([
            [
                'promotionType' => '0',
                'promotionCode' => 'PERCENT1',
                'percentPromo' => '50',
                'moneyPromo' => null,              
                'expireDay' => '2021-08-04',
                'status' => '1',
            ]
        ]);

        DB::table('promotion')->insert([
            [
                'promotionType' => '1',
                'promotionCode' => 'MONEY1',
                'percentPromo' => null,
                'moneyPromo' => '15000',
                'expireDay' => '2021-08-04',
                'status' => '1',
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
