<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\PackingMaterialsRepositoryInterface;
use App\Models\Product;

class PackingMaterialsRepository implements  PackingMaterialsRepositoryInterface
{
    protected $modelName = '\App\Models\PackingMaterials';
    protected $folderImageName = 'PackingMaterials';
    protected $routes = 'PackingMaterials';
    protected $FolderBlade = 'PackingMaterials';

    public function storeFile($image, $destination_path)
    {
        $fileName = time() . rand(0, 999999999) . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/' . $destination_path, $fileName);
        return $fileName;
    }


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
        try {

            $data = new $this->modelName;
            $data->date = date('Y-m-d');
            $data->product_id = $request->product_id;
            $data->Quantity = $request->Quantity;
            $data->number_invoices = $request->number_invoices;
            $data->codeProduct = $request->codeProduct;
            $data->batchNumber = $request->batchNumber;
            $data->dataProduction = $request->dataProduction;
            $data->dataFinished = $request->dataFinished;
            $data->type = $request->type;
            $file = request()->file('photo');
            if ($file) {
                $data['photo'] = $this->storeFile($file, $this->folderImageName);
            }
            $data->save();
            session()->flash('Add', 'تم الاضافه بنجاح');
            return redirect($this->routes);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
            $data->date = date('Y-m-d');
            $data->product_id = $request->product_id;
            $data->Quantity = $request->Quantity;
            $data->number_invoices = $request->number_invoices;
            $data->codeProduct = $request->codeProduct;
            $data->batchNumber = $request->batchNumber;
            $data->dataProduction = $request->dataProduction;
            $data->dataFinished = $request->dataFinished;
            $data->type = $request->type;
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
            // unlink(base_path('public/storage/' . $this->folderImageName . '/' . $request->photo));
            session()->flash('danger', 'تم الحذف بنجاح');
            return redirect($this->routes);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function material($id)
    {
        $row = $this->modelName::findorfail($id);
        return view('admin/' . $this->FolderBlade . '/' . 'Print_material', compact('row'));

    }
}
