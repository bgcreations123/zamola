<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
    	for($i=1; $i<=5; $i++){
    		Client::create([
            	'name' => 'Default_'.$i,
            	'link' => 'http://Default_'.$i.'.com',
            	'logo' => $i.'.png',
            	'public' => 'yes',
            ]);
    	};
    }
}
