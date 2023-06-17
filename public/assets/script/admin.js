$(document).ready(function () {
    $('.select2bs4Multiple').each(function () {
        $(this).select2({
            theme: 'bootstrap4',
            multiple: true,
            allowClear: true,
            closeOnSelect: true,
            placeholder: {
                text: $(this).data('placeholder'),
            },
            dropdownParent: $(this).parent(),
        });
    })
    $('.select2bs4').each(function () {
        $(this).select2({
            theme: 'bootstrap4',
            placeholder: {
                text: $(this).data('placeholder'),
            },
            dropdownParent: $(this).parent(),
        });
    })

    $('.datatable').dataTable();
    $('.datatable-component').dataTable({
        searching: false,
        lengthMenu: [5],
    });

    $('#datatable').dataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    })

    $('.edit-panitia-button').each(function () {
        $(this).on('click', function () {
            id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/koordinator/api/panitia",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function (user) {
                    $('#edit-id').val(user.id)
                    $('#edit-name').val(user.name)
                    $('#edit-username').val(user.username)
                    $('#edit-phone').val(user.phone)
                    $('#edit-email').val(user.email)
                }
            });
        });
    });

    $('#editPanitiaModal').on('hidden.bs.modal', function () {
        $('#editPanitiaModal form')[0].reset();
    });

    $('#edit-peserta-button').on('click', function () {
        $('#edit-user-id').val($(this).val());
    })

    $('#guardName').on('change', function () {
        val = $(this).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/api/permission/guard",
            data: {
                guard_name: val
            },
            dataType: "JSON",
            success: function (response) {
                $('#permissionName').html('');
                $.each(response, function (permisIndex, permisVal) {
                    $('#permissionName').append('<option value="' + permisVal.name + '">' + permisVal.name + '</option>')
                });
            }
        });
    });
});
