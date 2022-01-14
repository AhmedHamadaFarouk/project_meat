<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\CleaningDisinfectionRepositoryInterface;
use App\Models\Product;

class CleaningDisinfectionRepository implements  CleaningDisinfectionRepositoryInterface
{

//    protected $test = [
//        'modelName' => '\App\Models\Branch',
//        'folderImageName' => 'Branch',
//        'routes' => 'Branch',
//        'FolderBlade' => 'Branch',
//    ];

    protected $modelName = '\App\Models\CleaningDisinfection';
    protected $folderImageName = 'cleaningDisinfection';
    protected $routes = 'cleaningDisinfection';
    protected $FolderBlade = 'cleaningDisinfection';


    public function index()
    {
        $data= $this->modelName::all();
        $product = Product::all();
        return view('Admin/' . $this->FolderBlade . '/' . 'index', compact('data', 'product'));
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
       // try {
            $data = new $this->modelName;
            $data->date = $request->date;
            $data->product_id = $request->product_id;
            $data->Quantity = $request->Quantity;
            $data->codeProduct = $request->codeProduct;
            $data->batchNumber = $request->batchNumber;
            $data->dataProduction = $request->dataProduction;
//            $data->dataFinished = $request->dataFinished;
            $data->dataFinished = $request->dataFinished;
            $data->PH = $request->PH;
            $data->notes = $request->notes;
            $photo = request()->file('photo');
            if ($photo) {
                $data['photo'] =
                $fileName = time() . rand(0, 999999999) . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/' . $this->folderImageName, $fileName);;
            }
            $data->save();
            session()->flash('Add', 'تم الاضافه بنجاح');
            return redirect($this->routes);
       // } catch (\Exception $e) {
           // return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        //}
    }

    public function show($id)
    {

        try {
            $date = $this->modelName::findorfail($id);
            return view('Admin/' . $this->FolderBlade . '/' . 'show', compact('date'));
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
            $data->date = $request->date;
            $data->product_id = $request->product_id;
            $data->Quantity = $request->Quantity;
            $data->codeProduct = $request->codeProduct;
            $data->batchNumber = $request->batchNumber;
            $data->dataProduction = $request->dataProduction;
//            $data->dataFinished = $request->dataFinished;
            $data->dataFinished = $request->dataFinished;
            $data->PH = $request->PH;
            $data->notes = $request->notes;
            $photo = request()->file('photo');
            if ($photo) {
                unlink(base_path('public/storage/' . $this->folderImageName . '/' . $data->photo));
                $data['photo'] =
                $fileName = time() . rand(0, 999999999) . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/' .  $this->folderImageName, $fileName);
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
            unlink(base_path('public/storage/' . $this->folderImageName . '/' . $request->photo));
            session()->flash('danger', 'تم الحذف بنجاح');
            return redirect($this->routes);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}
