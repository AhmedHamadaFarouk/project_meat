<!-- Delete dispensePacking -->
<div class="modal fade" id="deleted{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="#deleted{{$row->id}}">حذف محضر فحص </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('dispensePacking.destroy','test')}}" method="POST" autocomplete="off">
                    @method('DELETE')
                    @csrf
                    {{-- page 419 --}}

                    <input type="hidden" name="id" value="{{$row->id}}">

                       <div class="row">
                        <div class="col">
                            <label>اسم الصنف</label>
                             <input type="text" name="product_id" id="product_id" class="form-control @error('product_id') is-invliad @enderror" value="{{$row->product->name }}" readonly>
                        </div>
                       </div>

                    <br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button class="btn btn-primary">حذف</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
