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
        $sim->locale =  'vi';
        $sim->description = 'sử dụng 300gb / tháng, dùng cho điện thoại và cục phát wifi quốc tế '  ;
        $sim->sim_category_id = 1;
        $sim->save();

        $sim = new Sim();
        $sim->sim_name = '300gb';
        $sim->sim_price = 5000;
        $sim->locale =  'jp';
        $sim->description = '300 GB /月を使用し、電話と国際Wi-Fiトランスミッターに使用 '  ;
        $sim->sim_category_id = 1;
        $sim->save();


        $sim = new Sim();
        $sim->sim_name = '200gb';
        $sim->sim_price = 4000;
        $sim->locale =  'vi';
        $sim->description = 'sử dụng 200gb / tháng, dùng cho điện thoại và cục phát wifi quốc tế   '  ;
        $sim->sim_category_id = 2;
        $sim->save();

        $sim = new Sim();
        $sim->sim_name = '200gb';
        $sim->sim_price = 4000;
        $sim->locale =  'jp';
        $sim->description = '200 GB /月を使用し、電話と国際Wi-Fiトランスミッターに使用  '  ;
        $sim->sim_category_id = 2;
        $sim->save();


        $sim = new Sim();
        $sim->sim_name = '10gb';
        $sim->sim_price = 4500;
        $sim->locale =  'vi';
        $sim->description = 'sử dụng 10gb / tháng, dùng cho điện thoại và cục phát wifi quốc tế , dùng để lướt web và tra tàu '  ;
        $sim->sim_category_id = 3;
        $sim->save();


        $sim = new Sim();
        $sim->sim_name = '10gb';
        $sim->sim_price = 4500;
        $sim->locale =  'jp';
        $sim->description = '10ギガバイト/月を使用し、電話や国際Wi-Fiトランスミッターに使用し、Webサーフィンやトレーニングに使用します'  ;
        $sim->sim_category_id = 3;
        $sim->save();


        $sim = new Sim();
        $sim->sim_name = '300gb';
        $sim->sim_price = 5000;
        $sim->locale =  'vi';
        $sim->description = 'sử dụng 300gb / tháng, dùng cho điện thoại và cục phát wifi quốc tế   '  ;
        $sim->sim_category_id = 2;
        $sim->save();

        $sim = new Sim();
        $sim->sim_name = '300gb';
        $sim->sim_price = 5000;
        $sim->locale =  'jp';
        $sim->description = '300 GB /月を使用し、電話と国際Wi-Fiトランスミッターに使用'  ;
        $sim->sim_category_id = 2;
        $sim->save();


        $sim = new Sim();
        $sim->sim_name = '200gb';
        $sim->sim_price = 4000;
        $sim->locale =  'vi';
        $sim->description = 'sử dụng 200gb / tháng, dùng cho điện thoại và cục phát wifi quốc tế   '  ;
        $sim->sim_category_id = 3;
        $sim->save();

        $sim = new Sim();
        $sim->sim_name = '200gb';
        $sim->sim_price = 4000;
        $sim->locale =  'jp';
        $sim->description = '200 GB /月を使用し、電話と国際Wi-Fiトランスミッターに使用'  ;
        $sim->sim_category_id = 3;
        $sim->save();


        $sim = new Sim();
        $sim->sim_name = '10gb';
        $sim->sim_price = 4500;
        $sim->locale =  'vi';
        $sim->description = 'sử dụng 10gb / tháng, dùng cho điện thoại và cục phát wifi quốc tế , dùng để lướt web và tra tàu '  ;
        $sim->sim_category_id = 1;
        $sim->save();

        $sim = new Sim();
        $sim->sim_name = '10gb';
        $sim->sim_price = 4500;
        $sim->locale =  'jp';
        $sim->description = '10ギガバイト/月を使用し、電話や国際Wi-Fiトランスミッターに使用し、Webサーフィンやトレーニングに使用します '  ;
        $sim->sim_category_id = 1;
        $sim->save();


        $sim = new Sim();
        $sim->sim_name = '300gb';
        $sim->sim_price = 5000;
        $sim->locale =  'vi';
        $sim->description = 'sử dụng 300gb / tháng, dùng cho điện thoại và cục phát wifi quốc tế'  ;
        $sim->sim_category_id = 3;
        $sim->save();

        $sim = new Sim();
        $sim->sim_name = '300gb';
        $sim->sim_price = 5000;
        $sim->locale =  'jp';
        $sim->description = '300 GB /月を使用し、電話と国際Wi-Fiトランスミッターに使用'  ;
        $sim->sim_category_id = 3;
        $sim->save();


        $sim = new Sim();
        $sim->sim_name = '200gb';
        $sim->sim_price = 4000;
        $sim->locale =  'vi';
        $sim->description = 'sử dụng 200gb / tháng, dùng cho điện thoại và cục phát wifi quốc tế '  ;
        $sim->sim_category_id = 1;
        $sim->save();

        $sim = new Sim();
        $sim->sim_name = '200gb';
        $sim->sim_price = 4000;
        $sim->locale =  'jp';
        $sim->description = '200 GB /月を使用し、電話と国際Wi-Fiトランスミッターに使用'  ;
        $sim->sim_category_id = 1;
        $sim->save();


        $sim = new Sim();
        $sim->sim_name = '10gb';
        $sim->description = 'sử dụng 10gb / tháng, dùng cho điện thoại và cục phát wifi quốc tế , dùng để lướt web và tra tàu  '  ;
        $sim->sim_price = 4500;
        $sim->locale =  'vi';
        $sim->sim_category_id = 2;
        $sim->save();

        $sim = new Sim();
        $sim->sim_name = '10gb';
        $sim->description = '10ギガバイト/月を使用し、電話や国際Wi-Fiトランスミッターに使用し、Webサーフィンやトレーニングに使用します'  ;
        $sim->sim_price = 4500;
        $sim->locale =  'jp';
        $sim->sim_category_id = 2;
        $sim->save();
    }
}
