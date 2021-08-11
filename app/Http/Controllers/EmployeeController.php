<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $data['employees'] = Employee::all();
        return view('index')->with($data);
    }

    public function store(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'name'=>'required|unique:employees',
            'dop'=>'required',
            'address'=>'required',
            'amount'=>'required|gt:10000|lt:50000'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            $values=[
                'name'=>$request->name,
                'dop'=>$request->dop,
                'address'=>$request->address,
                'amount'=>$request->amount,
            ];

            $query = DB::table('employees')->insert($values);
            if( $query ){
                return response()->json(['status'=>1, 'msg'=>'New Customer has been successfully registered']);
            }
        }
    }

    public function destroy($id)
    {
    $employees = Employee::find($id);
    $employees->delete();
    $data['message'] = 'Deleted';
    return redirect()->back();

    }

    public function getEmployeebyId($id){


        $employees = Employee::find($id);

        return response()->json($employees);
    }

    public function updateEmployee(Request $request)
    {
        $employees = Employee::find($request->id);
        $employees->name = $request->name;
        $employees->dop = $request->dop;
        $employees->address = $request->address;
        $employees->amount = $request->amount;
        $employees->save();
        return response()->json($employees);
    }


}
