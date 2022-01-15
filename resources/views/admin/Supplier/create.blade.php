
<!-- Create Bank -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافه مورد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('supplier.store')}}" method="POST" autocomplete="off">
                    @csrf
                    {{-- page 419 --}}

                    <div class="row">
                        <div class="col">
                            <label>اسم المورد</label>
                            <input type="text" name="name" class="form-control @error('name') is-invliad @enderror" required>
                        </div>
                        <br>

                        <div class="col">
                            <label>رقم الهاتف</label>
                              <input type="number" name="phone" class="form-control @error('phone') is-invliad @enderror" required>
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
