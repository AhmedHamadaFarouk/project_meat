@extends('layouts.master')
@section('title')
    الحلال توب فود -  فحص مواد التعبئة والتغليف
@endsection
@section('css')
@endsection

@section('page-header')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                اضافه فحص مواد التعبئة والتغليف</span>
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
                            <button class="btn btn-success" data-toggle="modal" data-target="#create">اضافه فحص مواد التعبئة والتغليف</button>
                        </div>
                        @include('admin.PackingMaterials.create')
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table  class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th> الصوره</th>
                                <th> التاريخ</th>

                                <th>اسم الصنف</th>
                                <th>الكميه </th>
                                <th>كود الصنف</th>
                                <th>رقم التشغيلة </th>
                                <th>رقم الفاتوره </th>
                                <th>تاريخ الانتاج</th>
                                <th>تاريخ الانتهاء</th>
                                <th>المطابقة</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $row )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        @if($row->image)
                                            <a href="{{ $row->image }}">
                                                <img src="{{ $row->image }}" width="70" height="70" alt="{{ $row->name }}" class="list-thumbnail border-0">
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{$row->date}}</td>
                                    <td>{{$row->product->name}}</td>
                                    <td>{{$row->Quantity}}</td>
                                    <td>{{$row->codeProduct}}</td>
                                    <td>{{$row->batchNumber}}</td>
                                    <td>{{$row->number_invoices}}</td>
                                    <td>{{$row->dataProduction}}</td>
                                    <td>{{$row->dataFinished}}</td>
                                    <td>
                                        @if ($row->type == 'acceptable')
                                            <span class="text-success d-flex">مطابق</span>
                                        @else
                                            <span class="text-danger d-flex">غير مطابق</span>
                                        @endif
                                    </td>

                                    {{-- <td>{{$row->photo}}</td> --}}
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                    type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">

                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#edit{{ $row->id }}"><i
                                                        class="text-danger fas fa-edit"></i>&nbsp;&nbsp;تعديل
                                                </a>

                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#deleted{{ $row->id }}"><i
                                                        class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;حذف

                                                </a>

                                            </div>
                                        </div>
                                        {{-- <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$row->id}}"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleted{{$row->id}}"><i class="fas fa-trash"></i></button> --}}
                                    </td>
                                    @include('admin.PackingMaterials.edit')
                                    @include('admin.PackingMaterials.deleted')
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
