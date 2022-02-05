@extends('layouts.master')
@section('title')
    مسئول الجوده /  استلام  لحوم
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المخزن</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ استلام اللحوم</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('notify')
    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('meatReceipt.create')}}" class="btn btn-success">اضافه  مسئول الجوده لستلام  لحوم
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap text-center" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">تاريخ</th>
                                <th class="wd-20p border-bottom-0">تاريخ الدبح</th>
                                <th class="wd-20p border-bottom-0">تاريخ الانتهاء</th>
                                <th class="wd-25p border-bottom-0">رقم اذن التشغليه</th>
                                <th class="wd-25p border-bottom-0">المطابقه</th>
                                <th class="wd-25p border-bottom-0">العمليات</th>
                            </tr>
                            </thead>
                            <tbody> @foreach ($data as $row )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->date}}</td>
                                    <td>{{$row->start_date_slaughter}}</td>
                                    <td>{{$row->end_date_slaughter}}</td>
                                    <td>{{$row->operative_number}}</td>
                                    <td>{{$row->type == "identical" ? 'مطابق' : 'غير مطابق'}}</td>
                                    <td>


                                        <div class="dropdown">
                                            <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                               العمليات
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item " href="{{route('meatReceipt.edit',$row->id)}}"><i class="fas fa-edit text-success"></i> تعديل</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"  data-target="#deleted{{$row->id}}"><i class="fas fa-trash text-danger"></i> حذف </a>
                                                <a class="dropdown-item" href="{{route('meatReceipt.show',$row->id)}}"> <i class="fas fa-reply text-info"></i>  تقرير</a>
                                            </div>
                                        </div>
{{--                                        <a href="{{route('meatReceipt.edit',$row->id)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>--}}
{{--                                        <button class="btn btn-danger btn-sm" data-toggle="modal"--}}
{{--                                                data-target="#deleted{{$row->id}}"><i class="fas fa-trash"></i></button>--}}
                                    </td>

                                    @include('admin.meatReceipt.deleted')
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
