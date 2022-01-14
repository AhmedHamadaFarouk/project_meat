<!-- Delete disinfectionMaterials -->
<div class="modal fade" id="deleted{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="#deleted{{$row->id}}">حذف محضر فحص مواد التنظيف و التطهير</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('disinfectionMaterials.destroy','test')}}" method="POST" autocomplete="off">
                    @method('DELETE')
                    @csrf
                    {{-- page 419 --}}

                    <input type="hidden" name="id" value="{{$row->id}}">

                    <div class="row">
                        <div class="col-4">
                            <label>كود الصنف</label>
                             <input type="text" name="codeProduct" class="form-control @error('codeProduct') is-invliad @enderror"  value="{{$row->codeProduct}}" readonly>
                        </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button class="btn btn-primary">حذف</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>