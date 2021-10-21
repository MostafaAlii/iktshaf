<?php

namespace App\Imports;

use App\Models\Country;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithValidation;

class CountryImport implements ToModel, WithHeadingRow, WithChunkReading, WithValidation, ShouldQueue
{
    public function model(array $row)
    {
        return new Country([
            'name' => $row['name'],
            'code' => $row['code'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'unique:countries,name',
            ],
            'code' => [
                'required',
                'string',
                'unique:countries,code',
                'min:2','max:2',
                'unique:countries',
            ],
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
