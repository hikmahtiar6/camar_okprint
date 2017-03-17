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
        },

		getAntrian: function() {
			var custID = $('input[name="cust_id"]').val();

			$.ajax({
				type: 'POST',
				url: APP.siteUrl+'customer/get_antrian',
				data: {
					cust_id: custID
				},
				success: function(response) {
					var response = JSON.parse(response);
					$('input[name="nama"]').val(response.nama);
					$('input[name="antrian"]').val(response.antrian);
				}
			});

			return false;
		}

    }
})(jQuery);
