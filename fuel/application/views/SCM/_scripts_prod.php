<script>
    $(function () {
        $('#example1').DataTable();
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        });
        $('.delete').click(function () {
            var id = $(this).attr('data-value');
            if (confirm("Are you sure want to delete this item.")) {
                $.ajax({
                    url: '<?php echo site_url('scm/Products/delete'); ?>',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.result === 'success') {
                            document.location.reload();
                        }
                    }
                });
            }
        });
        $('.view').click(function () {
            var id = $(this).attr('data-value');
            $.ajax({
                url: '<?php echo site_url('scm/Products/view'); ?>',
                type: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function (data) {
                    $('#view_name').val(data.Name);
                    $('#view_description').val(data.Description);
                    var active = data.Active === '1' ? 'Yes' : 'No';
                    $('#view_active').val(active);
                    if (data.Image !== '' && data.Image !== null) {
                        var url = "<?php echo base_url(); ?>/uploads/p02/" + data.Image + '.' + data.Ext;
                        $('#view_image').attr('src', url);
                    }
                    $('#view_btn').click();
                    return false;
                }
            });
        });

        $('.edit').click(function () {
            var id = $(this).attr('data-value');
            $('#edit_id').val(id);
            $.ajax({
                url: '<?php echo site_url('scm/Products/view'); ?>',
                type: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function (data) {
                    $('#edit_name').val(data.Name);
                    $('#edit_description').val(data.Description);
                    console.log(data.Active);
                    if (data.Active === '1') {
                        $('#edit_active_yes').attr('checked', true);
                    } else {
                        $('#edit_active_no').attr('checked', true);
                    }

                    if (data.Image !== '' && data.Image !== null) {
                        var url = "<?php echo base_url(); ?>/uploads/p02/" + data.Image + '.' + data.Ext;
                        $('#edit_image').attr('src', url);
                    }
                    $('#edit_btn').click();
                    return false;
                }
            });
        });

        $('.flip').click(function (e) {
            var currentTarget = $(this);
            var currentStatus = $(this).attr('data-status');
            var flippedStatus = currentStatus === 'Yes' ? 'No' : 'Yes';
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url('scm/Products/changestatus'); ?>',
                type: 'POST',
                data: {
                    id: $(this).attr('data-value'),
                    status: currentStatus === 'Yes' ? 0 : 1
                },
                dataType: 'json',
                success: function (data) {
                    if (data.result === "success") {
                        $(currentTarget).attr('data-status', flippedStatus);
                        $(currentTarget).parent().prev().html(flippedStatus);
                    }
                    return false;
                }
            });
        });
    });
</script>
</body>
</html>