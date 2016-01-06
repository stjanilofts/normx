$(function() {
	/** match heights **/


    function matchHeights() {
        heightElements = [];

        $.each($('[data-match-height]'), function(i, v) {
            var _elClass = ($(v).attr('data-match-height'));

            if($.inArray(_elClass, heightElements) == -1) {
                heightElements.push(_elClass);
            }
        });
       

        $.each(heightElements, function(a, k) {
            var largest = false;

            if(k.length > 1) {
                $.each($('.' + k), function(i, v) {
                    $(v).css({
                        height: 'auto'
                    });

                    var $h = $(v).height();

                    if (!largest || largest < $h) {
                        largest = $h;
                    }
                });

                $.each($('.' + k), function(i, v) {
                    //console.log(largest);
                    $(v).height(largest);
                });
            }
        });
    }
        
    heightsReady = false;
    $(window).load(function() {
        heightsReady = true;
        matchHeights();
    });
    $(window).resize(function() {
        if(heightsReady) {
            matchHeights();
        }
    });


    $('body').on('on-match-heights', function() {
    	alert('got it')
    	matchHeights();
    });
});