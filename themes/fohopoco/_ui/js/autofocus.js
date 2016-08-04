$(document).ready(function() {
	var inputs = $('input, textarea');

	inputs
	.focusin(function() {
		$(this).addClass('focus');
	})
	.focusout(function() {
		$(this).removeClass('focus');
	});
});
