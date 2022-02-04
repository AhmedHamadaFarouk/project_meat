<!-- Create Bank -->
<div class="modal fade" id="deleted{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('meatReceipt.destroy', 'test') }}" method="POST" autocomplete="off">
                    @method('DELETE')
                    @csrf

                    <input type="hidden" name="id" value="{{ $row->id }}">

                    <div class="row">
                        <div class="col">
                            <label>تاريخ الدبح</label>
                            <input type="date" name="start_date_slaughter" readonly  class="form-control" value="{{$row->start_date_slaughter}}">
                        </div>
                        <div class="col">
                            <label> رقم اذن الذبح</label>
                            <input type="text" name="permit_number" class="form-control @error('permit_number') is-invliad @enderror" value="{{ $row->permit_number }}" readonly>
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
