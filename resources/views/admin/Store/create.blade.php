<!-- Create Bank -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافه مخزن</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('store.store')}}" method="POST" autocomplete="off">
                    @csrf
                    {{-- page 419 --}}

                    <div class="row">
                        <div class="col">
                            <label>اسم المخزن</label>
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
                            <label>الفرع</label>
                            <select class="form-control" name="branch_id">
                                <option value="" disabled selected>اختر من القائمه</option>
                                    @foreach ($branches as $branche )
                                    <option value="{{$branche->id}}">{{$branche->name}}</option>
                                    @endforeach
                            </select>
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
