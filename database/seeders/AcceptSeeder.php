<?php

namespace Database\Seeders;
use App\Models\Accept;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcceptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accept::create(
            [
            'blog_id' => '1',
            'publish_date' => '2022-02-13',
            ],
            [
                'blog_id' => 'The secound',
                'publish_date' => '2022-02-13',
            ]

        );
    }
}
