@extends('layouts.master')
@section('title')
    تفاصيل
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المخازن</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تفاصيل</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label>انواع اللحوم</label>
                    <select class="form-control" name="type_meat[]" readonly multiple>
                        @foreach($categorys as $category)
                            <option value="{{$category->category_name}}" {{in_array($category->category_name,explode(",",$data->type_meat)) ? 'selected' : ''}}>{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label>كود الاستلام</label>
                    <input type="text" readonly value="{{$data->receipt_code}}" class="form-control">
                </div>
            </div>

            <br>
            <p class="text-center h5">تقرير استلام اللحوم</p>
            @foreach($reportTwo as $reportsss)
                <div class="row">

                    <div class="col">
                        <label>تاريخ</label>
                        <input type="text" readonly value="{{$reportsss->date}}" class="form-control">
                    </div>

                    <div class="col">
                        <label>الاسم المستخدم</label>
                        <input type="text" readonly value="{{$reportsss->user->name}}" class="form-control">
                    </div>

                    <div class="col">
                        <label>العمليه التي تمت</label>
                        <input type="text" readonly value="{{$reportsss->type}}" class="form-control">
                    </div>
                </div>
            @endforeach


            <br>
            <p class="text-center h5">تقرير العمليات</p>
            @foreach($report as $reports)
                <div class="row">

                    <div class="col">
                        <label>تاريخ</label>
                        <input type="text" readonly value="{{$reports->date}}" class="form-control">
                    </div>

                    <div class="col">
                        <label>الاسم المستخدم</label>
                        <input type="text" readonly value="{{$reports->user->name}}" class="form-control">
                    </div>

                    <div class="col">
                        <label>العمليه التي تمت</label>
                        <input type="text" readonly value="{{$reports->type}}" class="form-control">
                    </div>
                </div>
            @endforeach

            <br>
{{--            <div class="row">--}}
                @foreach($data->Deletlies as $row)
                    <div class="row">
                        <div class="col">
                            <br>
                            <input type="text" readonly value="{{$row->type}}" class="form-control">
                        </div>
                        <br>   <br>
                        <div class="col">
                            <label>وزن</label>
                            <input type="number" class="form-control " readonly value="{{$row->weight}}">
                        </div>
                        <br>   <br>
                        <div class="col">
                            <label>الكميه</label>
                            <input type="number" class="form-control " readonly value="{{$row->amount}}">
                        </div>
                        <br>   <br>
                        <div class="col">
                            <label>خسيه</label>
                            <input type="number" class="form-control " readonly value="{{$row->testicle}}">
                        </div>
                        <br>   <br>
                        <div class="col">
                            <label>سعر</label>
                            <input type="number" class="form-control " readonly value="{{$row->price}}">
                        </div>
                    </div>
                @endforeach


{{--            </div>--}}
        </div>
    </div>
    <div class="row">

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
