@extends('Admin.layout.index')
@section('title')
    Admins
@endsection
@section('content')
        <button type="button" id="add" class="btn btn-success mb-2">New Admin</button>
    <div class="card">

        <div class="card-datatable table-responsive pt-0">
            <table id="dataTable" class="datatables-basic table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>البريد الالكتروني</th>
                    <th>رقم الهاتف</th>
                    <th>الصورة</th>
                    <th>الاجراء</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var myTable;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(function () {
            myTable = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admins.index') }}",
                columns: [

                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'image', name: 'image'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {
                        data: 'actions', name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ],
                language: {
                    {{--"sProcessing": "{{trans('dataTable.sProcessing')}}",--}}
                    {{--"sLengthMenu": "{{trans('dataTable.sLengthMenu')}}",--}}
                    "sZeroRecords": "لا يوجد بيانات",
                    {{--"sInfo": "{{trans('dataTable.sInfo')}}",--}}
                    {{--"sInfoEmpty": "{{trans('dataTable.sInfoEmpty')}}",--}}
                    {{--"sInfoFiltered": "{{trans('dataTable.sInfoFiltered')}}",--}}
                    {{--"sInfoPostFix": "",--}}
                    "sSearch": "بحث",
                    {{--"sUrl": "",--}}
                    "oPaginate": {
                        "sFirst": "{{trans('dataTable.sFirst')}}",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "{{trans('dataTable.sLast')}}"
                    },
                },
                buttons: [
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [1,3,4], // Column index which needs to export
                        }
                    }
                ],
            });

        });
        {{--$('#dataTable').on('click','#btnDelete',function() {--}}
        {{--    var adminId = $(this).data('id');--}}
        {{--    var url = "{{route('admins.destroy','adminId')}}"--}}
        {{--    url = url.replace('adminId',adminId);--}}
        {{--    var csrfToken = $('meta[name="csrf-token"]').attr('content');--}}
        {{--    $.ajax({--}}
        {{--        url: url,--}}
        {{--        method: 'Delete',--}}
        {{--        headers: {--}}
        {{--            'X-CSRF-TOKEN': csrfToken--}}
        {{--        },--}}
        {{--        success: function (response) {--}}
        {{--            $('.modal-body').html(response.html);--}}
        {{--            $('#Modal').modal('show');--}}
        {{--            $('#ModalLabel').text('حذف المستخدم');--}}
        {{--            $('#Modal .modal-dialog').removeClass('modal-lg modal-xl modal-sm modal-dialog-centered').addClass('modal-dialog-centered')--}}
        {{--            // toastr.success(response.success)--}}
        {{--            // myTable.ajax.reload();--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
        {{--$('#dataTable').on('click','#btnEdit',function() {--}}
        {{--    var adminId = $(this).data('id');--}}
        {{--    var url = "{{route('admins.edit',':adminId')}}"--}}
        {{--    url = url.replace(':adminId',adminId);--}}
        {{--    $.ajax({--}}
        {{--        url: url,--}}
        {{--        success: function (response) {--}}
        {{--            $('.modal-body').html(response.html);--}}
        {{--            $('#Modal').modal('show');--}}
        {{--            $('#ModalLabel').text('تعديل المستخدم');--}}
        {{--            $('#Modal .modal-dialog').removeClass('modal-lg modal-xl modal-sm modal-dialog-centered').addClass('modal-lg')--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
        $("#add").on('click', function () {
            $.ajax({
                url: "{{ route('admins.create')}}",
                success: function (response) {
                    $('.body').html(response.html);
                    $('#onboardHorizontalImageModal').modal('show');
                    // $('.modal-title').text('اضف مستخدم جديد');
                    // $('#basicModal .modal-dialog').removeClass('modal-lg modal-xl modal-sm modal-dialog-centered').addClass('modal-lg')
                }
            });
        });
    </script>
@endsection
