window.CUSTOMER = (function($) {
	return {

		handleDaftar: function() {

			$('.customer-daftar').ajaxForm({
				dataType: 'json',
				success: function(response) {
					swal(response.message,"", response.status);
					
					if(response.status == 'success') {
                        window.location = $('.customer-daftar').attr('to_url');
                    }

				}
			});
		}

	}
})(jQuery);