@extends('layouts.master')
@section('title')
    اضافه استلام لحوم
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المخازن</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/   اضافه استلام لحوم</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('notify')
    <!-- row -->

    <form action="{{route('cashings.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf



        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col">
                        <label>التاريخ</label>
                        <input type="text" value="{{date('Y-m-d')}}"  readonly class="form-control">
                    </div>

                    <div class="col">
                        <label>تاريخ الدبح</label>
                        <input type="date" name="start_date_slaughter" required class="form-control" value="{{old('start_date_slaughter')}}">
                    </div>

                    <div class="col">
                        <label>تاريخ انتهاء الدبح</label>
                        <input type="date" name="end_date_slaughter" required class="form-control" value="{{old('end_date_slaughter')}}">
                    </div>

                    <div class="col">
                        <label>رقم اذن الدبح</label>
                        <input type="number" name="permit_number"  required value="{{old('permit_number')}}" class="form-control">
                    </div>

                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>اسم المجزر</label>
                        <input type="text" name="name_slaughterhouse" required value="{{old('name_slaughterhouse')}}" class="form-control">
                    </div>

                    <div class="col">
                        <label>رقم التشغليه</label>
                        <input type="number" name="operative_number" required value="{{old('operative_number')}}" class="form-control">
                    </div>

                    <div class="col">
                        <label>درجه الحراره</label>
                        <input type="number" name="meat_temp" required value="{{old('meat_temp')}}" class="form-control">
                    </div>
                </div>

                <br>


                <div class="row">
                    <div class="col">
                        <label>المطابقه</label>
                        <select name="type" id="" class="form-control" required>
                            <option value="" disabled selected>اختر من القائمه</option>
                            <option value="identical">مطابق</option>
                            <option value="Not_matching">غير مطابق</option>
                        </select>
                    </div>



                    <div class="col">
                        <label>لون اللحمه</label>
                        <select name="meat_color" id="" class="form-control" required>
                            <option value="" disabled selected>اختر من القائمه</option>
                            <option value="acceptable">مطابق</option>
                            <option value="Unacceptable">غير مطابق</option>
                        </select>
                    </div>


                    <div class="col">
                        <label>رائحه اللحمه</label>
                        <select name="meat_smell" id="" class="form-control" required>
                            <option value="" disabled selected>اختر من القائمه</option>
                            <option value="acceptable">مطابق</option>
                            <option value="Unacceptable">غير مطابق</option>
                        </select>
                    </div>

                    <div class="col">
                        <label>ملمس اللحمه</label>
                        <select name="meat_texture" id="" class="form-control" required>
                            <option value="" disabled selected>اختر من القائمه</option>
                            <option value="acceptable">مطابق</option>
                            <option value="Unacceptable">غير مطابق</option>
                        </select>
                    </div>

                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>ملاحظات</label>
                        <textarea class="form-control softeditor" name="notes" rows="5"></textarea>
                    </div>
                </div>

                <br>


                <p class="text-danger">* صيغة المرفق .pdf, .jpeg , .jpg , .png , .xlsx, .doc </p>
                <h5 class="card-title">المرفقات</h5>
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


    <script>

        $(function () {
            $("#id-1, #id-2").keyup(function () {
                $("#id-3").val(+$("#id-1").val() - +$("#id-2").val());
            });
        });


    </script>
@endsection
