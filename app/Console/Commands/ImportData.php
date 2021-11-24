<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Parser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse data for all cities/municipalities located in Nitra.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $parser = new Parser(); //create new Parser instance
        $urls = $parser->getCitiesUrls(); //get url addresses of all cities

        $bar = $this->output->createProgressBar(count($urls)); //create progress bar
        $bar->start(); //progress bar start

        foreach ($urls as $index=>$url) {

            $data = $parser->getCityData($url); //get city data from url
            $emails = $data['emails']; //get emails from city data array
            $webAddresses = $data['web_addresses']; //get web addresses from city data array

            $imgPath = 'images/' . ($index+1) . '.gif'; //local path to the image
            $contents = file_get_contents($data['img_path']); //get image content from url
            Storage::disk('public')->put($imgPath, $contents); //save image into storage/app/public/images

            $data['img_path'] = $imgPath; //replace image url and image local path
            unset($data['emails'], $data['web_addresses']); //unset items that do not belong to the city table

            $city = City::updateOrCreate($data); //insert city into table (if does not exists)

            //insert each email into table (if does not exists)
            foreach ($emails as $value)
                $city->emails()->updateOrCreate(['email' => $value]);

            //insert each web address into table (if does not exists)
            foreach ($webAddresses as $value)
                $city->webAddresses()->updateOrCreate(['web_address' => $value]);

            $bar->advance(); //progress bar advance
        }

        $bar->finish(); //progress bar finish

        $this->info("\n".'Import was successful!'); //success message
        return Command::SUCCESS;
    }
}
