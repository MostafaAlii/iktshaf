<?php

namespace App\Imports;

use App\Models\School;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithValidation;
class SchoolImport implements ToModel, WithHeadingRow, WithValidation, WithChunkReading, ShouldQueue
{
    public function model(array $row)
    {
        return new School([
            'name' => $row['name'],
            'code' => $row['code'],
            'city_id' => $row['city_id'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'unique:schools,name',
            ],
            'code' => [
                'required',
                'string',
                'unique:schools,code',
                'min:2','max:2',
            ],
            'city_id' => [
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
