<!-- Plugins JS -->
<script src="{{asset('assets/customer/js/plugins.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('assets/customer/js/main.js')}}"></script>
{{--cnd thư viện sweetalert có function Swal.mixin để hiển thị thông báo--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
<script>
    {{-- giống như csrf ->tạo ra 1 input có value là token và hidden, gg chỉ như vậy   --}}
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $('#register').click(function (e) {
            e.preventDefault();
            $('.alert-danger').remove();
            $('.alert-success').remove();
            $.ajax({
                type: "post",
                url: "/customer/signup",
                data: {
                    last_name: $("input[name=last_name]").val(),
                    first_name: $("input[name=first_name]").val(),
                    email: $("#signupModalCenter input[name=email]").val(),
                    password: $("#signupModalCenter input[name=password]").val(),
                },
                dataType: "json",
                success: function (data) {
                    if (typeof data.errors !== "undefined") {
                        jQuery.each(data.errors, function (key, value) {
                            $('.notify').show();
                            $('.notify').append('<div class="alert error-signup alert-danger"><p>' + value + '</p></div>');
                        });
                    } else {
                        console.log(data.success);
                        $('.notify').show();
                        $('.notify').append('<div class="alert alert-success"><p>' + data.success + '</p></div>');
                        $("#form-signup")[0].reset();
                    }
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
            @if(Session:: has('fail'))
{{--        thư viện hổ trợ hiển thị mockup    --}}
        const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        Toast.fire({
            type: 'error',
            title: '{{ Session:: get('fail') }}'
        });
            @endif
            @if(Session:: has('success'))
        const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        Toast.fire({
            type: 'success',
            title: '{{ Session:: get('success') }}'
        });
        @endif
        @if(Session:: has('login'))
        Swal.fire({
            type: 'success',
            title: '{{ Session:: get('login') }}',
            showConfirmButton: false,
        });
        @endif

            @if(Session:: has('wrong'))
        const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        Toast.fire({
            type: 'wrong',
            title: '{{ Session:: get('wrong') }}'
        });
        @endif

    });
</script>
