@extends('layouts.master') @section('title') الحلال توب فود -  فحص لحوم @endsection @section('css')
@endsection @section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المخازن </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                تعديل فحص لحوم</span>
        </div>
    </div>
</div>
<!-- breadcrumb --> @endsection @section('content') @include('notify')
<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('examination_meat.update', 'test') }}" method="POST" autocomplete="off">
                    @method('PUT') @csrf <input type="hidden" name="id" value="{{ $row->id }}">
                    <div class="row">
                        <div class="col-6">
                            <label>التاريخ</label>
                            <input type="date" name="date" class="form-control @error('date') is-invliad @enderror"
                                value="{{ $row->date }}">
                        </div>
                        <div class="col-6">
                            <label> تاريخ الذبح</label>
                            <input type="date" name="slaughter_date"
                                class="form-control @error('slaughter_date') is-invliad @enderror"
                                value="{{ $row->slaughter_date }}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <label> رقم اذن الذبح</label>
                            <input type="text" name="number_ear"
                                class="form-control @error('number_ear') is-invliad @enderror"
                                value="{{$row->number_ear}}">
                        </div>
                        <div class="col-6">
                            <label>الفحص الظاهرى</label>
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" name="meat_temp" placeholder="درجه الحراره"
                                        class="form-control @error('meat_temp') is-invliad @enderror"
                                        value="{{$row->meat_temp}}">
                                </div>
                                <div class="col-3">
                                    <select name="meat_color" class="form-control">
                                        <option value="" selected disabled>اللون</option>
                                        <option value="acceptable" {{$row->meat_color == "acceptable"
                                            ?'selected':''}}>مطابق</option>
                                        <option value="Unacceptable" {{$row->meat_color == "Unacceptable"
                                            ?'selected':''}}>غير مطابق</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select name="meat_smell" class="form-control">
                                        <option value="" selected disabled>الرائحه</option>
                                        <option value="acceptable" {{$row->meat_smell == "acceptable"
                                            ?'selected':''}}>مطابق</option>
                                        <option value="Unacceptable" {{$row->meat_smell == "Unacceptable"
                                            ?'selected':''}}>غير مطابق</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select name="meat_texture" class="form-control">
                                        <option value="" selected disabled>الملمس</option>
                                        <option value="acceptable" {{$row->meat_texture == "acceptable"
                                            ?'selected':''}}>مطابق</option>
                                        <option value="Unacceptable" {{$row->meat_texture == "Unacceptable"
                                            ?'selected':''}}>غير مطابق</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">اسم المخزن </label>
                                <select name="store_id" id="store_id" class="form-control">
                                    @foreach ($store as $data)
                                    <option value="{{ $data->id }}" {{ $data->id == $row->store_id ? 'selected' : '' }}>
                                        {{ $data->name }}</option>
                                        @endforeach
                                     </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">اسم المورد </label>
                                <select name="supplier_id" id="supplier_id" class="form-control"> @foreach ($supplier as
                                    $data) <option value="{{ $data->id }}" {{ $data->id == $row->supplier_id ?
                                        'selected' : '' }}> {{ $data->name }}</option> @endforeach </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">اسم المنتج </label>
                                <select name="product_id" id="product_id" class="form-control"> @foreach ($product as
                                    $data) <option value="{{ $data->id }}" {{ $data->id == $row->product_id ? 'selected'
                                        : '' }}> {{ $data->name }}</option> @endforeach </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>الكميه</label>
                            <input type="number" name="quantity"
                                class="form-control @error('quantity') is-invliad @enderror"
                                value="{{ $row->quantity }}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>ملاحظات</label>
                            <textarea class="form-control softeditor" name="notes" rows="5">
                            {{ $row->notes }}
                            </textarea>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col"> @if($row->image) <a href="{{ $row->image }}">
                                <img src="{{ $row->image }}" width="100" height="100" alt="{{ $row->title }}">
                            </a> @endif </div>
                    </div>
                    <p class="text-danger">* صيغة المرفق .pdf, .jpeg , .jpg , .png , .xlsx, .doc </p>
                    <h5 class="card-title">المرفقات</h5>
                    <div class="col-sm-12 col-md-12">
                        <input type="file" name="photo" class="dropify"
                            accept=".pdf,.jpg, .png, image/jpeg,image/png, .xls,.xlsx,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                            data-height="70" />
                    </div><br>
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
<!-- main-content closed --> @endsection @section('js') <script
    src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.editorConfig = function(config) {
        config.extraPlugins = 'imageuploader';
    };
    CKEDITOR.replaceClass = 'softeditor';
</script>
@endsection
