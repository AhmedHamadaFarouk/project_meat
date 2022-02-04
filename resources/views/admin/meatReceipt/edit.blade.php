@extends('layouts.master')
@section('title')
    تعديل     مسئول الجوده /  استلام  لحوم
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المخازن</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/   تعديل     مسئول الجوده /  استلام  لحوم</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    <form action="{{route('meatReceipt.update','test')}}" method="post" autocomplete="off" enctype="multipart/form-data">
       @method('PUT')
        @csrf

        <input type="hidden" name="id" value="{{$row->id}}">

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col">
                        <label>التاريخ</label>
                        <input type="text" value="{{date('Y-m-d')}}"  readonly class="form-control">
                    </div>

                    <div class="col">
                        <label>تاريخ الدبح</label>
                        <input type="date" name="start_date_slaughter"  class="form-control" value="{{$row->start_date_slaughter}}">
                    </div>

                    <div class="col">
                        <label>تاريخ انتهاء الدبح</label>
                        <input type="date" name="end_date_slaughter" class="form-control" value="{{$row->end_date_slaughter}}">
                    </div>

                    <div class="col">
                        <label>رقم اذن الدبح</label>
                        <input type="number" name="permit_number"   value="{{$row->permit_number}}" class="form-control">
                    </div>

                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>اسم المجزر</label>
                        <input type="text" name="name_slaughterhouse"  value="{{$row->name_slaughterhouse}}" class="form-control">
                    </div>

                    <div class="col">
                        <label>رقم التشغليه</label>
                        <input type="number" name="operative_number"  value="{{$row->operative_number}}" class="form-control">
                    </div>

                    <div class="col">
                        <label>درجه الحراره</label>
                        <input type="number" name="meat_temp"  value="{{$row->meat_temp}}" class="form-control">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>الوزن قبل الاستلام</label>
                        <input type="number" name="before_receiving" id="id-1"  value="{{$row->before_receiving}}"
                            class="form-control">
                    </div>
                    <div class="col">
                        <label>الوزن بعد الاستلام</label>
                        <input type="number" name="after_receiving" id="id-2"  value="{{$row->after_receiving}}"
                            class="form-control">
                    </div>
                    <div class="col">
                        <label>الخسيه</label>
                        <input type="number" name="jolly" id="id-3" readonly value="{{$row->jolly}}" class="form-control">
                        @error('jolly') <div class="alert alert-danger">{{$message}}</div> @enderror
                    </div>
                </div>
                <br>


                <div class="row">
                    <div class="col">
                        <label>المطابقه</label>
                        <select name="type" id="" class="form-control">
                            <option value="" disabled selected>اختر من القائمه</option>
                            <option value="identical" {{$row->type == "identical" ? 'selected' :''}}>مطابق</option>
                            <option value="Not_matching" {{$row->type == "Not_matching" ? 'selected' :''}}>غير مطابق</option>
                        </select>
                    </div>



                    <div class="col">
                        <label>لون اللحمه</label>
                        <select name="meat_color" id="" class="form-control">
                            <option value="" disabled selected>اختر من القائمه</option>
                            <option value="acceptable"  {{$row->meat_color == "acceptable" ? 'selected' :''}}>مطابق</option>
                            <option value="Unacceptable" {{$row->meat_color == "Unacceptable" ? 'selected' :''}}>غير مطابق</option>
                        </select>
                    </div>


                    <div class="col">
                        <label>رائحه اللحمه</label>
                        <select name="meat_smell" id="" class="form-control">
                            <option value="" disabled selected>اختر من القائمه</option>
                            <option value="acceptable" {{$row->meat_smell == "acceptable" ? 'selected' :''}}>مطابق</option>
                            <option value="Unacceptable" {{$row->meat_smell == "Unacceptable" ? 'selected' :''}}>غير مطابق</option>
                        </select>
                    </div>

                    <div class="col">
                        <label>ملمس اللحمه</label>
                        <select name="meat_texture" id="" class="form-control">
                            <option value="" disabled selected>اختر من القائمه</option>
                            <option value="acceptable"  {{$row->meat_texture == "acceptable" ? 'selected' :''}}>مطابق</option>
                            <option value="Unacceptable" {{$row->meat_texture == "Unacceptable" ? 'selected' :''}}>غير مطابق</option>
                        </select>
                    </div>

                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>ملاحظات</label>
                        <textarea class="form-control softeditor" name="notes" rows="5">{{$row->notes}}</textarea>
                    </div>
                </div>

                <br>


                <p class="text-danger">* صيغة المرفق .pdf, .jpeg , .jpg , .png , .xlsx, .doc </p>
                <h5 class="card-title">المرفقات</h5>
                <div class="card">
                    <div class="card-header">
                        @if($row->image)
                            <a href="{{ $row->image }}">
                                <img src="{{ $row->image  }}" width="100" height="100" alt="{{ $row->name }}" class="list-thumbnail border-0">
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <input type="file" name="photo" class="dropify" accept=".pdf,.jpg, .png, image/jpeg,image/png, .xls,.xlsx,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" data-height="70" />
                </div>

                <br>


                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary">حفظ البيانات</button>
                </div>

            </div>
        </div>

    </form>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.editorConfig = function(config) {
            config.extraPlugins = 'imageuploader';
        };
        CKEDITOR.replaceClass = 'softeditor';
    </script>
@endsection
