<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_type = ['Front-end', 'Back-end', 'Full-stack'];

        foreach($list_type as $type){
            $new_type = new Category();
            $new_type->type = $type;
            $new_type->slug = Str::slug($type);
            $new_type->save();
        }
    }
}
