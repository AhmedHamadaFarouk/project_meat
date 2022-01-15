<!-- Create Bank -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">محضر فحص واستلام لحوم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('examination_receipt.store') }}" method="POST" autocomplete="off">
                    @csrf
                    {{-- page 419 --}}

                    <div class="row">
                        <div class="col-6">
                            <label>التاريخ</label>
                            <input type="date" name="date" class="form-control @error('date') is-invliad @enderror"
                                required>
                        </div>

                        <div class="col-6">
                            <label> تاريخ الذبح</label>
                            <input type="date" name="slaughter_date"
                                class="form-control @error('slaughter_date') is-invliad @enderror" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-6">
                            <label>الفحص الظاهرى</label>
                            <input type="text" name="Virtual_scan"
                                class="form-control @error('Virtual_scan') is-invliad @enderror" required>
                        </div>

                        <div class="col-6">
                            <label for="inputName" class="control-label"> مطابق</label>

                            <select name="type" class="form-control">
                                <option value="" selected disabled>اختار</option>
                                <option value="acceptable">مطابق</option>
                                <option value="Unacceptable">غير مطابق</option>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">

                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">اسم المنتج </label>
                                <select name="product_id" id="product_id" class="form-control" required>
                                    <option selected disabled> اسم المنتج </option>
                                    @foreach ($product as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <label> اسم المجزر</label>
                            <input type="text" name="slaughterhouse"
                                class="form-control @error('slaughterhouse') is-invliad @enderror" required>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <label> رقم اذن الذبح</label>
                            <input type="text" name="number_ear"
                                class="form-control @error('number_ear') is-invliad @enderror" required>
                        </div>

                        <div class="col-6">
                            <label>الكميه</label>
                            <input type="number" name="quantity"
                                class="form-control @error('quantity') is-invliad @enderror" required>
                        </div>

                    </div>


                    <br>
                    <div class="row">
                        <div class="col">
                            <label>ملاحظات</label>
                            <textarea class="form-control softeditor" name="notes" rows="5"></textarea>
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
