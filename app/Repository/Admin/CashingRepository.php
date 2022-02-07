<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\CashingRepositoryInterface;
use App\Models\ChaingPrice;
use Illuminate\Support\Facades\DB;

class CashingRepository implements  CashingRepositoryInterface
{


    protected $modelName = '\App\Models\Cashing';
    protected $folderImageName = 'Cashing';
    protected $routes = 'cashing';
    protected $FolderBlade = 'Cashing';


    public function index()
    {
        $data= $this->modelName::all();
        return view('Admin/' . $this->FolderBlade . '/' . 'index', compact('data'));
    }

    public function create()
    {

        try {
            return view('Admin/' . $this->FolderBlade . '/' . 'create');
        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function store($request,  $fileName = null)
    {

//        dd($request->all());

        try {


            DB::beginTransaction();
            $data = new $this->modelName;
            $data->date = date('Y-m-d');
            $data->start_date_slaughter = $request->start_date_slaughter;
            $data->end_date_slaughter = $request->end_date_slaughter;
            $data->permit_number = $request->permit_number;
            $data->name_slaughterhouse = $request->name_slaughterhouse;
            $data->operative_number = $request->operative_number;
            $data->meat_temp = $request->meat_temp;
            $data->type = $request->type;
            $data->meat_color = $request->meat_color;
            $data->meat_smell = $request->meat_smell;
            $data->notes = $request->notes;
            $data->meat_texture = $request->meat_texture;
            $data->save();

            for($i=0;$i<count($request->test);$i++){
                $input=['weight'=>$request->weight[$i],'type_test'=>$request->type_test[$i] , 'amount'=>$request->amount[$i],'testicle'=>$request->testicle[$i],'price'=>$request->price[$i]];
                $data = ChaingPrice::create($input);
            }
            session()->flash('Add', 'تم الاضافه بنجاح');
            DB:: commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {

        try {
            $date['date'] = $this->modelName::findorfail($id);

            return view('Admin/' . $this->FolderBlade . '/' . 'create', $date);
        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function edit($id)
    {
        try {
            $data = $this->modelName::findorfail($id);
            return view('Admin/' . $this->FolderBlade . '/' . 'edit', compact('data'));
        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function update($request, $fileName = null)
    {

        try {
            $data = $this->modelName::findorfail($request->id);
            $data->date = date('Y-m-d');
            $data->start_date_slaughter = $request->start_date_slaughter;
            $data->end_date_slaughter = $request->end_date_slaughter;
            $data->permit_number = $request->permit_number;
            $data->name_slaughterhouse = $request->name_slaughterhouse;
            $data->operative_number = $request->operative_number;
            $data->meat_temp = $request->meat_temp;
            $data->type = $request->type;
            $data->meat_color = $request->meat_color;
            $data->meat_smell = $request->meat_smell;
            $data->notes = $request->notes;
            $data->meat_texture = $request->meat_texture;
            $data->before_receiving = $request->before_receiving;
            $data->after_receiving = $request->after_receiving;
            $data->jolly = $request->jolly;
            for($i=0;$i<count($request->test);$i++){
                $data=['meat_toxin_id'=>$request->meat_toxin_id,'weight'=>$request->weight[$i],'type_test'=>$request->type_test[$i] , 'amount'=>$request->amount[$i],'testicle'=>$request->testicle[$i],'price'=>$request->price[$i]];
            }
            $data->save();
            session()->flash('Edit', 'تم التعديل بنجاح');
            return redirect($this->routes);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            $this->modelName::destroy($request->id);
            // unlink(base_path('public/storage/' . $this->folderImageName . '/' . $request->photo));
            session()->flash('danger', 'تم الحذف بنجاح');
            return redirect($this->routes);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

}
