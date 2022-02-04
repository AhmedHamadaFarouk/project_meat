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
            <form action="{{route('meatToxin.update','test')}}" method="post"  autocomplete="off" enctype="multipart/form-data">
               @method('PUT')
                @csrf

                <input type="hidden" name="id" value="{{$row->id}}">

                <div class="row">
                    <div class="col">
                        <label>انواع اللحوم</label>
                        <select class="form-control" name="type_meat[]" multiple>
                            @foreach($categorys as $category)
                                <option value="{{$category->category_name}}" {{in_array($category->category_name,explode(",",$row->type_meat)) ? 'selected' : ''}}>{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>كود الاستلام</label>
                        <input type="text" name="receipt_code" value="{{$row->receipt_code}}" class="form-control">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>تاريخ الدبح</label>
                        <select name="meat_receipt_id" id="" class="form-control">
                            @foreach($MeatReceipt as $xx)
                                <option value="{{$xx->id}}" {{$xx->id == $row->meat_receipt_id ? 'selected' :''}}>{{$xx->start_date_slaughter}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br>

                <p class="text-danger">* صيغة المرفق .pdf, .jpeg , .jpg , .png , .xlsx, .doc </p>
                <h5 class="card-title">المرفقات</h5>
                <div class="card">
                    <div class="card-header">
                        <div class="card-header">
                            @if($row->image)
                                <a href="{{ $row->image }}">
                                    <img src="{{ $row->image  }}" width="100" height="100" alt="{{ $row->name }}" class="list-thumbnail border-0">
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
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
