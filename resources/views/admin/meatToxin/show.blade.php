@extends('layouts.master')
@section('title')
    تفاصيل الاستلام
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المخازن</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تفاصيل الاستلام</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    <div class="card">
        <div class="card-body">
            <form action="{{route('packagesprice.store')}}" method="post">
                @csrf

                <input type="hidden" name="meat_toxin_id" value="{{ $date->id }}">

                @foreach(explode(',',$date->type_meat) as $row)

                    <div class="row">
                        <div class="col col-md-1">
                            <br>
                            <input type="text" readonly value="{{$row}}" class="form-control">
                            <input type="hidden" name="type[]" required value="{{$row}}">
                            <input type="hidden" name="test[]" required value="{{$row}}">
                        </div>

                        <br>
                        <div class="col">
                            <label>وزن</label>
                            <input type="number" class="form-control " name="weight[]" required>
                        </div>
                        <br>
                        <div class="col">
                            <label>الكميه</label>
                            <input type="number" class="form-control " name="amount[]" required>
                        </div>
                        <br>
                        <div class="col">
                            <label>خسيه</label>
                            <input type="number" class="form-control " name="testicle[]" required>
                        </div>
                        <br>
                        <div class="col">
                            <label>سعر</label>
                            <input type="number" class="form-control " name="price[]">
                        </div>
                    </div>
                    <br>
                    <br>

                @endforeach
                <br>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success">حفظ البيانات</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="row">

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
