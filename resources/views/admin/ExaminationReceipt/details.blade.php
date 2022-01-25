@extends('layouts.master')
@section('title')
    الحلال توب فود - محضر فحص واستلام لحوم
@endsection
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاذونات والمحاضر</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    محضر فحص واستلام لحوم</span>
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

                            <h4>تفاصيل محضر فحص واستلام لحوم</h4>
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
                                    <th class="wd-10p border-bottom-0"> رقم اذن الذبح</th>
                                    <th class="wd-10p border-bottom-0">اسم المنتج </th>
                                    <th class="wd-10p border-bottom-0">الكميه</th>

                                    <th class="wd-10p border-bottom-0">درجه الحراره</th>
                                    <th class="wd-10p border-bottom-0"> اللون</th>
                                    <th class="wd-10p border-bottom-0"> الرائحه</th>
                                    <th class="wd-10p border-bottom-0"> الملمس</th>


                                    <th class="wd-10p border-bottom-0">اسم المخزن </th>
                                    <th class="wd-10p border-bottom-0">اسم المورد </th>
                                    <th class="wd-10p border-bottom-0">ملاحظات</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>1</td>

                                        <td>{{ $row->date }}</td>
                                        <td>{{ $row->slaughter_date }}</td>
                                        <td>{{ $row->number_ear }}</td>
                                        <td>{{ $row->product->name }}</td>
                                        <td>{{ $row->quantity }}</td>

                                        <td>{{ $row->meat_temp }}</td>

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

                                        </td>

                                        <td>{{ $row->store->name }}</td>
                                        <td>{{ $row->supplier->name }}</td>
                                        <td>{!! $row->notes == true ? $row->notes : 'لا توجد ملاحظات' !!}</td>

                                    </tr>

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
