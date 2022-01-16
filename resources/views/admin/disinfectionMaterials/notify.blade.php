@if ($errors->any())
    <div class="alert alert-danger">
        <ul> @foreach ($errors->all() as $error)
                <li>{{ $error }}</li> @endforeach </ul>
    </div>

@endif



{{-- Add --}}

@if (session()->has('Add'))
    <script>
        window.onload = function () {
            notif({
                msg: "تم الاضافه بنجاح"
                , type: "success"
            })
        }
    </script>

@endif
{{-- Edit --}}

@if (session()->has('Edit'))
    <script>
        window.onload = function () {
            notif({
                msg: "تم التعديل بنجاح"
                , type: "success"
            })
        }
    </script>

@endif {{-- delete --}}

@if (session()->has('danger'))
    <script>
        window.onload = function () {
            notif({
                msg: "تم الحذف بنجاح"
                , type: "error"
            })
        }
    </script> @endif
