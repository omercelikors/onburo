<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    public function agency()
    {
        return $this->belongsTo('App\Agency');
    }

    public function installment_date_format($reference)
    {
        if($reference==1){
            if($this->installment1_date==null){
                $formatted_date=$this->installment1_date;
            } else{
            $formatted_date = date('d.m.Y' , strtotime($this->installment1_date));
        }
        }else if($reference==2){
            if($this->installment2_date==null){
                $formatted_date=$this->installment2_date;
            } else{
            $formatted_date = date('d.m.Y' , strtotime($this->installment2_date));
            }
        }else if($reference==3){
            if($this->installment3_date==null){
                $formatted_date=$this->installment3_date;
            } else{
            $formatted_date = date('d.m.Y' , strtotime($this->installment3_date));
            }
        }else if($reference==4){
            if($this->installment4_date==null){
                $formatted_date=$this->installment4_date;
            } else{
            $formatted_date = date('d.m.Y' , strtotime($this->installment4_date));
            }
        }else if($reference==5){
            if($this->installment5_date==null){
                $formatted_date=$this->installment5_date;
            } else{
            $formatted_date = date('d.m.Y' , strtotime($this->installment5_date));
            }
        }else if ($reference==6) {
            if($this->installment6_date==null){
                $formatted_date=$this->installment6_date;
            } else{
            $formatted_date = date('d.m.Y' , strtotime($this->installment6_date));
            }
        }
        return $formatted_date;
    }
}
