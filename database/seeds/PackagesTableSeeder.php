<?php

use Illuminate\Database\Seeder;
use App\Package;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            ['name' => 'Chipboard packaging'],
            ['name' => 'Container'],
            ['name' => 'Corrugated boxes'],
            ['name' => 'Foil sealed bags'],
            ['name' => 'Pallets'],
            ['name' => 'Paper board boxes'],
            ['name' => 'Plastic boxes'],
            ['name' => 'Polybags'],
            ['name' => 'Rigid boxes'],
            ['name' => 'Envelopes'],
        ];

        Package::insert($packages);
    }
}
