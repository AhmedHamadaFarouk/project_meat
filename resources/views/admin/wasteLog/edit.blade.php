<!-- Create Bank -->
<div class="modal fade" id="edit{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل سجل رفع المخلفات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('wasteLog.update', 'test') }}" method="POST" autocomplete="off">
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
                            <label>الكميه</label>
                            <input type="number" name="Quantity"
                                class="form-control @error('Quantity') is-invliad @enderror"
                                value="{{ $row->Quantity }}">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">اسم المنتج</label>
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
                            <label> اسم الشركه</label>
                            <input type="text" name="name_company"
                                class="form-control @error('name_company') is-invliad @enderror"
                                value="{{ $row->name_company }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="inputName" class="control-label"> مطابق</label>

                            <select name="type" class="form-control">
                                <option value="organic" {{ $row->type == 'organic' ? 'selected' : '' }}>عضوى</option>
                                <option value="non_organic" {{ $row->type == 'non_organic' ? 'selected' : '' }}>غير
                                    عضوى
                                </option>
                            </select>
                        </div>
                    </div>


                    <br>
                    <div class="row">
                        <div class="col">
                            <label>ملاحظات</label>
                            <textarea class="form-control softeditor" name="notes"
                                rows="5">{{ $row->notes }}</textarea>
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
