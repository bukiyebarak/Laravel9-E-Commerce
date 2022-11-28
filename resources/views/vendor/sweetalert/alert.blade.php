<script src="{{ asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
@if (Session::has('alert.config'))
    <script>
        Swal.fire({!! Session::pull('alert.config') !!});
        // Swal.fire({title: "Deleted!",
        //     text: "The record been deleted!",
        //     showConfirmButton: true,
        //     type: "success"
        // });
    </script>
@endif
