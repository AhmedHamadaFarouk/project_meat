<!-- edite materialInspection -->
<div class="modal fade" id="edit{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل فحص مواد التعبئة والتغليف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('PackingMaterials.update','test')}}" method="POST" autocomplete="off">
                    @method('PUT')
                    @csrf
                    {{-- page 419 --}}

                    <input type="hidden" name="id" value="{{$row->id}}">

                    <div class="row">
                        <div class="col-6">
                            <label>التاريخ </label>
                            <input type="date" name="date" class="form-control @error('date') is-invliad @enderror"
                                   value="{{$row->date}}">
                        </div>

                        <div class="col-md">
                            <div class="form-group mb-2">
                                <label>اسم الصنف</label>
                                <select name="product_id" id="product_id" class="form-control" >
                                    @foreach ($product as $data)
                                        <option value="{{ $data->id }}" {{$data->id == $row->product_id ? 'selected' : ''}}>{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <br>

                    <div class="row">
                        <div class="col-4">
                            <label>الكمية</label>
                            <input type="number" name="Quantity"
                                   class="form-control @error('Quantity') is-invliad @enderror"
                                   value="{{$row->Quantity}}">
                        </div>

                        <div class="col-4">
                            <label>كود الصنف</label>
                            <input type="text" name="codeProduct"
                                   class="form-control @error('codeProduct') is-invliad @enderror"
                                   value="{{$row->codeProduct}}">
                        </div>

                        <div class="col-4">
                            <label>رقم التشغيلة</label>
                            <input type="text" name="batchNumber"
                                   class="form-control @error('batchNumber') is-invliad @enderror"
                                   value="{{$row->batchNumber}}">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>رقم الفاتوره </label>
                            <input type="number" name="number_invoices"
                                   class="form-control @error('number_invoices') is-invliad @enderror"
                                   value="{{$row->number_invoices}}">
                        </div>

                        <div class="col">
                            <label>تاريخ الانتاج </label>
                            <input type="date" name="dataProduction"
                                   class="form-control @error('dataProduction') is-invliad @enderror"
                                   value="{{$row->dataProduction}}">
                        </div>
                        <div class="col">
                            <label> تاريخ الانتهاء</label>
                            <input type="date" name="dataFinished"
                                   class="form-control @error('dataFinished') is-invliad @enderror"
                                   value="{{$row->dataFinished}}">
                        </div>
                        <div class="col">
                            <label for="inputName" class="control-label">المطابقه </label>
                            <select name="type" class="form-control">
                                <option value="acceptable" {{$row->type == "acceptable" ? 'selected' : ''}}>مطابق</option>
                                <option value="unacceptable" {{$row->type == "unacceptable" ? 'selected' : ''}}>غير مطابق</option>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            @if($row->image)
                                <a href="{{ $row->image }}">
                                    <img src="{{ $row->image }}" width="70" height="70" alt="{{ $row->name }}" class="list-thumbnail border-0">
                                </a>
                            @endif
                            <p class="text-danger">* صيغة المرفق .pdf, .jpeg , .jpg , .png , .xlsx, .doc </p>
                            <h5 class="card-title">المرفقات</h5>
                            <div class="col-sm-12 col-md-12">
                                <input type="file" name="photo" class="dropify" accept=".pdf,.jpg, .png, image/jpeg,image/png, .xls,.xlsx,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" data-height="70" />
                            </div>
                        </div>
                    </div>


                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button class="btn btn-primary">حفظ</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
