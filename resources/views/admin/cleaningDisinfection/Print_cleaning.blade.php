@extends('layouts.master')

@section('css')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }

    </style>
@endsection
@section('title')
    الحلال توب فود - معاينه طباعة اذن صرف مواد التنظيف و التطهير
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاذونات والمحاضر</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    معاينة طباعة اذن صرف مواد التنظيف و التطهير</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">

                        <div class="">
                            <div class="row">

                                <div class="col-9">
                                    <h2 class="invoice-title"> اذن صرف مواد التنظيف و التطهير</h2>
                                    <span class="invoice-title h4"> تاريخ اليوم : {{ date('Y-m-d') }}</span>
                                </div>

                                <div class="col-3">
                                    <div class="billed-from">
                                        <h6>شركه الحلال توب فود</h6>
                                        <h6>فرع المنصوريه </h6>
                                        <p>201 Something St., Something Town, YT 242, Country 6546<br>
                                            Tel No: 324 445-4544<br>
                                            Email: youremail@companyname.com</p>
                                    </div>
                                </div>
                            </div>


                        </div><!-- invoice-header -->

                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th class="wd-5p">#</th>
                                        <th class="wd-10p"> التاريخ</th>
                                        <th class="wd-10p">اسم الصنف</th>
                                        <th class="wd-10p">الكمية </th>
                                        <th class="wd-10p">كود الصنف</th>
                                        <th class="wd-10p">رقم التشغيلة </th>
                                        <th class="wd-10p">تاريخ الانتاج</th>
                                        <th class="wd-10p">تاريخ الانتهاء</th>
                                        <th class="wd-10p">PH</th>
                                        <th class="wd-20p"> ملاحظات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{$row->date}}</td>
                                        <td>{{$row->product->name}}</td>
                                        <td>{{$row->Quantity}}</td>
                                        <td>{{$row->codeProduct}}</td>
                                        <td>{{$row->batchNumber}}</td>
                                        <td>{{$row->dataProduction}}</td>
                                        <td>{{$row->dataFinished}}</td>
                                        <td>{{$row->PH}}</td>
                                        <td>
                                            {!! $row->notes == true ? $row->notes : 'لا توجد ملاحظات' !!}
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mg-b-40">

                        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                class="mdi mdi-printer ml-1"></i>طباعة</button>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>


    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>

@endsection
