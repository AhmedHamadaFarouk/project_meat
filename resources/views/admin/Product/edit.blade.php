<!-- Create Bank -->
<div class="modal fade" id="edit{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل اذن الاضافه</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.update', 'test') }}" method="POST" autocomplete="off">
                    @method('PUT')
                    @csrf

                    {{-- page 419 --}}


                    <input type="hidden" name="id" value="{{ $row->id }}">

                    <div class="row">
                        <div class="col">
                            <label>اسم المنتج</label>
                            <input type="text" name="name" class="form-control @error('name') is-invliad @enderror"
                                value="{{ $row->name }}">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>الكميه</label>
                            <input type="number" name="quantity"
                                class="form-control @error('quantity') is-invliad @enderror"
                                value="{{ $row->quantity }}">
                        </div>
                    </div>


                    <br>

                    <div class="row">
                        <div class="col">
                            <label>رقم امر التشغيل</label>
                            <input type="text" name="order_number"
                                class="form-control @error('order_number') is-invliad @enderror"
                                value="{{ $row->order_number }}">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>تاريخ التوريد</label>
                            <input type="date" name="date_supply"
                                class="form-control @error('date_supply') is-invliad @enderror"
                                value="{{ $row->date_supply }}">
                        </div>
                    </div>


                    <br>

                    <div class="row">
                        <div class="col">
                            <label for="inputName" class="control-label"> مطابق</label>

                            <select name="type" class="form-control">
                                <option value="identical" {{$row->type=='identical' ? 'selected' : ''}} >مطابق</option>
                                <option value="Not_matching" {{$row->type=='Not_matching' ? 'selected' : ''}}>غير مطابق</option>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label> الكود</label>
                            <input type="text" name="code" class="form-control @error('code') is-invliad @enderror"
                                value="{{ $row->code }}">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>رقم المنتج</label>
                            <input type="text" name="number_product"
                                class="form-control @error('number_product') is-invliad @enderror"
                                value="{{ $row->number_product }}">
                        </div>
                    </div>


                    <br>
                    <div class="row">
                        <div class="col">
                            <label>ملاحظات</label>
                            <textarea class="form-control softeditor" name="notes" rows="5" > {{$row->notes}}</textarea>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label> التاريخ</label>
                            <input type="date" name="date" class="form-control @error('date') is-invliad @enderror"
                                value="{{ $row->date }}">
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
