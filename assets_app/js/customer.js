window.CUSTOMER = (function($) {
	return {

		handleDaftar: function() {

			$('.customer-daftar').ajaxForm({
				dataType: 'json',
				success: function(response) {
					swal({
						title: 'Konfirmasi',
						text: response.message,
						type: response.status
					}, function(isConfirm) {
						if (response.status === 'success') {
							window.location = $('.customer-daftar').attr('to_url');
						}
					});
				}
			});
		}

	}
})(jQuery);
