<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\IndeksPenelitiPKM;
use App\Exports\IndeksPenelitiPKM\IndeksPenelitiPKMsExport;
use App\Imports\IndeksPenelitiPKM\IndeksPenelitiPKMsImport;
use Maatwebsite\Excel\Facades\Excel;

class IndeksPenelitiPKMController extends Controller
{
    public function index()
    {
        $indekspenelitipkm = IndeksPenelitiPKM::select('periode', 'tahun_input','sumber_data')->distinct()->get('periode', 'id','sumber_data');
        $nama_table = IndeksPenelitiPKM::select('nama_table')->distinct()->get('nama_table', 'id');

        return view('admin.indekspenelitipkm.index', ['indekspenelitipkm' => $indekspenelitipkm, 'nama_table'=> $nama_table]);
    }

    public function updateNamaTable(Request $request, $nama_table)
    {
        $penelitipengabdi = IndeksPenelitiPKM::where([['nama_table', $nama_table]])->get();
        
        foreach ($penelitipengabdi as $peneliti) {
            $peneliti->nama_table = $request->nama_table;
            $peneliti->save();
        }

        return redirect(route('admin.indekspenelitipkm.index'));
    }

    
    public function details(Request $request, $periode, $tahun_input)
    {
        $data = $periode;
        $tahun = $tahun_input;
        $indekspenelitipkm = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->get()->toArray();
        // dd($indekspenelitipkm);
        /**
         * RENCANA 
         * $table = [
         *      'nama_fakultas_1' => [
         *          ['jml' => 69, percent => '42.0%'], h_index 0
         *          ['jml' => 69, percent => '42.0%'], h_index 1
         *          ...
         *      ],
         *      'nama_fakultas_2' => [
         *          ['jml' => 69, percent => '42.0%']
         *      ],
         *      ...
         *  ]
         */
        $table = [];
        foreach ($indekspenelitipkm as $row) {
            $fakultas = $row['fakultas'];
            $table[$fakultas] = array();
            for ($h_index = 0; $h_index <=23; $h_index++) {                
                $h_index_data = [];
                if ($h_index < 23) {
                    $h_index_data = [
                        'jumlah' => $row['jumlah' . $h_index ],
                        'percent' => $row['percent' . $h_index ],
                    ];
                } else {
                    $h_index_data = [
                        'jumlahtotal' => $row['jumlahtotal'],
                        'percenttotal' => $row['percenttotal'],
                    ];
                }
                array_push($table[$fakultas], $h_index_data);
            }
        }
        // dd($table);
        // echo '<table style="border-collapse: collapse; ">';
        // echo '<tr>';
        // echo '<td style="border: 1px solid black; padding: 4px; text-align:center;" colspan="2" rowspan="2">H-index</td>';
        // echo '<td style="border: 1px solid black; padding: 4px; text-align:center;" colspan="13">FAKULTAS</td>';
        // echo '<td style="border: 1px solid black; padding: 4px; text-align:center;" colspan="2" rowspan="2">JUMLAH</td>';
        // echo '</tr>';
        // echo '<tr>';
        // $jumlah_h_index_semua = 0;
        // foreach($table as $fakultas => $data) {
        //     $jumlah_h_index_semua += $data[23]['jumlahtotal'];
        //     echo '<td style="border: 1px solid black; padding: 4px; text-align:center;">'. $fakultas .'</td>';
        // }
        // echo '</tr>';
        // for($h_index = 0; $h_index <= 23; $h_index++) {
        //     echo '<tr>';
        //     if ($h_index < 23) {
        //         echo '<td style="border: 1px solid black; padding: 4px; text-align:center;" rowspan="2">'. $h_index .'</td>';
        //         echo '<td style="border: 1px solid black; padding: 4px; text-align:center;">Jumlah</td>';
        //     } else {
        //         echo '<td style="border: 1px solid black; padding: 4px; text-align:center;" colspan="2" rowspan="2">Jumlah</td>';
                
        //     }
        //     $jumlah_h_index_fakultas = 0;
        //     foreach($table as $fakultas => $data) {
        //         if ($h_index < 23) {
        //             $jumlah_h_index_fakultas += $data[$h_index]['jumlah'];
        //             echo '<td style="border: 1px solid black; padding: 4px; text-align:center;">' . $data[$h_index]['jumlah'] . '</td>';
        //         } else {
        //             echo '<td style="border: 1px solid black; padding: 4px; text-align:center;">' . $data[$h_index]['jumlahtotal'] . '</td>';
        //         }
        //     }
        //     if ($h_index < 23) {
        //         echo '<td style="border: 1px solid black; padding: 4px; text-align:center;">' . $jumlah_h_index_fakultas . '</td>';            
        //     } else {
        //         echo '<td style="border: 1px solid black; padding: 4px; text-align:center;">' . $jumlah_h_index_semua . '</td>';            
        //     }
        //     echo '</tr>';

        //     echo '<tr>';
        //     if ($h_index < 23) {
        //         echo '<td style="border: 1px solid black; padding: 4px; text-align:center;">Percent</td>';
        //     }
        //     foreach($table as $fakultas => $data) {
        //         if ($h_index < 23) {
        //             echo '<td style="border: 1px solid black; padding: 4px; text-align:center;">' . $data[$h_index]['percent'] . '%</td>';
        //         } else {
        //             echo '<td style="border: 1px solid black; padding: 4px; text-align:center;">' . $data[$h_index]['percenttotal'] . '%</td>';
        //         }
        //     }
        //     if ($h_index < 23) {
        //         $percent = round((float) $jumlah_h_index_fakultas / $jumlah_h_index_semua, 3) * 100;
        //         echo '<td style="border: 1px solid black; padding: 4px; text-align:center;">' . $percent . '%</td>'; 
        //     } else {
        //         $percent = round((float) $jumlah_h_index_semua / $jumlah_h_index_semua, 3) * 100;
        //         echo '<td style="border: 1px solid black; padding: 4px; text-align:center;">' . $percent . '%</td>';            
        //     }
        //     echo '</tr>';
        // }
        // echo '</table>';
        
        // return;
        return view('admin.indekspenelitipkm.details', ['table' => $table]);

    }

    public function add()
    {
        return view('admin/indekspenelitipkm/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.indekspenelitipkm.index');
    }

    public function edit(Request $request, $id)
    {
        $indekspenelitipkm = IndeksPenelitiPKM::find($id);
        return view('admin/indekspenelitipkm/edit', compact('indekspenelitipkm'));
    }

    public function update(Request $request, $periode, $tahun_input, $sumber_data)
    {
        $indekspenelitipkm = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->get();
        // dd($indekspenelitipkm);
        foreach ($indekspenelitipkm as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->sumber_data = $request->sumber_data;
            $peneliti->save();
        }

        return redirect()->route('admin.indekspenelitipkm.index');
    }

    public function delete($periode, $tahun_input)
    {
        $indekspenelitipkm = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($indekspenelitipkm as $peneliti) {
            $peneliti->delete();
        }
        return redirect()->route('admin.indekspenelitipkm.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new IndeksPenelitiPKMsExport, 'indekspenelitipkm.xlsx');
    }

    public function import(Request $request)
    {
        $excel = new IndeksPenelitiPKMsImport;
        Excel::import($excel, $request->file('indekspenelitipkm'));

        for($col = 2; $col <= 14; $col++) {
            $table = $excel->getArray();
            $inserted_data = [
                'nama_table' => "UNTITLED TABLE",
                'periode' => $request->periode,
                'tahun_input' => $request->tahun,
                'sumber_data' => $request->sumber_data,
                'user_id' => Auth::user()->id,
                'fakultas' => $table[3][$col]
            ];
            $h_index = 0;
            for($row = 4; $row <= 50; $row += 2) {
                if ($row < 50) {
                    $inserted_data['jumlah' . $h_index] = $table[$row][$col];
                    $inserted_data['percent' . $h_index] = round((float) $table[$row + 1][$col], 3) * 100;
                } else {
                    $inserted_data['jumlahtotal'] = $table[$row][$col];
                    $inserted_data['percenttotal'] = round((float) $table[$row + 1][$col], 3) * 100;
                }
                $h_index++;
            }

            IndeksPenelitiPKM::insert($inserted_data);
        }

        return redirect()->route('admin.indekspenelitipkm.index');
    }

    public function updateRow(Request $request, $id)
    {
        $peneliti = IndeksPenelitiPKM::find($id);
        $fakultas = $peneliti->fakultas;
        $periode = $peneliti->periode;
        $tahun = $peneliti->tahun_input;

        $jml0       = $request->jumlah0;
        $percent0   = $request->percent0;
        
        $jml1       = $request->jumlah1;
        $percent1   = $request->percent1;
        
        $jml2 = $request->jumlah2;
        $percent2 = $request->percent2;
        
        $jml3 = $request->jumlah3;
        $percent3 = $request->percent3;
        
        $jml4 = $request->jumlah4;
        $percent4 = $request->percent4;
        
        $jml5 = $request->jumlah5;
        $percent5 = $request->percent5;
        
        $jml6 = $request->jumlah6;
        $percent6 = $request->percent6;
        
        $jml7 = $request->jumlah7;
        $percent7 = $request->percent7;
        
        $jml8 = $request->jumlah8;
        $percent8 = $request->percent8;
        
        $jml9 = $request->jumlah9;
        $percent9 = $request->percent9;
        
        $jml10 = $request->jumlah10;
        $percent10 = $request->percent10;
        
        $jml11 = $request->jumlah11;
        $percent11 = $request->percent11;

        $jml12 = $request->jumlah12;
        $percent12 = $request->percent12;
        
        $jml13 = $request->jumlah13;
        $percent13 = $request->percent13;
        
        $jml14 = $request->jumlah14;
        $percent14 = $request->percent14;
        
        $jml15 = $request->jumlah15;
        $percent15 = $request->percent15;
        
        $jml16 = $request->jumlah16;
        $percent16 = $request->percent16;
        
        $jml17 = $request->jumlah17;
        $percent17 = $request->percent17;
        
        $jml18 = $request->jumlah18;
        $percent18 = $request->percent18;
        
        $jml19 = $request->jumlah19;
        $percent19 = $request->percent19;
        
        $jml20 = $request->jumlah20;
        $percent20 = $request->percent20;
        
        $jml21 = $request->jumlah21;
        $percent21 = $request->percent21;
        
        $peneliti->jumlah0 = $jml0;
        $peneliti->percent0 = $percent0;
        $peneliti->jumlah1 = $jml1;
        $peneliti->percent1 = $percent1;
        $peneliti->jumlah2 = $jml2;
        $peneliti->percent2 = $percent2;
        $peneliti->jumlah3 = $jml3;
        $peneliti->percent3 = $percent3;
        $peneliti->jumlah4 = $jml4;
        $peneliti->percent4 = $percent4;
        $peneliti->jumlah5 = $jml5;
        $peneliti->percent5 = $percent5;
        $peneliti->jumlah6 = $jml6;
        $peneliti->percent6 = $percent6;
        $peneliti->jumlah7 = $jml7;
        $peneliti->percent7 = $percent7;
        $peneliti->jumlah8 = $jml8;
        $peneliti->percent8 = $percent8;

        $peneliti->jumlah9 = $jml9;
        $peneliti->percent0 = $percent9;
        $peneliti->jumlah10 = $jml10;
        $peneliti->percent10 = $percent10;
        $peneliti->jumlah11 = $jml11;
        $peneliti->percent11 = $percent11;
        $peneliti->jumlah12 = $jml12;
        $peneliti->percent12 = $percent12;
        $peneliti->jumlah13 = $jml13;
        $peneliti->percent13 = $percent13;
        $peneliti->jumlah14 = $jml14;
        $peneliti->percent14 = $percent14;
        $peneliti->jumlah15 = $jml15;
        $peneliti->percent15 = $percent15;
        $peneliti->jumlah16 = $jml16;
        $peneliti->percent16 = $percent16;
        $peneliti->jumlah17 = $jml17;
        $peneliti->percent17 = $percent17;
        $peneliti->jumlah18 = $jml18;
        $peneliti->percent18 = $percent18;

        $peneliti->jumlah19 = $jml19;
        $peneliti->percent19 = $percent19;
        $peneliti->jumlah20 = $jml20;
        $peneliti->percent20 = $percent20;
        $peneliti->jumlah21 = $jml21;
        $peneliti->percent21 = $percent21;
       

        
        $peneliti->jumlahtotal = $jml0 + $jml1 + $jml2 + $jml3 + $jml4 + $jml5 + $jml6 + $jml7 + $jml8 + $jml9 + $jml10 + $jml11 +
                                 $jml12 + $jml13 + $jml14 + $jml15 + $jml16 + $jml17 + $jml18 + $jml19 + $jml20 + $jml21;
        $peneliti->save();

        return redirect(route('admin.indekspenelitipkm.details', [$fakultas, $periode, $tahun]));
    }
}
