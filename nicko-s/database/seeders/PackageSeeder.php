<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            [
                'PackageName' => 'Package One',
                'LechonQty' => '1',
                'FoodQty' => '5',
                'Foods' => 'Pancit Guisado, Cordon Bleu, Embutido, Humba, Shrimp',
                'DessertQty' => '1',
                'Desserts' => 'Lasagna',
                'BeverageQty' => '2',
                'Beverages' => 'Four Seasons Juice, Iced Tea',
                'TablesQty' => '6',
                'ChairsQty' => '30',
                'DiningSetQty' => '30',
                'Decoration' => 'Table Setting, Buffet Table Setting',
                'Description' => 'This package is good for small - medium occasions having 30 guests maximum',
                'Price' => 16500
            ],
            [
                'PackageName' => 'Package Two',
                'LechonQty' => '1',
                'FoodQty' => '7',
                'Foods' => 'Pancit Guisado, Cordon Bleu, Embutido, Humba, Shrimp, Adobo, Calamaris',
                'DessertQty' => '2',
                'Desserts' => 'Lasagna, Mango Float',
                'BeverageQty' => '3',
                'Beverages' => 'Four Seasons Juice, Iced Tea, Coke',
                'TablesQty' => '10',
                'ChairsQty' => '50',
                'DiningSetQty' => '50',
                'Decoration' => 'Table Setting, Buffet Table Setting, Designs',
                'Description' => 'This package is good for medium- large occasions having 50 guests maximum',
                'Price' => 27000
            ],
            [
                'PackageName' => 'Package Three',
                'LechonQty' => '2',
                'FoodQty' => '9',
                'Foods' => 'Pancit Guisado, Cordon Bleu, Embutido, Humba, Shrimp, Adobo, Calamaris, BBQ, Fried Chicken',
                'DessertQty' => '3',
                'Desserts' => 'Lasagna, Mango Float, Brownies',
                'BeverageQty' => '4',
                'Beverages' => 'Four Seasons Juice, Iced Tea, Coke, Sprite',
                'TablesQty' => '15',
                'ChairsQty' => '75',
                'DiningSetQty' => '75',
                'Decoration' => 'Table Setting, Buffet Table Setting, Special Requests Designs',
                'Description' => 'This package is good for large occasions having 30 guests maximum',
                'Price' => 41000
            ]]);
    }
}
