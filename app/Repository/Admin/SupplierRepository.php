<?php

namespace App\Repository\Admin;

use App\Models\Supplier;

class SupplierRepository implements \App\Interfaces\Admin\SupplierRepositoryInterface
{



    //    protected $test = [
    //        'modelName' => '\App\Models\Branch',
    //        'folderImageName' => 'Branch',
    //        'routes' => 'Branch',
    //        'FolderBlade' => 'Branch',
    //    ];

    protected $modelName = '\App\Models\Supplier';
    protected $folderImageName = 'Supplier';
    protected $routes = 'supplier';
    protected $FolderBlade = 'Supplier';


    public function index()
    {
        $data = $this->modelName::all();

        return view('Admin/' . $this->FolderBlade . '/' . 'index', compact('data'));
    }

    public function create()
    {
        try {
            return view('Admin/' . $this->FolderBlade . '/' . 'create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function store($request,  $fileName = null)
    {
        // dd($request->all());
        try {
        $data = new Supplier();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $photo = request()->file('photo');
        if ($photo) {
            $data['photo'] =
                $fileName = time() . rand(0, 999999999) . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/' . $this->folderImageName, $fileName);;
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
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $data = $this->modelName::findorfail($id);
            return view('Admin/' . $this->FolderBlade . '/' . 'edit', compact('data'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request, $fileName = null)
    {

        try {
            $data = $this->modelName::findorfail($request->id);
            $data->name = $request->name;
            $data->phone = $request->phone;
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
