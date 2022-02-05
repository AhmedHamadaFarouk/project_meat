<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\meatReceiptRepositoryInterface;
use App\Models\Report;

class meatReceiptRepository implements meatReceiptRepositoryInterface
{

    protected $modelName = '\App\Models\MeatReceipt';
    protected $folderImageName = 'MeatReceipt';
    protected $routes = 'meatReceipt';
    protected $FolderBlade = 'meatReceipt';


    public function storeFile($image, $destination_path)
    {
        $fileName = time() . rand(0, 999999999) . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/' . $destination_path, $fileName);
        return $fileName;
    }


    public function index()
    {
        $data = $this->modelName::all();
        return view('Admin/' . $this->FolderBlade . '/' . 'index', compact('data'));
    }

    public function create()
    {
        try {
            $data = $this->modelName::all();
            return view('Admin/' . $this->FolderBlade . '/' . 'create', compact('data'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function store($request, $fileName = null)
    {
        try {
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
            $data->before_receiving = $request->before_receiving;
            $data->after_receiving = $request->after_receiving;
            $data->jolly = $request->jolly;
            $file = request()->file('photo');
            if ($file) {
                $data['photo'] = $this->storeFile($file, $this->folderImageName);
            }
            $data->save();


            $report = new Report();
            $report->date = date('y-m-d');
            $report->reportable_type = $this->modelName;
            $report->reportable_id = $data->id;
            $report->save();
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
            return view('Admin/' . $this->FolderBlade . '/' . 'edit', compact('row'));
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
            $data->before_receiving = $request->before_receiving ?? $data->before_receiving;
            $data->after_receiving = $request->after_receiving ?? $data->after_receiving;
            $data->jolly = $request->jolly ?? $data->jolly;
            $photo = request()->file('photo');
            if ($photo) {
                unlink(base_path('public/storage/' . $this->folderImageName . '/' . $data->photo));
                $data['photo'] =
                $fileName = time() . rand(0, 999999999) . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/' . $this->folderImageName, $fileName);
            }
            $data->save();
            $report = new Report();
            $report->date = date('y-m-d');
            $report->reportable_type = $this->modelName;
            $report->reportable_id = $data->id;
            $report->save();
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
