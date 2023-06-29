<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        $response = Http::get('https://www.latvijasbanka.lv/vk/ecb.xml');

        if ($response->successful()) {
            $xmlData = simplexml_load_string($response->body());

            $currencies = [];

            foreach ($xmlData->Currencies->Currency as $currency) {
                $name = (string)$currency->ID;
                $rate = (float)$currency->Rate;

                $currencies[] = [
                    'currency' => $name,
                    'rate' => $rate,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table('currencies')->insert($currencies);
            DB::table('currencies')->update(['updated_at' => now()]);

            $this->command->info('CurrencySeeder completed successfully.');
        } else {
            $this->command->error('Failed to fetch currency data from the API.');
        }
    }
}
