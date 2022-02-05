@extends('layouts.master')
@section('title')
    تقرير
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> استلام اللحوم</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تقرير</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <label>تاريح الذبح</label>
                    <h5>{{$date->start_date_slaughter}}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label>تم اضافه المنتج يوم</label>
                            <input type="text" readonly value="{{$date->date}}" class="form-control">
                        </div>
                        <div class="col">
                            <label>تاريخ الانتهاء</label>
                            <input type="text" readonly value="{{$date->end_date_slaughter}}" class="form-control">
                        </div>
                        <div class="col">
                            <label>اسم المجزر</label>
                            <input type="text" readonly value="{{$date->name_slaughterhouse}}" class="form-control">
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>رقم اذن الدبح</label>
                            <input type="text" readonly value="{{$date->permit_number}}" class="form-control">
                        </div>
                        <div class="col">
                            <label>الوزن قبل الاستلام</label>
                            <input type="text" readonly value="{{$date->before_receiving}}" class="form-control">
                        </div>
                        <div class="col">
                            <label>الوزن بعد الاستلام</label>
                            <input type="text" readonly value="{{$date->after_receiving}}" class="form-control">
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>الخسيه</label>
                            <input type="text" readonly value="{{$date->jolly}}" class="form-control">
                        </div>

                        <div class="col">
                            <label>رقم التشغليه</label>
                            <input type="text" readonly value="{{$date->operative_number}}" class="form-control">
                        </div>
                        <div class="col">
                            <label>درجه الحراره</label>
                            <input type="text" readonly value="{{$date->meat_temp}}" class="form-control">
                        </div>

                        <div class="col">
                            <label>المطابقه</label>
                            <input type="text" readonly value="{{$date->type == "identical" ? 'مطابق' : ''}}"
                                   class="form-control">
                        </div>
                    </div>
                    <br>

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
                </div>
            </div>
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
