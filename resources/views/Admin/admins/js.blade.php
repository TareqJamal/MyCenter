
<script>
    $(document).ready(function () {
        $('#formAdd').on('submit', function (e) {

            var url = $(this).attr('data-action');
            e.preventDefault();
            $.ajax({
                url: url,
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if(response.success)
                    {
                        toastr.options = {
                            positionClass: 'toast-top-left',

                        };
                        toastr.success('تم تسجيل المستخدم بنجاح')
                        $('#onboardHorizontalImageModal').modal('hide');
                        myTable.ajax.reload();
                    }
                },
                error: function (xhr, status, error) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '';
                    $.each(errors, function (key, value) {
                        errorMessage += value[0] + '<br>';
                    });
                    Swal.fire({
                        icon: 'error',
                        title: '',
                        html: errorMessage,
                    });
                }
            })
        })
    });
    $(document).ready(function () {
        $('#formEdit').on('submit', function (e) {
            var url = $(this).attr('action');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            e.preventDefault();
            $.ajax({
                url: url,
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if(response.success)
                    {
                        toastr.options = {
                            positionClass: 'toast-top-left',

                        };
                        toastr.success(response.success)
                        $('#onboardHorizontalImageModal').modal('hide');
                        myTable.ajax.reload();
                    }
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '';
                    $.each(errors, function (key, value) {
                        errorMessage += value[0] + '<br>';
                    });
                    Swal.fire({
                        icon: 'error',
                        title: '',
                        html: errorMessage,
                    });
                }
            })
        })

    });
    $(document).ready(function () {
        $('#formDelete').on('submit', function (e) {
            var url = $(this).attr('data-action');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            e.preventDefault();
            $.ajax({
                url: url,
                method: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if(response.success)
                    {
                        toastr.success(response.success)
                        $('#Modal').modal('hide');
                        myTable.ajax.reload();
                    }
                },
            })
        })
    });
</script>
<script src="{{asset('')}}form-validator/jquery.form-validator.min.js"></script>
<script>
    $.validate({
        modules: 'security, date',
        lang: 'ar'
    });
</script>

