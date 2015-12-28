<script>
	$('button#delete').on('click', function(e){
		e.preventDefault();
		var form = $(this).closest('form');
		var title = $(this).data('title');
		swal({
			title: title,
			text: "You will not be able to recover it!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "No, cancel please!",
			closeOnConfirm: false,
			closeOnCancel: false
		},
		function (confirmed) {
			if (confirmed) {
				form.submit();
				swal({  
					title: 'Deleted',
					text: 'The selected record has been deleted',
					type: 'success',
					timer: 1700,
					showConfirmButton: false
				});
			} else {
				swal({  
					title: 'Cancelled',
					text: 'Your record is safe',
					type: 'error',
					timer: 1700,
					showConfirmButton: false
				});
			}
		});
	});
</script>