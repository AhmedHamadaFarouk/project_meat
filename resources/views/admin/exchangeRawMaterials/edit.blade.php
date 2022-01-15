<!-- Create Bank -->
<div class="modal fade" id="edit{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل اذن صرف الخامات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('exchangeRawMaterials.update', 'test') }}" method="POST" autocomplete="off">
                    @method('PUT')
                    @csrf

                    {{-- page 419 --}}

                    <input type="hidden" name="id" value="{{ $row->id }}">


                    <div class="row">
                        <div class="col-6">
                            <label>التاريخ</label>
                            <input type="date" name="date" class="form-control @error('date') is-invliad @enderror"
                                value="{{ $row->date }}">
                        </div>

                        <div class="col-6">
                            <label> رقم امر الشغل </label>
                            <input type="text" name="codeJop"
                                class="form-control @error('codeJop') is-invliad @enderror"
                                value="{{ $row->codeJop }}">
                        </div>
                    </div>

                    <br>
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">اسم المنتج
                                </label>
                                <select name="product_id" id="product_id" class="form-control">
                                    <option value="" selected disabled>
                                  
                                    @foreach ($product as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == $row->product_id ? 'selected' : '' }}>
                                            {{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <label>الكميه</label>
                            <input type="number" name="Quantity"
                                class="form-control @error('Quantity') is-invliad @enderror"
                                value="{{ $row->Quantity }}">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <label>كود المنتج</label>
                            <input type="text" name="codeProduct"
                                class="form-control @error('codeProduct') is-invliad @enderror"
                                value="{{ $row->codeProduct }}">
                        </div>

                        <div class="col-6">
                            <label> رقم الباتش </label>
                            <input type="text" name="batchNumber"
                                class="form-control @error('batchNumber') is-invliad @enderror"
                                value="{{ $row->batchNumber }}">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <label> تاريخ الانتاج</label>
                            <input type="date" name="dataProduction"
                                class="form-control @error('dataProduction') is-invliad @enderror"
                                value="{{ $row->dataProduction }}">
                        </div>

                        <div class="col-6">
                            <label> تاريخ الانتهاء</label>
                            <input type="date" name="dataFinished"
                                class="form-control @error('dataFinished') is-invliad @enderror"
                                value="{{ $row->dataFinished }}">
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


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
