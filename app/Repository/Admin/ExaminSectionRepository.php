<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\ExaminSectionRepositoryInterface;
use App\Models\ExaminationMeat;
use App\Models\ExaminationReceipt;
use App\Models\Section;
use Illuminate\Support\Facades\DB;

class ExaminSectionRepository implements ExaminSectionRepositoryInterface
{

    protected $modelName = '\App\Models\ExaminSection';
    protected $folderImageName = 'ExaminSection';
    protected $routes = 'examin_section';
    protected $FolderBlade = 'ExaminSection';


    public function index()
    {
        $data = $this->modelName::all();
        $examin_meat = ExaminationMeat::all();
        $section = Section::all();

        return view('Admin/' . $this->FolderBlade . '/' . 'index', compact('data', 'examin_meat', 'section'));
    }

    public function create()
    {
        try {
            $data = $this->modelName::all();
            $examin_meat = ExaminationMeat::all();
            $section = Section::all();
            return view('Admin/' . $this->FolderBlade . '/' . 'create',compact('data', 'examin_meat', 'section'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function store($request,  $fileName = null)
    {
        try {
            $data = new $this->modelName;
            $data->date = date('Y-m-d');
            $data->examin_id = $request->examin_id;
            $data->section_id = $request->section_id;
            $data->categories=$request->categories;
            $data->recipt_code = $request->recipt_code;
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

    public function getcategories($id)
    {
        $categories = DB::table("categories")->where("section_id", $id)->pluck("category_name", "id");
        return json_encode($categories);
    }
}
