<?php

namespace Database\Seeders;
use App\Models\Editor;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EditorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Editor::create(
            [
            'user_id' => '2',
            ]

        );
    }
}
