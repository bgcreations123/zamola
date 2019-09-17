<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'paid'],
            ['name' => 'unpaid'],
            ['name' => 'pending'],
            ['name' => 'approved'],
            ['name' => 'delivered'],
            ['name' => 'transit'],
            ['name' => 'booking'],
            ['name' => 'rejected'],
        ];

        Status::insert($statuses);
    }
}
