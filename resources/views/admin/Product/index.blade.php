@extends('layouts.master')
@section('title')
    الحلال توب فود - اذن اضافه للمخزن
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاذونات والمحاضر</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/اذن
                    اضافه للمخزن</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

@endsection

@section('content')

    @include('admin.Product.notify')

    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success" data-toggle="modal" data-target="#create">اذن اضافه للمخزن
                            </button>
                        </div>
                        @include('admin.Product.create')
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">اسم المنتج</th>
                                    <th class="wd-20p border-bottom-0">الكميه</th>
                                    <th class="wd-15p border-bottom-0"> رقم امرالتشغيل</th>
                                    <th class="wd-10p border-bottom-0">تاريخ التوريد</th>
                                    <th class="wd-25p border-bottom-0">مطابق</th>
                                    <th class="wd-25p border-bottom-0">الكود</th>
                                    <th class="wd-25p border-bottom-0">رقم المنتج</th>
                                    <th class="wd-25p border-bottom-0">التاريخ</th>
                                    <th class="wd-25p border-bottom-0">ملاحظات</th>
                                    <th class="wd-25p border-bottom-0">العمليات</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->quantity }}</td>
                                        <td>{{ $row->order_number }}</td>
                                        <td>{{ $row->date_supply }}</td>
                                        <td>
                                            @if ($row->type == 'identical')
                                                <span class="text-success d-flex">مطابق</span>
                                            @else
                                                <span class="text-danger d-flex">غير مطابق</span>
                                            @endif
                                        </td>
                                        <td>{{ $row->code }}</td>
                                        <td>{{ $row->number_product }}</td>
                                        <td>{{ $row->date }}</td>
                                        <td>{{ $row->notes == true ? $row->notes : 'لا توجد ملاحظات' }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $row->id }}"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#deleted{{ $row->id }}"><i
                                                    class="fas fa-trash"></i></button>
                                        </td>
                                        @include('admin.Product.edit')
                                        @include('admin.Product.deleted')
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
