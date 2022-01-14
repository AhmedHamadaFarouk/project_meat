
    {{-- error --}}
    @if ($errors->any())
        <script>
            window.onload = function() {
                notif({
                    msg: `
      <p>
          @foreach ($errors->all() as $error)
              <span>{{ $error }}</span>
          @endforeach
      </p>
  `,
                    type: "error"
                })
            }
        </script>
    @endif

    {{-- Add --}}
    @if (session()->has('Add'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم الاضافه بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif



    {{-- Edit --}}

    @if (session()->has('Edit'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم التعديل بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif


    {{-- delete --}}

    @if (session()->has('danger'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم الحذف بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif
