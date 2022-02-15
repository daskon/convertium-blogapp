<?php

namespace Database\Seeders;
use App\Models\Blog;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::create(
            [
            'title' => 'The first',
            'editor_id' => '2',
            'image' => '1644806960.jpg',
            'content' => '<p>ojchg</p>
                            <p>,bvyf</p>
                            <p>mnbvc</p>
                            <p>lkjhgfd</p>
                            <p>nbvtheztyx</p>',
            ]);
            Blog::create([
                'title' => 'The secound',
                'editor_id' => '2',
                'image' => '1644807030.png',
                'content' => '<p>ojihghfcfx</p>
                                <p>;pjhghfcfx</p>
                                <p>;lkjhgf</p>
                                <p>p;hgyf&nbsp;</p>
                                <p>higyftrx</p>',
            ]);
            Blog::create([
                'title' => 'The Third',
                'editor_id' => '2',
                'image' => '1644816815.jpg',
                'content' => '<p>ojihghfcfx</p>
                                <p>;pjhghfcfx</p>
                                <p>;lkjhgf</p>
                                <p>p;hgyf&nbsp;</p>
                                <p>higyftrx</p>',
            ]
        );
    }
}
