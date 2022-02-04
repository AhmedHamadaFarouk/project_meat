<?php

namespace App\Repository\Admin;

use App\Models\Category;
use App\Models\MeatReceipt;

class MeatToxinRepository implements \App\Interfaces\Admin\MeatToxinRepositoryInterface
{
    protected $modelName = '\App\Models\MeatToxin';
    protected $folderImageName = 'MeatToxin';
    protected $routes = 'meatToxin';
    protected $FolderBlade = 'meatToxin';

    public function getCategory()
    {
        return Category::all();
    }

    public function storeFile($image, $destination_path)
    {
        $fileName = time() . rand(0, 999999999) . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/' . $destination_path, $fileName);
        return $fileName;
    }


    public function index()
    {
        $data = $this->modelName::all();
        $categorys = $this->getCategory();
        $MeatReceipt = MeatReceipt::all();
        return view('Admin/' . $this->FolderBlade . '/' . 'index', compact('data','categorys','MeatReceipt'));
    }

    public function create()
    {
        try {
            $data = $this->modelName::all();
            $categorys = $this->getCategory();
            $MeatReceipt = MeatReceipt::all();
            return view('Admin/' . $this->FolderBlade . '/' . 'create', compact('data','categorys','MeatReceipt'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function store($request, $fileName = null)
    {
        try {
            $data = new $this->modelName;
            $data->type_meat = implode(',',$request->type_meat) ;
            $data->receipt_code = $request->receipt_code;
            $data->meat_receipt_id = $request->meat_receipt_id;
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
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $row = $this->modelName::findorfail($id);
            $categorys = $this->getCategory();
            $MeatReceipt = MeatReceipt::all();
            return view('Admin/' . $this->FolderBlade . '/' . 'edit', compact('row','categorys','MeatReceipt'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request, $fileName = null)
    {

         try {
        $data = $this->modelName::findorfail($request->id);
        $data->date = date('Y-m-d');
        $data->start_date_slaughter = $request->start_date_slaughter ?? $data->start_date_slaughter;
        $data->end_date_slaughter = $request->end_date_slaughter ?? $data->end_date_slaughter;
        $data->permit_number = $request->permit_number ?? $data->permit_number;
        $data->name_slaughterhouse = $request->name_slaughterhouse ?? $data->name_slaughterhouse;
        $data->operative_number = $request->operative_number ?? $data->operative_number;
        $data->meat_temp = $request->meat_temp ?? $data->meat_temp;
        $data->type = $request->type ?? $data->type;
        $data->meat_color = $request->meat_color ?? $data->meat_color;
        $data->meat_smell = $request->meat_smell ?? $data->meat_smell;
        $data->notes = $request->notes ?? $data->notes;
        $data->meat_texture = $request->meat_texture ?? $data->meat_texture;
        $photo = request()->file('photo');
        if ($photo) {
            unlink(base_path('public/storage/' . $this->folderImageName . '/' . $data->photo));
            $data['photo'] =
            $fileName = time() . rand(0, 999999999) . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/' . $this->folderImageName, $fileName);
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

    public function packagePrice($id)
    {

    }
}
