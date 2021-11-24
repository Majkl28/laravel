<?php

namespace Database\Seeders;

use App\Models\Parser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parser = new Parser();
//        $data = $parser->getCitiesData();
//        foreach ($data as $row)
//            DB::table('cities')->updateOrInsert($row);

        $urls = $parser->getCitiesUrls();

        $this->command->getOutput()->progressStart(count($urls));
        foreach ($urls as $url) {
            sleep(1);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
