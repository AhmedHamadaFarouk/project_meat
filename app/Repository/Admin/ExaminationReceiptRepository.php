<?php

namespace App\Repository\Admin;

use App\Http\Controllers\Admin\ExaminationReceipt;
use App\Interfaces\Admin\ExaminationReceiptRepositoryInterface;
use App\Models\Attachment;
use App\Models\ExaminationReceipt as ModelsExaminationReceipt;
use App\Models\Product;
use App\Models\Store;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class ExaminationReceiptRepository implements ExaminationReceiptRepositoryInterface
{

    protected $modelName = '\App\Models\ExaminationReceipt';
    protected $folderImageName = 'ExaminationReceipt';
    protected $routes = 'examination_receipt';
    protected $FolderBlade = 'ExaminationReceipt';


    public function storeFile($image, $destination_path)
    {
        $fileName = time() . rand(0, 999999999) . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/' . $destination_path, $fileName);
        return $fileName;
    }



    public function index()
    {
        $data = $this->modelName::all();
        $product = Product::all();
        $store = Store::all();
        $supplier = Supplier::all();

        return view('Admin/' . $this->FolderBlade . '/' . 'index', compact('data', 'product', 'store', 'supplier'));
    }

    public function create()
    {
        try {
            $data = $this->modelName::all();
            $product = Product::all();
            $store = Store::all();
            $supplier = Supplier::all();
            return view('Admin/' . $this->FolderBlade . '/' . 'create', compact('data', 'product', 'store', 'supplier'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function store($request,  $fileName = null)
    {
        // try {
        $data = new $this->modelName;
        $data->date = date('Y-m-d');
        $data->slaughter_date = $request->slaughter_date;
        $data->number_ear = $request->number_ear;
        $data->meat_temp = $request->meat_temp;
        $data->meat_color = $request->meat_color;
        $data->meat_smell = $request->meat_color;
        $data->meat_texture = $request->meat_color;
        $data->quantity = $request->quantity;
        $data->store_id = $request->store_id;
        $data->supplier_id = $request->supplier_id;
        $data->product_id = $request->product_id;
        $data->notes = $request->notes;
        $file = request()->file('photo');
        if ($file) {
            $data['photo'] = $this->storeFile($file, $this->folderImageName);
        }
        $data->save();
        session()->flash('Add', 'تم الاضافه بنجاح');
        return redirect($this->routes);
        // } catch (\Exception $e) {
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }
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
            $product = Product::all();
            $store = Store::all();
            $supplier = Supplier::all();
            return view('Admin/' . $this->FolderBlade . '/' . 'edit', compact('row', 'product', 'store', 'supplier'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request, $fileName = null)
    {

        // try {
        $data = $this->modelName::findorfail($request->id);
        $data->date = date('Y-m-d');
        $data->slaughter_date = $request->slaughter_date;
        $data->number_ear = $request->number_ear;
        $data->meat_temp = $request->meat_temp;
        $data->meat_color = $request->meat_color;
        $data->meat_smell = $request->meat_color;
        $data->meat_texture = $request->meat_color;
        $data->quantity = $request->quantity;
        $data->store_id = $request->store_id;
        $data->supplier_id = $request->supplier_id;
        $data->product_id = $request->product_id;
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
        // } catch (\Exception $e) {
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }
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


    public function print($id)
    {
        $row = $this->modelName::findorfail($id);
        return view('admin/' . $this->FolderBlade . '/' . 'Print_ExaminationReceipt', compact('row'));
    }

    public function details($id)
    {
        $row = $this->modelName::findorfail($id);
        return view('Admin/' . $this->FolderBlade . '/' . 'details', compact('row'));
    }
}
