<!-- Create Bank -->
<div class="modal fade" id="edit{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل محضر فحص واستلام لحوم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('examination_receipt.update', 'test') }}" method="POST" autocomplete="off">
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
                            <label> تاريخ الذبح</label>
                            <input type="date" name="slaughter_date"
                                class="form-control @error('slaughter_date') is-invliad @enderror"
                                value="{{ $row->slaughter_date }}">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-6">
                            <label>الفحص الظاهرى</label>
                            <input type="text" name="Virtual_scan"
                                class="form-control @error('Virtual_scan') is-invliad @enderror"
                                value="{{ $row->Virtual_scan }}">
                        </div>

                        <div class="col-6">
                            <label for="inputName" class="control-label"> مطابق</label>

                            <select name="type" class="form-control">
                                <option value="acceptable" {{$row->type == "acceptable" ?'selected':''}}>مطابق</option>
                                <option value="Unacceptable" {{$row->type == "Unacceptable" ?'selected':''}}>غير مطابق</option>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">

                        <div class="col-6">

                            <div class="form-group mb-2">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">اسم المنتج </label>
                                <select name="product_id" id="product_id" class="form-control">

                                    @foreach ($product as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == $row->product_id ? 'selected' : '' }}>
                                            {{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <label> اسم المجزر</label>
                            <input type="text" name="slaughterhouse"
                                class="form-control @error('slaughterhouse') is-invliad @enderror"
                                value="{{ $row->slaughterhouse }}">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <label> رقم اذن الذبح</label>
                            <input type="text" name="number_ear"
                                class="form-control @error('number_ear') is-invliad @enderror"
                                value="{{ $row->number_ear }}">
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


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
