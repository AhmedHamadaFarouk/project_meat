@extends('layouts.master')
@section('title')
الحلال توب فود - اضافه عميل
@endsection
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
    اضافه عميل</span>
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
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success" data-toggle="modal" data-target="#create">اضافه عميل</button>
                    </div>
                    @include('admin.Client.create')
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">اسم اعميل</th>
                                <th class="wd-20p border-bottom-0">العنوان</th>
                                <th class="wd-20p border-bottom-0">الحد الاقصى للسعر</th>
                                <th class="wd-25p border-bottom-0">الرقم الهاتف</th>
                                <th class="wd-25p border-bottom-0">الملاحظات</th>
                                <th class="wd-25p border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->max_price}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->notes}}</td>

                                <td>
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$row->id}}"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleted{{$row->id}}"><i class="fas fa-trash"></i></button>
                                </td>
                                @include('admin.Client.edit')
                               @include('admin.Client.deleted')
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
