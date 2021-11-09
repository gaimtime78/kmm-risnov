<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class IndeksPenelitiPKMsExport implements FromArray
{
    protected $table;

    public function __construct(array $table)
    {
        $this->table = $table;
    }

    public function array(): array
    {
        return $this->table;
    }
}
