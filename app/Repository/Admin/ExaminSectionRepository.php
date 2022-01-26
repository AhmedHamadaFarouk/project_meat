<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\ExaminSectionRepositoryInterface;
use App\Models\ExaminationReceipt;
use App\Models\Section;

class ExaminSectionRepository implements ExaminSectionRepositoryInterface
{

    protected $modelName = '\App\Models\ExaminSection';
    protected $folderImageName = 'ExaminSection';
    protected $routes = 'examin_section';
    protected $FolderBlade = 'ExaminSection';


    public function index()
    {
        $data= $this->modelName::all();
$examin_recipt = ExaminationReceipt::all();
$section = Section::all();

        return view('Admin/' . $this->FolderBlade . '/' . 'index', compact('data', 'examin_recipt','section'));
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
            $data->examin_id = $request->examin_id;
            $data->section_id = $request->section_id;
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
}
