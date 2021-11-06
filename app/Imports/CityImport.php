<?php

namespace App\Imports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithValidation;

class CityImport implements ToModel, WithHeadingRow, WithChunkReading, WithValidation, ShouldQueue
{
    public function model(array $row)
    {
        return new City([
            'name' => $row['name'],
            'code' => $row['code'],
            'country_id' => $row['country_id'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'unique:cities,name',
            ],
            'code' => [
                'required',
                'string',
                'unique:countries,code',
                'min:2','max:2',
                'unique:countries',
            ],
            'country_id' => [
                'required',
                'numeric',
            ],
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
