<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class StudentsImport implements ToModel, WithValidation, WithHeadingRow, SkipsOnFailure, SkipsOnError
{
    use Importable, SkipsFailures, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'nim' => $row["nim"],
            'name' => $row["nama"],
        ]);
    }

    public function rules(): array
    {
        return [
            'nim' => 'required',
            'nama' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nim.required' => 'Nim tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
        ];
    }
}
