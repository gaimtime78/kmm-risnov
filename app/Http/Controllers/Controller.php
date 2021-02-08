<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function status($respon,$messageSucces ='Data berhasil diproses',$messageError = 'Data gagal diproses')
    {
        if($respon){
            $status =array(
            'class' => 'alert-success',
            'message' => $messageSucces,
            'cek' => true,
            ) ;
        }   
        else{
            $status =array(
            'class' => 'alert-danger',
            'message' =>$messageError,
            'cek' => false,
            ) ;
        }
        return $status;
    }
}
