<!-- Create materialInspection -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافه فحص مواد التعبئة والتغليف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('PackingMaterials.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    {{-- page 419 --}}

                    <div class="row">
                        <div class="col">
                            <label>التاريخ </label>
                            <input type="date" name="date" class="form-control @error('date') is-invliad @enderror"
                                   required>
                        </div>

                        <div class="col">
                            <div class="form-group mb-2">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">اسم الصنف
                                </label>
                                <select name="product_id" id="product_id" class="form-control" required>
                                    <option value="" selected disabled>اسم الصنف</option>
                                    @foreach ($product as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <br>

                    <div class="row">
                        <div class="col">
                            <label>الكمية</label>
                            <input type="number" name="Quantity"
                                   class="form-control @error('Quantity') is-invliad @enderror" required>
                        </div>

                        <div class="col">
                            <label>كود الصنف</label>
                            <input type="text" name="codeProduct"
                                   class="form-control @error('codeProduct') is-invliad @enderror" required>
                        </div>

                        <div class="col">
                            <label>رقم التشغيلة</label>
                            <input type="text" name="batchNumber"
                                   class="form-control @error('batchNumber') is-invliad @enderror" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>رقم الفاتوره </label>
                            <input type="number" name="number_invoices"
                                   class="form-control @error('number_invoices') is-invliad @enderror" required>
                        </div>

                        <div class="col">
                            <label>تاريخ الانتاج </label>
                            <input type="date" name="dataProduction"
                                   class="form-control @error('dataProduction') is-invliad @enderror" required>
                        </div>
                        <div class="col">
                            <label> تاريخ الانتهاء</label>
                            <input type="date" name="dataFinished"
                                   class="form-control @error('dataFinished') is-invliad @enderror" required>
                        </div>
                        <div class="col">
                            <label for="inputName" class="control-label">المطابقه </label>
                            <select name="type" class="form-control">
                                <option disabled selected>اختار</option>
                                <option value="acceptable">مطابق</option>
                                <option value="unacceptable">غير مطابق</option>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <p class="text-danger">* صيغة المرفق .pdf, .jpeg , .jpg , .png , .xlsx, .doc </p>
                            <h5 class="card-title">المرفقات</h5>
                            <div class="col-sm-12 col-md-12">
                                <input type="file" name="photo" class="dropify" accept=".pdf,.jpg, .png, image/jpeg,image/png, .xls,.xlsx,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" data-height="70" />
                            </div>
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
