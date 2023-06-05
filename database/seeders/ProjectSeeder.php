<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = config('portfolio.projects');
        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->name = $project['name'];
            $newProject->slug = Str::slug($project, '-');
            $newProject->image = $project['image'];
            $newProject->link = $project['link'];
            $newProject->save();
        }
    }
}
