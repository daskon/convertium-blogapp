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
            'due_date' => '2022-02-15',
            ],
            [
                'blog_id' => '2',
                'publish_date' => '2022-02-13',
                'due_date' => '2022-02-15',
            ]

        );
    }
}
