<?php

namespace Database\Seeders;

use App\Models\Json;
use Illuminate\Database\Seeder;

class JsonFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Json::create([
            'name' => 'User Json',
            'file' => 'assets/json/users.json'
        ]);
    }
}
