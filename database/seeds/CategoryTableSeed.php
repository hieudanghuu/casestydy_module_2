<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate = new Category();
        $cate->category_name = 'docomo';
        $cate->save();

        $cate = new Category();
        $cate->category_name = 'softbank';
        $cate->save();

        $cate = new Category();
        $cate->category_name = 'au';
        $cate->save();
    }
}
