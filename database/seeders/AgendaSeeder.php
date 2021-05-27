<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agendas = [
            ["title" => "Meet with Duobam", "date" => "2021-06-01", "time" => "07:09"],
            ["title" => "Meet with Fix San", "date" => "2021-05-12", "time" => "00:00"],
            ["title" => "Meet with Rank", "date" => "2021-05-15", "time" => "06:06"],
            ["title" => "Meet with Span", "date" => "2021-05-13", "time" => "17:43"],
            ["title" => "Meet with Rank", "date" => "2021-05-10", "time" => "22:19"],
            ["title" => "Meet with Gembucket", "date" => "2021-06-03", "time" => "15:47"],
            ["title" => "Meet with Ronstring", "date" => "2021-05-12", "time" => "01:34"],
            ["title" => "Meet with Rank", "date" => "2021-06-10", "time" => "02:12"],
            ["title" => "Meet with Cardify", "date" => "2021-05-20", "time" => "02:32"],
            ["title" => "Meet with Regrant", "date" => "2021-05-20", "time" => "17:03"],
            ["title" => "Meet with Aerified", "date" => "2021-06-27", "time" => "15:25"],
            ["title" => "Meet with Aerified", "date" => "2021-06-04", "time" => "06:32"],
            ["title" => "Meet with Otcom", "date" => "2021-06-21", "time" => "16:04"],
            ["title" => "Meet with Veribet", "date" => "2021-05-11", "time" => "10:02"],
        ];

        foreach ($agendas as $key => $value) {
            Agenda::create($value);
        }
    }
}
