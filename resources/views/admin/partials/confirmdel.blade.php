    <script> 
        $(document).on('click', '#delete-btn', function(e) {
            e.preventDefault();
            var link = $(this);
            swal({
                title: "Confirm Delete",
                text: "Are you sure? Item can not be restored later.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: true
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = link.attr('href');
                }
                else {
                    swal("Cancelled","Category deletion cancelled", "error");
                }
            });
        });
    </script>