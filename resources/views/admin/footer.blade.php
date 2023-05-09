<!-- jQuery -->
<!-- <script src="template/admin/plugins/jquery/jquery.min.js"></script> -->
<script src="{{asset('template/admin/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->
<!-- <script src="template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="{{asset('template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- AdminLTE App -->
<!-- <script src="template/admin/dist/js/adminlte.min.js"></script> -->
<script src="{{asset('template/admin/dist/js/adminlte.min.js')}}"></script>
<script src="/template/admin/js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.choose').on('change', function() {
            let action = $(this).attr('id');
            let malop = $(this).val();
            let _token = $('input[name = "_token"]').val();
            var result = '';
            if (action == 'lop') {
                result = 'hs'
            }
            $.ajax({
                url: '/admin/tution/add2',
                method: 'POST',
                data: {
                    action: action,
                    malop: malop,
                    _token: _token,
                },
                success: function(data) {
                    let hs = '';
                    for (let i = 0; i < data.length - 1; i++) {
                        hs += data[i];

                    }
                    $('#' + result).html(hs);
                    $('#hp').val(data[data.length - 1]);
                    console.log(data);
                }
            });

        });

    })
</script>