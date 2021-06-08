<?php

namespace App\Imports;

use App\Models\Agenda;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AgendasImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(collection $rows)
    {
        foreach ($rows as $row) {

            $customizedTitle = date("YmdHis") . '-' . str_replace(' ', '-', $row['judul']);
            $url = url('agenda/' . $customizedTitle);

            $date = date_create($row['tanggal']);
            $formatted_date = date_format($date, "Y-m-d");

            $time = date_create($row['waktu']);
            $formatted_time = date_format($time,"H:i:s");

            Agenda::create([
                'title' => $row['judul'],
                'date' => $formatted_date,
                'time' => $formatted_time,
                'show_thumbnail' => 0,
                'url' => $url,
                'description' => $row['deskripsi'],
                'user_id' => Auth::user()->id
            ]);
        }
    }
}
