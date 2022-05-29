<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::statement(' SET FOREIGN_KEY_CHECKS = 0 ');

        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();

        $userQuantity = 1000;
        $categoryQuantity = 30;
        $productQuantity = 1000;
        $transactionQuantity = 1000;

        User::factory($userQuantity)->create();
        Category::factory($categoryQuantity)->create();
        Product::factory($productQuantity)->create()->each(function($product){
            $categories = Category::all()->random(mt_rand(1,5))->pluck('id');
            $product->categories()->attach($categories);
        });
        Transaction::factory($transactionQuantity)->create();

    }
}
