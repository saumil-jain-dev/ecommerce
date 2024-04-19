<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use Yajra\DataTables\DataTables;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->ajax()){
            $data = Discount::latest()->orderBy('id','desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function($row){
                    if($row->status == '1'){
                        $status = '<span class="badge badge-success">Active</span>';
                    }else{
                        $status = '<span class="badge badge-danger">Inactive</span>';
                    }
                    return $status;
                })
                ->editColumn('discount_type',function($row){
                    $text = "";
                    switch ($row->discount_type) {
                        case 'x_at_percentage_off':
                            $text = "X Percentage Off";
                            break;
                        case 'amount_off':
                            $text = "Ammount Off";
                            break;
                        default:
                            $text = "-";
                            break;
                    }
                    return $text;
                })
                ->editColumn('code',function($row){
                    return strtoupper($row->code);
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="discount/'.$row->id.'/edit" class="btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete-discount btn btn-danger btn-sm" data-id="'.$row->id.'">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        return view('admin.discount.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required|max:50',
            'code'=>'required|max:20',
            'discount_type' => 'required',
            'discount' => ['required',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->discount_type === 'x_at_percentage_off') {
                        if ($value < 1 || $value > 99) {
                            $fail('The '.$attribute.' must be between 1 and 99.');
                        }
                    }
                },
            ],
            'discount_start_date' => 'required',
            'discount_end_date' => 'required|after:discount_start_date',
            'status'=>'required'
        ]);

        $discount = new Discount();
        $discount->name = $request->input('name');
        $discount->code = strtolower($request->input('code'));
        $discount->discount_type = $request->input('discount_type');
        $discount->discount = $request->input('discount');
        $discount->discount_start_date = date('Y-m-d H:i:s',strtotime($request->input('discount_start_date')));
        $discount->discount_end_date = date('Y-m-d H:i:s',strtotime($request->input('discount_end_date')));
        $discount->status = $request->input('status');
        $result = $discount->save();
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $discount = Discount::where(['id'=>$id])->first();
        if(!$discount){
            return view('admin.discount.index');
        }
        $discount->discount_start_date = date('d-m-Y',strtotime($discount->discount_start_date));
        return view('admin.discount.edit',['discount'=>$discount]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name'=>'required|max:50',
            'code'=>'required|max:20',
            'discount_type' => 'required',
            'discount' => ['required',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->discount_type === 'x_at_percentage_off') {
                        if ($value < 1 || $value > 99) {
                            $fail('The '.$attribute.' must be between 1 and 99.');
                        }
                    }
                },
            ],
            'discount_start_date' => 'required',
            'discount_end_date' => 'required|after:discount_start_date',
            'status'=>'required'
        ]);

        $discount = Discount::where('id',$request->discount_id)->first();
        $discount->name = $request->input('name');
        $discount->code = strtolower($request->input('code'));
        $discount->discount_type = $request->input('discount_type');
        $discount->discount = $request->input('discount');
        $discount->discount_start_date = date('Y-m-d H:i:s',strtotime($request->input('discount_start_date')));
        $discount->discount_end_date = date('Y-m-d H:i:s',strtotime($request->input('discount_end_date')));
        $discount->status = $request->input('status');
        $result = $discount->save();
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            $destroy = Discount::where(['id'=>$id])->delete();
            return $destroy;    
        }catch(Exception $e){
            return "Something went wrong";
        }
        
    }

    public function discount_code_checker(Request $request){
        $count = 0;
        $type = $request->type;
        $val = $request->val;
        $discount_id = $request->id ?? 0;

        if ($type == "code") {
            $count = Discount::where($type, $val)->where('id', '!=', $discount_id)->count();
        }

        return $count ? "false" : "true";
    }
}
