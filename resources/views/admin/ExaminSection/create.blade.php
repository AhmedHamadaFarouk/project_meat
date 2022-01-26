<!-- Create Bank -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">استلام امين المخزن </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('examin_section.store') }}" method="POST" autocomplete="off">
                    @csrf
                    {{-- page 419 --}}

                    <div class="row">
                        <div class="col-6">
                            <label>تاريخ اليوم</label>
                            <input type="date" name="date" class="form-control @error('date') is-invliad @enderror"
                                value="{{ date('Y-m-d') }}" readonly>
                        </div>
                        <div class="col-6">
                            <label> رقم محضر الفحص</label>
                            <input type="text" name="examin_id"
                                class="form-control @error('examin_id') is-invliad @enderror">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref"> اسم القسم</label>
                                <select name="section_id" id="section_id" class="form-control" required>
                                    <option selected disabled> اسم القسم </option>
                                    @foreach ($section as $data)
                                        <option value="{{ $data->id }}">{{ $data->section_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>كود الاستلام من البراد</label>
                            <input type="text" name="recipt_code"
                                class="form-control @error('recipt_code') is-invliad @enderror" required>
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
