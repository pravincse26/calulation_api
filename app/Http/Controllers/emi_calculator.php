<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class emi_calculator extends Controller
{
    public function emi_calculation(Request $req){
        $car_loan_amount = $req['car_loan_amount'];
        $interest_rate = ($req['interest_rate']/12)/100;
        $loan_tenure = $req['loan_tenure'] * 12;
        $pow_var = pow((1+$interest_rate),$loan_tenure);
        $calc = $pow_var/(($pow_var)-1);
        $emi = $car_loan_amount*$interest_rate*$calc;// Formula => P * R *((1+R)^n/((1+R)^n)-1 )
        $sum_interest=0;
        $emi_table = [];
        $pp = $car_loan_amount;

        for($i=0;$i<$loan_tenure;$i++){
            $opening_bal = $pp;
            $roi = ($pp*$req['interest_rate']/100);
            $interest = ($pp*$req['interest_rate']/100)/12;//roi =p*r/100 = > roi/12
            $est_prin = ($emi)- ($interest);//principal = EMI- interest
            $ost_principal = ($opening_bal) - ($est_prin);//ost principal = opening bal - principal
            $pp = $ost_principal;

            $arr['opening_balance'] = round($opening_bal);
            $arr['emi'] = round($emi);
            $arr['principal'] = round($est_prin);
            $arr['interest'] = round($interest);
            $arr['ost_principal'] = round($ost_principal);

            array_push($emi_table,$arr);
            $sum_interest += round($interest);
        }
        // echo 'EMI Table';print_r($emi_table);
        $data['emi_amount'] =  round($emi);
        $data['emi_for_tenure'] = $emi_table;
        $data['emi_interest'] = $sum_interest;
        $data['total_amount'] = ($car_loan_amount)+($sum_interest);
        return response()->json(['data'=>$data]);
    }
}
