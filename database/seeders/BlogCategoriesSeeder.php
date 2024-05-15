<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Lifestyle',
            'Blogging',
            'Fashion',
            'Travel',
            'Finance',
            'Personal blogs',
            'Fitness',
            'Food blogs',
            'Parenting',
            'Affiliate blog',
            'DIY',
            'Multimedia blogs',
            'News',
            'Beauty',
            'Business',
            'Case studies',
            'Pets',
            'Reviews',
            'Sports',
            'Technology',
            'Art blogs',
            'Beverage blogs',
            'Comparison'
        ];

        foreach ($categories as $category) {
            BlogCategory::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
