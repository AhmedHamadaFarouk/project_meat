<!-- edite materialInspection -->
<div class="modal fade" id="edit{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل محضر فحص خامات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('materialInspection.update','test')}}" method="POST" autocomplete="off">
                    @method('PUT')
                    @csrf
                    {{-- page 419 --}}

                    <input type="hidden" name="id" value="{{$row->id}}">

                    <div class="row">
                        <div class="col-6">
                            <label>التاريخ </label>
                            <input type="date" name="date" class="form-control @error('date') is-invliad @enderror" value="{{$row->date}}">
                        </div>

                         <div class="col-md">
                            <div class="form-group mb-2">
                                <label class="my-1 mr-2"
                                    for="inlineFormCustomSelectPref">اسم الصنف
                                    </label>
                                <select name="product_id" id="product_id"
                                    class="form-control" required>
                                    <option value="" selected disabled>
                                        اسم الصنف </option>
                                    @foreach ($product as $data)
                                        <option value="{{ $data->id }}">
                                            {{ $data->name }}</option>
                                    @endforeach

                                    {{$row->product}}
                                </select>
                            </div>
                        </div>
                    </div>


                    <br>

                    <div class="row">
                        <div class="col-4">
                            <label>الكمية</label>
                             <input type="number" name="Quantity" class="form-control @error('Quantity') is-invliad @enderror" value="{{$row->Quantity}}">
                        </div>

                        <div class="col-4">
                            <label>كود الصنف</label>
                             <input type="text" name="codeProduct" class="form-control @error('codeProduct') is-invliad @enderror"  value="{{$row->codeProduct}}">
                        </div>

                        <div class="col-4">
                            <label>رقم التشغيلة</label>
                             <input type="text" name="batchNumber" class="form-control @error('batchNumber') is-invliad @enderror" value="{{$row->batchNumber}}">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>تاريخ الانتاج </label>
                             <input type="date" name="dataProduction" class="form-control @error('dataProduction') is-invliad @enderror" value="{{$row->dataProduction}}">
                        </div>
                        <div class="col">
                            <label> تاريخ الانتهاء</label>
                             <input type="date" name="dataFinished" class="form-control @error('dataFinished') is-invliad @enderror"  value="{{$row->dataFinished}}">
                        </div>
                        <div class="col">
                            <label for="inputName" class="control-label">المطابقه </label>
                            <select name="type" class="form-control">
                                <option readonly>اختار</option>
                                <option value="acceptable">مطابق</option>
                                <option value="unacceptable">غير مطابق</option>

                                {{$row->type}}
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>الصور</label>
                            <textarea class="form-control softeditor" name="photo" rows="5">

                                {{$row->photo}}
                            </textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button class="btn btn-primary">حفظ</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
