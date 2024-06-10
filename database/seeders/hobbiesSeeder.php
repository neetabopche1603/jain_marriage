<?php

namespace Database\Seeders;

use App\Models\Hobby;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class hobbiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hobbies = [
            ['name' => 'Reading'],
            ['name' => 'Traveling'],
            ['name' => 'Cooking'],
            ['name' => 'Gardening'],
            ['name' => 'Photography'],
            ['name' => 'Painting'],
            ['name' => 'Drawing'],
            ['name' => 'Writing'],
            ['name' => 'Dancing'],
            ['name' => 'Hiking'],
            ['name' => 'Fishing'],
            ['name' => 'Cycling'],
            ['name' => 'Running'],
            ['name' => 'Swimming'],
            ['name' => 'Skiing'],
            ['name' => 'Surfing'],
            ['name' => 'Skateboarding'],
            ['name' => 'Playing Musical Instruments'],
            ['name' => 'Singing'],
            ['name' => 'Knitting'],
            ['name' => 'Crocheting'],
            ['name' => 'Sewing'],
            ['name' => 'Woodworking'],
            ['name' => 'Pottery'],
            ['name' => 'Video Gaming'],
            ['name' => 'Board Gaming'],
            ['name' => 'Collecting'],
            ['name' => 'Bird Watching'],
            ['name' => 'Camping'],
            ['name' => 'Yoga'],
            ['name' => 'Meditation'],
            ['name' => 'Martial Arts'],
            ['name' => 'Cooking'],
            ['name' => 'Baking'],
            ['name' => 'Blogging'],
            ['name' => 'Vlogging'],
            ['name' => 'Astronomy'],
            ['name' => 'DIY Projects'],
            ['name' => 'Home Brewing'],
            ['name' => 'Wine Tasting'],
            ['name' => 'Playing Chess'],
            ['name' => 'Playing Poker'],
            ['name' => 'Calligraphy'],
            ['name' => 'Scrapbooking'],
            ['name' => 'Origami'],
            ['name' => 'Magic Tricks'],
            ['name' => 'Juggling'],
            ['name' => 'Lock Picking'],
            ['name' => 'Learning Languages'],
            ['name' => 'Public Speaking'],
            ['name' => 'Acting'],
        ];
        foreach($hobbies as $hobby){
            Hobby::create([
                'hobby_name'=> strtolower($hobby['name']),
                'status'=>"active",
            ]);
        }
    }
}
