<?php
namespace App\Imports;
use App\Models\Code;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
class CodeImport implements ToModel, WithHeadingRow, WithChunkReading, ShouldQueue
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
