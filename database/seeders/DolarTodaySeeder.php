<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DolarToday;

class DolarTodaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        if(DolarToday::count() == 0){

            $dolar = new DolarToday;
            $dolar->price = 1800000;
            $dolar->save();

        }

    }
}
