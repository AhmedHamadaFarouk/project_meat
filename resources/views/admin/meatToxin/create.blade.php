@extends('layouts.master')
@section('title')
    امين المخزن /  استلام  لحوم
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المخزن</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ امين المخزن /  استلام  لحوم</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="card">
        <div class="card-body">
            <form action="{{route('meatToxin.store')}}" method="post"  autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <label>انواع اللحوم</label>
                        <select class="form-control" name="type_meat[]" required multiple>
                            <option value="" disabled selected> اختر من القائمه </option>
                            @foreach($categorys as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>كود الاستلام</label>
                        <input type="text" name="receipt_code" required class="form-control">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>تاريخ الدبح</label>
                        <select name="meat_receipt_id" id="" class="form-control">
                            <option value="" disabled selected>اختر من القائمه</option>
                            @foreach($MeatReceipt as $xx)
                                <option value="{{$xx->id}}">{{$xx->start_date_slaughter}}</option>
                            @endforeach
                        </select>
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



            </form>
        </div>
    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
