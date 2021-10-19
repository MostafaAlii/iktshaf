<?php

namespace App\Imports;

use App\Models\School;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;

class SchoolImport implements ToModel, WithHeadingRow, WithChunkReading, ShouldQueue
{
    public function model(array $row)
    {
        return new School([
            'name' => $row['name'],
            'code' => $row['code'],
            'city_id' => $row['city_id'],
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
