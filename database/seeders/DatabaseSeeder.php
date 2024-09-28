<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Comment;
use App\Models\Discount;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Payment;
use App\Models\Shipment;
use App\Models\ProductDiscount;
use App\Models\UserDiscount;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
          Category::factory(3)->create();
          Product::factory(6)->create();
          User::factory(3)->create();
          Order::factory(3)->create();
          OrderDetail::factory(3)->create();
          Comment::factory(3)->create();
          Discount::factory(3)->create();
          Post::factory(3)->create();
          PostCategory::factory(3)->create();
          Shipment::factory(3)->create();
          Payment::factory(3)->create();
          UserDiscount::factory(3)->create();
          ProductDiscount::factory(3)->create();


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
