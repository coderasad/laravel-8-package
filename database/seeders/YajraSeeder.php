<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class YajraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Yajra::factory()->count(100)->create()->each(function ($yajra) {
            $yajra->save();
        });
    }
}
