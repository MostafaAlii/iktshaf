<?php

namespace App\Imports;

use App\Models\School;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\City;

class SchoolImport implements  ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $city = City::where('code',$row['city_code'])->first();

        return new School([
            'name' => $row['name'],
            'code' => $row['code'],
            'city_id' => $city->id,
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
