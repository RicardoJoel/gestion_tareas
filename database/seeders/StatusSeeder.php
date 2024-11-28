<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [[
            'code' => '1PE',
            'name' => 'Pendiente'
        ],[
            'code' => '2EP',
            'name' => 'En progreso'
        ],[
            'code' => '3CO',
            'name' => 'Completada'
        ]];

        foreach ($array as $item) {
            Status::create($item);
        }
    }
}
