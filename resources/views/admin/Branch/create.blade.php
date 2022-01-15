<!-- Create Bank -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافه بنك</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('branch.store')}}" method="POST" autocomplete="off">
                    @csrf
                    {{-- page 419 --}}

                    <div class="row">
                        <div class="col">
                            <label>اسم الفرع</label>
                            <input type="text" name="name" class="form-control @error('name') is-invliad @enderror" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>العنوان</label>
                              <input type="text" name="address" class="form-control @error('address') is-invliad @enderror" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>المستخدم</label>
                              <input type="text" name="user_id" class="form-control @error('user_id') is-invliad @enderror" required>
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
