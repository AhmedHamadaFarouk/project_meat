@extends('layouts.master')
 @section('title') الحلال توب فود - استلام لحوم
 @endsection
 @section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المخازن </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                 استلام لحوم</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
@include('notify')

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('examin_section.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label>تاريخ اليوم</label>
                            <input type="date" name="date" class="form-control @error('date') is-invliad @enderror"
                                value="{{ date('Y-m-d') }}" readonly>
                        </div>
                        {{-- تعديلفى الداتا بيز والعلاقه  بال examin meat  --}}
                        <div class="col-6">
                            <label> رقم محضر الفحص</label>
                            <input type="text" name="examin_id"
                                class="form-control @error('examin_id') is-invliad @enderror">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref"> اسم القسم</label>
                                <select name="section_id" id="section_id" class="form-control" required>
                                    <option selected disabled> اسم القسم </option>
                                    @foreach ($section as $data)
                                        <option value="{{ $data->id }}">{{ $data->section_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="inputName" class="control-label">اسم الصنف</label>
                            <select id="categories" name="categories" class="form-control">
                            </select>
                        </div>

                    </div>

                    <br>
                    <div class="row">
                        <div class="col-6">
                            <label>كود الاستلام من البراد</label>
                            <input type="text" name="recipt_code"
                                class="form-control @error('recipt_code') is-invliad @enderror" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>ملاحظات</label>
                            <textarea class="form-control softeditor" name="notes" rows="5"></textarea>
                        </div>

                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary">حفظ البيانات</button>
                    </div>

            </form>

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

{{-- section && product --}}
<script>
    $(document).ready(function() {
        $('select[name="section_id"]').on('change', function() {
            var SectionId = $(this).val();
            if (SectionId) {
                $.ajax({
                    url: "{{ URL::to('section') }}/" + SectionId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="categories"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="categories"]').append('<option value="' +
                                value + '">' + value + '</option>');
                        });
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });

    });

</script>
@endsection

