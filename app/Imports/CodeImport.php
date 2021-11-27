<?php
namespace App\Imports;
use App\Models\Code;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class CodeImport implements  ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Code([
            'code' => $row['code'],
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
