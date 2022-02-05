@extends('layouts.master')
@section('title')
    امين المخزن /  استلام  لحوم
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المخزن</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ امين المخزن /  استلام  لحوم</span>
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
                            <a href="{{route('meatToxin.create')}}" class="btn btn-success">استلام اللحوم - امين المخزن
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap text-center" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>انواع اللحوم</th>
                                <th>كود الاستلام</th>
                                <th>تاريخ الدبح</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody> @foreach ($data as $row )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->type_meat}}</td>
                                    <td>{{$row->receipt_code}}</td>
                                    <td>{{$row->meatReceipt->start_date_slaughter}}</td>
                                    <td>
                                        @if(App\Models\DeletliesMeat::where('meat_toxin_id','!=',$row->id)->first())
                                            <a href="{{route('meatToxin.show',$row->id)}}"
                                               class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                        @endif

{{--                                        @if(App\Models\DeletliesMeat::count() > 1)--}}
                                            <a href="{{route('meatToxinDeletelies',$row->id)}}"
                                               class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
{{--                                        @endif--}}

{{--                                        @if(App\Models\DeletliesMeat::count() < 1)--}}

                                            <a href="{{route('meatToxin.edit',$row->id)}}"
                                               class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
{{--                                        @endif--}}

                                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#deleted{{$row->id}}"><i class="fas fa-trash"></i></button>
                                    </td>

                                    @include('admin.meatToxin.deleted')
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
        CKEDITOR.editorConfig = function (config) {
            config.extraPlugins = 'imageuploader';
        };
        CKEDITOR.replaceClass = 'softeditor';
    </script>
@endsection
