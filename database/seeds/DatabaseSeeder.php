<?php

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
        $this->call(UserTableSeed::class);
//        $this->call(OderTableSeed::class);
        $this->call(CategoryTableSeed::class);
        $this->call(SimTableSeed::class);
        $this->call(PostTableSeed::class);
        $this->call(Post_tranTableSeed::class);
//        $this->call(Product_oderTableSeed::class);
    }
}
