$(document).ready(function () {
    $('.select2bs4Multiple').each(function () {
        $(this).select2({
            theme: 'bootstrap4',
            multiple: true,
            allowClear: true,
            // closeOnSelect: true,
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

    $('.summernote').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            // ['font', ['strikethrough', 'superscript', 'subscript']],
            // ['fontsize', ['fontsize']],
            // ['color', ['color']],
            ['para', ['ul', 'paragraph']],
            // ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['400']],
            ['airMode', [true]],
        ]
    });

    $('.datatable').DataTable();

    $('#example1').DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "dom": 'Bfrtip',
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
