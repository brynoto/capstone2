$('[name="category"]').click(function() {
	$.get('controllers/filter_sort.php?category='+(this).val(), function(data) {
		$('#productlist').html(data);
	});
});

$('#sort').change(function() {
	$.get('controllers/filter_sort.php?sort='+$(this).val()+'&order='+$('#order').val(), function(data) {
		$('#productlist').html(data);
	});
});

$('#order').change(function() {
	$.get('controllers/filter_sort.php?order='+$(this).val()+'&sort='+$('#sort').val(), function(data) {
		$('#productlist').html(data);
	});
});