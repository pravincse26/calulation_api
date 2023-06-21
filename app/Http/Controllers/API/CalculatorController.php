<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CalcValidation;
use App\Calculator;
class CalculatorController extends Controller
{
    private $calcService;

    public function __construct(Calculator $calcService)
    {
        $this->calcService = $calcService;
    }
    public function add(CalcValidation $request)
    {
        $res['result']=$this->calcService->calc('add',$request->query('a'),$request->query('b'));
        return response()->json($res, 200);
    }
    public function sub(CalcValidation $request)
    {
        $res['result']=$this->calcService->calc('sub',$request->query('a'),$request->query('b'));
        return response()->json($res, 200);
    }
    public function mul(CalcValidation $request)
    {
        $res['result']=$this->calcService->calc('mul ',$request->query('a'),$request->query('b'));
        return response()->json($res, 200);
    }
    public function div(CalcValidation $request)
    {
        $res['result']=$this->calcService->calc('div',$request->query('a'),$request->query('b'));
        return response()->json($res, 200);
    }

}
