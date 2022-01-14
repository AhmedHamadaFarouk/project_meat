@extends('layouts.master')
@section('title')
    الحلال توب فود -سجل رفع المخلفات
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاذونات والمحاضر</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    سجل رفع المخلفات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

@endsection

@section('content')
@include('admin.wasteLog.notify')

    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success" data-toggle="modal" data-target="#create">سجل رفع المخلفات
                            </button>
                        </div>
                        @include('admin.wasteLog.create')
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-25p border-bottom-0">التاريخ</th>
                                    <th class="wd-20p border-bottom-0">الكميه</th>
                                    <th class="wd-20p border-bottom-0">اسم الشركه</th>
                                    {{-- <th class="wd-15p border-bottom-0"> اسم المنتج </th> --}}
                                    <th class="wd-25p border-bottom-0">مطابق</th>
                                    <th class="wd-25p border-bottom-0">ملاحظات</th>
                                    <th class="wd-25p border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->date }}</td>

                                        <td>{{ $row->Quantity }}</td>
                                        <td>{{ $row->name_company }}</td>
                                        {{-- <td>{{ $row->product->name }}</td> --}}

                                        <td>
                                            {!! ($row->type == 'organic') == true
    ? '<h5 class="text-success d-flex">
                                                عضوى</h5>'
    : '<h5 class="text-danger d-flex">غير عضوى
                                            </h5>' !!}
                                            {{-- @if ($row->type == 'organic')
                                                <h5 class="text-success d-flex">
                                                    عضوى</h5>
                                            @else
                                                <h5 class="text-danger d-flex">غير عضوى
                                                </h5>
                                            @endif --}}
                                        </td>

                                        <td>{{ $row->notes == true ? $row->notes : 'لا توجد ملاحظات' }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $row->id }}"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#deleted{{ $row->id }}"><i
                                                    class="fas fa-trash"></i></button>
                                        </td>
                                        @include('admin.wasteLog.edit')
                                        @include('admin.wasteLog.deleted')
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
