(function ($) {
	//addthis config
	var addthis_config = {"data_track_addressbar":true};
	
	///////////////////
	// _trackDownloads
	$(document).ready(function() {
		$("body").removeClass("no-js");
		
		// helper function - allow regex as jQuery selector
		$.expr[':'].regex = function(e, i, m) {
			var mP = m[3].split(','),
			l = /^(data|css):/,
			a = {
				method: mP[0].match(l) ? mP[0].split(':')[0] : 'attr',
				property: mP.shift().replace(l, '')
			},
			r = new RegExp(mP.join('').replace(/^\s+|\s+$/g, ''), 'ig');
			return r.test($(e)[a.method](a.property));
		};
		$('a:regex(href,"\\.(zip|mp\\d+|mpe*g|pdf|docx*|pptx*|xlsx*|jpe*g|png|gif|tiff*)")$').live('click', function(e) {
			_gaq.push(['_trackEvent', 'download', 'click', this.href.replace(/^.*\/\//, '')]);
		});

		///////////////////
		// _trackMailTo
		$('a[href^="mailto"]').live('click', function(e) {
			_gaq.push(['_trackSocial', 'email', 'send', this.href.replace(/^mailto:/i, '')]);
		});

		///////////////////
		// _trackOutbound
		$('a[href^="http"]:not([href*="//' + location.host + '"])').live('click', function(e) {
			_gaq.push(['_trackEvent', 'outbound', 'click', this.href.match(/\/\/([^\/]+)/)[1]]);
		});

		//Track any specified events. 
		$( 'a[data-event]' ).live('click', function(e){            
			_gaq.push(['_trackEvent', 'special tracking', $(this).attr('data-event'), $(this).attr('href')]);					
		});
				
		///////////////////
		// _remove empty row if it exists
		$(".contact-info .fn.org").each(function(index) {
			if($(this).text() == ""){
				var killfirstbr = $(this).parent().html().replace("<br>", '');
				$(this).parent().html(killfirstbr);
			}
		});
	});
	
	$(window).load(function() {
		$(".footerLinkFoley .fn.org").click(function(e) {
			if(e.target.innerHTML.indexOf("Emerging Enterprise")>= 0) {
				window.open('http://www.emergingenterprisecenter.com');
			} else {
				window.open('http://www.foleyhoag.com');
			}
		});
	});	

})(jQuery);
