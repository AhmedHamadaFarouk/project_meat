<!-- Create Bank -->
<div class="modal fade" id="deleted{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف مخزن</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('store.destroy','test')}}" method="POST" autocomplete="off"> @method('DELETE')
                    @csrf {{-- page 419 --}} <input type="hidden" name="id" value="{{$row->id}}">
                    <div class="row">
                        <div class="col">
                            <label>اسم البنك</label>
                            <input type="text" name="name" class="form-control @error('name') is-invliad @enderror"
                                value="{{$row->name}}" readonly>
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