(function ($) {
	
	$(document).find('input[placeholder], textarea[placeholder]').each(function() {
		var el = $(this),
			placeholder = el.attr('placeholder');
		el.removeAttr('placeholder');
		if(placeholder) {
			el
			.addClass('placeholder')
			.val(placeholder)
			.focusin(function() {
				if (el.val() === '' || el.val() === placeholder) {
					el
					.removeClass('placeholder')
					.val('');
				}
			})
			.focusout(function() {
				if (el.val() === '') el.addClass('placeholder').val(placeholder);
			});
	
		}
	});

})(jQuery);
