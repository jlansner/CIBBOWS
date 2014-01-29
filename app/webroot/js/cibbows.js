$(document).ready(function () {
    $('body').on('click', '.showMenu', function (event) {
        event.preventDefault();
        $(this).siblings('ul').slideToggle();
    });

    $('#raceTabs').tabs();
    $('#profileTabs').tabs();
//    adjustWidth();

	$('body').on('click', '.liabilityLink', function(event) {
		event.preventDefault();
		$('.liabilityWaiver').show();
	});

	$('body').on('click', '.liabilityClose', function(event) {
		event.preventDefault();
		$('.liabilityWaiver').hide();
	});
	
	$('body').on('click', '.phoneMenuLink', function(event) {
		$('.phoneMenu').toggle();
	});

	$('body').on('tap', '.phoneMenuLink', function(event) {
		$('.phoneMenu').toggle();
	});

});

function adjustWidth() {

    if ($(window).width() > 599) {

        $(".navMenu li").each(function () {

            if ($(this).parent().css('display') == 'none') {
                $(this).parent().show();
                var hidden = true;
            }

            var $width = $(this).width();

            var power = 8;
            var size = (Math.pow(2, power) * .1);
            $(this).css('font-size', size + 'em');
            var adjustment = 0;

            for (i = power; i >= 0; i--) {
                if (i == 0) {
                    adustment = .1;
                } else {
                    adjustment = Math.pow(2, i - 1) * .1;
                }

                if ($(this).children('a').width() == $width) {
                    break;
                } else if ($(this).children('a').width() < $width) {
                    if (i > 0) {
                        size = size + adjustment;
                    }
                } else {
                    size = size - adjustment;
                }

                $(this).css('font-size', size + 'em');
            }


            var letterSpacing = parseFloat($(this).children('a').css('letter-spacing'));

            while ($(this).children('a').width() < $width) {
                $(this).children('a').css('letter-spacing', letterSpacing + 'px');

                if ($(this).children('a').width() > $(this).width()) {
                    $(this).children('a').css('letter-spacing', (letterSpacing - 0.5) + 'px');
                    break;
                } else {
                    letterSpacing += 0.5;
                }
            }

            if (hidden) {
                $(this).parent().hide();
            }
        });
    }
}