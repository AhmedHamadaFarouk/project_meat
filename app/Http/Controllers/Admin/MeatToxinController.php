<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DeletliesMeat;
use App\Models\MeatToxin;
use App\Models\Report;
use App\Repository\Admin\MeatToxinRepository;
use Illuminate\Http\Request;

class MeatToxinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $data;

    public function __construct(MeatToxinRepository $data)
    {
        $this->data = $data;
    }

    public function index()
    {
        return $this->data->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return $this->data->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         return $this->data->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return $this->data->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->data->edit($id);
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
        return $this->data->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       return $this->data->destroy($request);
    }

    public function storepackagesprice(Request $request)
    {
        try {
            for($i=0;$i<count($request->test);$i++){
                $input=['meat_toxin_id'=>$request->meat_toxin_id,'weight'=>$request->weight[$i],'type'=>$request->type[$i] , 'amount'=>$request->amount[$i],'testicle'=>$request->testicle[$i],'price'=>$request->price[$i]];
                $data = DeletliesMeat::create($input);
            }

            $report = new Report();
            $report->date = date('y-m-d');
            $report->reportable_type = "App\Models\DeletliesMeat";
            $report->reportable_id = $data->id;
            $report->type ="اضافه اسعار اللحوم";
            $report->user_id = \Auth::user()->id;
            $report->save();

            if ($data) {
                session()->flash('Add', 'تم الاضافه بنجاح');
                return redirect('meatToxin');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('app.some_thing_error'));
        }
    }


    public function meatToxinDeletelies($id)
    {
        $deletelies = DeletliesMeat::where('meat_toxin_id',$id)->latest('id')->first();
        $data = MeatToxin::findorfail($id);
        $report = Report::where('reportable_type','\App\Models\MeatToxin')->where('reportable_id',$id)->get();
        $reportTwo = Report::where('reportable_type','App\Models\DeletliesMeat')->where('reportable_id',$deletelies->id)->get();
        $categorys = Category::all();
        return view('admin.meatToxin.detlies',compact('data','categorys','report','reportTwo'));
    }
}
