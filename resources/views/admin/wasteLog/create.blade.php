<!-- Create Bank -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">سجل رفع المخلفات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('wasteLog.store') }}" method="POST" autocomplete="off">
                    @csrf
                    {{-- page 419 --}}

                    <div class="row">
                        <div class="col">
                            <label>التاريخ</label>
                            <input type="date" name="date" class="form-control @error('date') is-invliad @enderror"
                                required>
                        </div>
                    </div>


                    <br>

                    <div class="row">
                        <div class="col">
                            <label>الكميه</label>
                            <input type="number" name="Quantity"
                                class="form-control @error('Quantity') is-invliad @enderror" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label> اسم الشركه</label>
                            <input type="text" name="name_company"
                                class="form-control @error('name_company') is-invliad @enderror" required>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="form-group mb-2">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">اسم المنتج
                            </label>
                            <select name="product_id" id="product_id" class="form-control" required>
                                <option value="" selected disabled>
                                    اسم المنتج </option>
                                @foreach ($product as $data)
                                    <option value="{{ $data->id }}">
                                        {{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="inputName" class="control-label"> مطابق</label>

                            <select name="type" class="form-control">
                                <option value="organic">عضوى</option>
                                <option value="non_organic">غير عضوى</option>
                            </select>
                        </div>
                    </div>


                    <br>
                    <div class="row">
                        <div class="col">
                            <label>ملاحظات</label>
                            <textarea class="form-control softeditor" name="notes" rows="5"></textarea>
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
