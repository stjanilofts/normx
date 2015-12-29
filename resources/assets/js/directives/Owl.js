import Vue from 'vue'

export default {
    //twoWay: true,
    //priority: 1000,
    //deep: true,

    params: ['items'],

    bind: function () {
        var className = 'owl-carousel';

        $(this.el).addClass(className);

        for(var i in this.params.items) {
            $(this.el).append('<div class="item"><img src="/imagecache/slick/' + this.params.items[i] + '" /></div>');
        }	

        $(this.el).on('initialize.owl.carousel', function(e) {
            console.log('initilizing');
        });

        $(this.el).on('refreshed.owl.carousel', function(e) {
            console.log('refreshed');
        });

        $(document).ready(function() {
            $('.owl-carousel').owlCarousel();
        });
    },
    update: function () {
        $('.owl-carousel').trigger('refresh.owl.carousel');
    },
    unbind: function () {
        $('.owl-carousel').trigger('destroy.owl.carousel');
    }
}