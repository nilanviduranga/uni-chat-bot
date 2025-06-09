<?php

namespace Database\Seeders;

use App\Models\CafeteriaMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CafeteriaMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'meal_type' => 'breakfast',
                'menu_item' => 'Milk Rice with Lunumiris',
                'description' => 'Traditional Sri Lankan milk rice served with spicy onion sambol.',
                'price' => 150.00,
                'status' => 'available',
            ],
            [
                'meal_type' => 'lunch',
                'menu_item' => 'Chicken Rice & Curry',
                'description' => 'Steamed rice served with chicken curry, dhal, and mallung.',
                'price' => 300.00,
                'status' => 'available',
            ],
            [
                'meal_type' => 'dinner',
                'menu_item' => 'Vegetable Fried Rice',
                'description' => 'Fried rice with mixed seasonal vegetables and soy sauce.',
                'price' => 250.00,
                'status' => 'available',
            ],
            [
                'meal_type' => 'lunch',
                'menu_item' => 'Fish Cutlet',
                'description' => 'Crispy fish cutlets, ideal as a side snack.',
                'price' => 50.00,
                'status' => 'unavailable',
            ],
        ];

        foreach ($menus as $menu) {
            CafeteriaMenu::create($menu);
        }
    }
}
