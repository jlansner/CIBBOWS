$(document).ready(function () {
    $('body').on('click', '.showMenu', function (event) {
        event.preventDefault();
		if ($(this).siblings('ul').hasClass('open')) {
	        $(this).siblings('ul').slideUp().removeClass('open');			
		} else {
	        $('.navMenu .open').slideUp().removeClass('open');
	        $(this).siblings('ul').slideDown().addClass('open');
	   }
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
	
	$('body').on('change', '.registerAge', function(event) {
		var age;
		var raceYear = $('#RaceDate').val().substr(0,4);
		var raceMonth = $('#RaceDate').val().substr(5,2);
		var raceDay = $('#RaceDate').val().substr(8,2);
		
		if ($('#UserDobYear').val() > 0) {
			age = raceYear - $('#UserDobYear').val();
			
			if (($('#UserDobMonth').val() > raceMonth) || (($('#UserDobMonth').val() == raceMonth) && ($('#UserDobDay').val() > raceDay))) {
				age--;
			} 
		} else {
			age = 0;
		} 
		
		$('#RaceRegistrationAge').val(age);
		$('.ageRaceDay').html(age);
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