<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for($i = 0; $i < 10; $i++){
            $new_item = new Project();
            $new_item->name = $faker->company();
            $new_item->slug = Project::generateSlug('new_item->name');
            $new_item->client_name = $faker->name();
            $new_item->summary = $faker->realText();
            $new_item->save();
        }
    }
}
