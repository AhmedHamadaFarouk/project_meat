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
    الحلال توب فود - معاينه طباعة محضر فحص واستلام لحوم
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاذونات والمحاضر</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    معاينة طباعة محضر فحص واستلام لحوم</span>
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
                        <div class="invoice-header">
                            <h1 class="invoice-title"> محضر فحص واستلام لحوم</h1>

                        </div><!-- invoice-header -->

                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th class="wd-20p">#</th>
                                        <th class="wd-40p">التاريخ</th>
                                        <th class="tx-center">تاريخ الذبح </th>
                                        <th class="tx-right">الفحص الظاهرى </th>
                                        <th class="tx-right">المطابقه</th>
                                        <th class="wd-40p">رقم اذن الذبح</th>
                                        <th class="tx-center">الكميه </th>
                                        <th class="tx-right">اسم المجزر</th>
                                        <th class="tx-right">اسم المنتج </th>
                                        <th class="tx-right"> ملاحظات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td class="tx-12">{{ $row->date }}</td>
                                        <td class="tx-center">{{ $row->slaughter_date }}
                                        </td>
                                        <td class="tx-right">{{ $row->Virtual_scan }}
                                        </td>
                                        <td class="tx-center">{{ $row->type }}
                                        </td>
                                        <td class="tx-12">{{ $row->number_ear }}</td>
                                        <td class="tx-center">{{ $row->quantity }}
                                        </td>
                                        <td class="tx-right">{{ $row->slaughterhouse }}
                                        </td>
                                        <td class="tx-right">{{ $row->product->name }}
                                        </td>
                                        <td class="tx-right">{{ $row->notes }}
                                            {{-- {{ $row->notes == true ? $row->notes : 'لا توجد ملاحظات' }} --}}
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
