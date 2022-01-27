@extends('layouts.master')
@section('title')
    الحلال توب فود - استلام لحوم
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المخازن</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    استلام لحوم </span>
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


                        <a href="{{ route('examin_section.create') }}" class=" btn btn-success"> استلام
                            لحوم</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">تاريخ اليوم </th>
                                    <th class="wd-20p border-bottom-0">رقم محضر الفحص</th>
                                    <th class="wd-15p border-bottom-0">اسم القسم</th>
                                    <th class="wd-15p border-bottom-0">اسم الصنف</th>
                                    <th class="wd-15p border-bottom-0">كود الاستلام من البراد</th>
                                    <th class="wd-10p border-bottom-0">ملاحظات</th>
                                    <th class="wd-25p border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->date }}</td>
                                        <td>{{ $row->examination_meats->examin_id }}</td>
                                        <td>{{ $row->section->section_name }}</td>
                                        <td>{{ $row->categories->category_name }}</td>
                                        <td>{{ $row->recipt_code }}</td>
                                        <td>
                                            @if ($row->notes == true) {!! $row->notes !!} @else <p class="text-danger">لا توجد ملاحظات</p> @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $row->id }}"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#deleted{{ $row->id }}"><i
                                                    class="fas fa-trash"></i></button>
                                        </td>
                                        @include('admin.ExaminSection.edit')
                                        @include('admin.ExaminSection.deleted')
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
