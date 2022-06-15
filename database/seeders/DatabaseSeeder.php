<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(MarkSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(StockSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(WorkSeeder::class);
    }
}
