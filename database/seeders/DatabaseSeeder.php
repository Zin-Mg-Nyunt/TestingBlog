<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // User::truncate();
        // User::factory(10)->create();
        $mgmg=User::factory()->create(['name'=>'mg mg','username'=>'mgmg']);
        $aungaung=User::factory()->create(['name'=>'aung aung','username'=>'aungaung']);

        $frontend=Category::factory()->create(['name'=>'frontend post','slug'=>'frontend']);
        $backend=Category::factory()->create(['name'=>'backend post','slug'=>'backend']);
        
        Blog::factory(3)->create(['category_id'=>$frontend->id,'user_id'=>$mgmg]);
        Blog::factory(3)->create(['category_id'=>$backend->id,'user_id'=>$aungaung]);
    }
}
