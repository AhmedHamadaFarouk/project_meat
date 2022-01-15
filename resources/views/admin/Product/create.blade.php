<!-- Create Bank -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اذن اضافه للمخزن</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('products.store') }}" method="POST" autocomplete="off">
                    @csrf
                    {{-- page 419 --}}

                    <div class="row">
                        <div class="col-6">
                            <label> التاريخ</label>
                            <input type="date" name="date" class="form-control @error('date') is-invliad @enderror"
                                required>
                        </div>

                        <div class="col-6">
                            <label>اسم المنتج</label>
                            <input type="text" name="name" class="form-control @error('name') is-invliad @enderror"
                                required>
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col-6">
                            <label>الكميه</label>
                            <input type="number" name="quantity"
                                class="form-control @error('quantity') is-invliad @enderror" required>
                        </div>

                        <div class="col-6">
                            <label>رقم امر التشغيل</label>
                            <input type="text" name="order_number"
                                class="form-control @error('order_number') is-invliad @enderror" required>
                        </div>


                    </div>

                    <br>
                    <div class="row">
                        <div class="col-6">
                            <label>تاريخ التوريد</label>
                            <input type="date" name="date_supply"
                                class="form-control @error('date_supply') is-invliad @enderror" required>
                        </div>

                        <div class="col-6">
                            <label for="inputName" class="control-label"> مطابق</label>

                            <select name="type" class="form-control">
                                <option value="" selected disabled>اختار</option>
                                <option value="identical">مطابق</option>
                                <option value="Not_matching">غير مطابق</option>
                            </select>
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col">
                            <label> الكود</label>
                            <input type="text" name="code" class="form-control @error('code') is-invliad @enderror"
                                required>
                        </div>

                        <div class="col">
                            <label>رقم المنتج</label>
                            <input type="text" name="number_product"
                                class="form-control @error('number_product') is-invliad @enderror" required>
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
