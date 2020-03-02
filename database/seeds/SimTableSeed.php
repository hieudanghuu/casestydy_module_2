<?php

use Illuminate\Database\Seeder;
use App\Sim;

class SimTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sim = new Sim();
        $sim->sim_name = '300gb';
        $sim->sim_price = 5000;
        $sim->sim_category_id = 1;
        $sim->save();

        $sim = new Sim();
        $sim->sim_name = '200gb';
        $sim->sim_price = 4000;
        $sim->sim_category_id = 2;
        $sim->save();

        $sim = new Sim();
        $sim->sim_name = '10gb';
        $sim->sim_price = 4500;
        $sim->sim_category_id = 3;
        $sim->save();
    }
}
