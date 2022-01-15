<!-- Create cleaningDisinfection -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> اضافه اذن صرف مواد التنظيف و التطهير</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('cleaningDisinfection.store')}}" method="POST" autocomplete="off">
                    @csrf
                    {{-- page 419 --}}

                    <div class="row">
                        <div class="col-6">
                            <label>التاريخ </label>
                            <input type="date" name="date" class="form-control @error('date') is-invliad @enderror" required>
                        </div>

                        <div class="col-md">
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
                        <div class="col-4">
                            <label>الكمية</label>
                             <input type="number" name="Quantity" class="form-control @error('Quantity') is-invliad @enderror" required>
                        </div>

                        <div class="col-4">
                            <label>كود الصنف</label>
                             <input type="text" name="codeProduct" class="form-control @error('codeProduct') is-invliad @enderror" required>
                        </div>

                        <div class="col-4">
                            <label>رقم التشغيلة</label>
                             <input type="text" name="batchNumber" class="form-control @error('batchNumber') is-invliad @enderror" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>تاريخ الانتاج </label>
                             <input type="date" name="dataProduction" class="form-control @error('dataProduction') is-invliad @enderror" required>
                        </div>
                        <div class="col">
                            <label> تاريخ الانتهاء</label>
                             <input type="date" name="dataFinished" class="form-control @error('dataFinished') is-invliad @enderror" required>
                        </div>
                        <div class="col">
                            <label> PH</label>
                             <input type="number" name="PH" class="form-control @error('PH') is-invliad @enderror" required>
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



