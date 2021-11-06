<?php

namespace App\Imports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Country;

class CityImport implements  ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        $country = Country::where('code',$row['country_code'])->first();

        return new City([
            'name' => $row['name'],
            'code' => $row['code'],
            'country_id' => $country->id,
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
                'smin:2','max:2',
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
