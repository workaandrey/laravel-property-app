<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $csvFile = fopen(base_path("database/seeders/data/property-data.csv"), "r");

        // Skip the first line (headers)
        fgetcsv($csvFile);

        while (($data = fgetcsv($csvFile)) !== false) {
            Property::create([
                'name' => $data[0],
                'price' => $data[1],
                'bedrooms' => $data[2],
                'bathrooms' => $data[3],
                'storeys' => $data[4],
                'garages' => $data[5],
            ]);
        }

        fclose($csvFile);
    }
}
