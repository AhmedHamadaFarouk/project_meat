@extends('layouts.master')
@section('title')
    الحلال توب فود - فحص لحوم
@endsection
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> المخازن</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    فحص لحوم</span>
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

                            <a href="{{ route('examination_meat.create') }}" class=" btn btn-success"> فحص
                                لحوم</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-5p border-bottom-0">#</th>
                                    <th class="wd-10p border-bottom-0">التاريخ</th>
                                    <th class="wd-10p border-bottom-0">تاريخ الذبح</th>
                                    {{-- <th class="wd-10p border-bottom-0"> رقم اذن الذبح</th> --}}
                                    <th class="wd-10p border-bottom-0">اسم المنتج </th>
                                    <th class="wd-10p border-bottom-0">الكميه</th>
                                    {{-- <th class="wd-10p border-bottom-0">درجه الحراره</th>
                                    <th class="wd-10p border-bottom-0"> اللون</th>
                                    <th class="wd-10p border-bottom-0"> الرائحه</th>
                                    <th class="wd-10p border-bottom-0"> الملمس</th> --}}


                                    <th class="wd-10p border-bottom-0">اسم المخزن </th>
                                    <th class="wd-10p border-bottom-0">اسم المورد </th>
                                    {{-- <th class="wd-10p border-bottom-0">ملاحظات</th> --}}
                                    <th class="wd-10p border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->date }}</td>
                                        <td>{{ $row->slaughter_date }}</td>
                                        {{-- <td>{{ $row->number_ear }}</td> --}}
                                        <td>{{ $row->product->name }}</td>
                                        <td>{{ $row->quantity }}</td>

                                        {{-- <td>{{ $row->meat_temp }}</td>

                                        <td>

                                            @if ($row->meat_color == 'acceptable')
                                                <span class="text-success d-flex">مطابق</span>
                                            @else
                                                <span class="text-danger d-flex">غير مطابق</span>

                                            @endif

                                        </td>

                                        <td>

                                            @if ($row->meat_smell == 'acceptable')
                                                <span class="text-success d-flex">مطابق</span>
                                            @else
                                                <span class="text-danger d-flex">غير مطابق</span>

                                            @endif

                                        </td>
                                        <td>

                                            @if ($row->meat_texture == 'acceptable')
                                                <span class="text-success d-flex">مطابق</span>
                                            @else
                                                <span class="text-danger d-flex">غير مطابق</span>

                                            @endif

                                        </td> --}}

                                        <td>{{ $row->store->name }}</td>
                                        <td>{{ $row->supplier->name }}</td>
                                        {{-- <td>{!! $row->notes == true ? $row->notes : 'لا توجد ملاحظات' !!}</td> --}}
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                    type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">

                                                    <a class="dropdown-item"
                                                        href="{{ route('examination_meat.edit', $row->id) }}"><i
                                                            class="text-danger fas fa-edit"></i>&nbsp;&nbsp;تعديل
                                                    </a>


                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#deleted{{ $row->id }}"><i
                                                            class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;حذف

                                                    </a>

                                                    <a class="dropdown-item" href="{{ route('print', $row->id) }}"><i
                                                            class="text-success fas fa-print"></i>&nbsp;&nbsp;طباعة

                                                    </a>

                                                    <a class="dropdown-item" href="{{ route('details', $row->id) }}"><i
                                                            class="text-primary fas fa-list"></i>&nbsp;&nbsp;التفاصيل

                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        @include('admin.ExaminationMeat.deleted')
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
