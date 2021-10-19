<?php

namespace App\Imports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;

class CityImport implements ToModel, WithHeadingRow, WithChunkReading, ShouldQueue
{
    public function model(array $row)
    {
        return new City([
            'name' => $row['name'],
            'code' => $row['code'],
            'country_id' => $row['country_id'],
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
