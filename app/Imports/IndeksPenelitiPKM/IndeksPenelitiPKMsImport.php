<?php

namespace App\Imports\IndeksPenelitiPKM;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class IndeksPenelitiPKMsImport implements ToCollection, WithCalculatedFormulas
{
    private $imported;

    public function collection(Collection $table)
    {
        $this->imported = $table;
    }

    public function getArray() {
        return $this->imported->toArray();
    }
}

/**
 * wow
 */