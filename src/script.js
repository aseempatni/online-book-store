// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#qterm').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'hints.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#hints').show();
				$('#hints').html(data);
			}
		});
	} else {
		$('#hints').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#qterm').val(item);
	// hide proposition list
	$('#hints').hide();
	viewbook();
	// $("#queryForm").submit()
}
