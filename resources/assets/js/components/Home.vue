<template>
	<div class="Home">
		<div class="Banner owl-carousel">
			<div v-for="item in banner_items" class="Banner__item" :style="{ backgroundImage: 'url(/imagecache/slick/' + item.image + ')' }">
			</div>
		</div>

		<slider></slider>
	</div>
</template>

<script>
import Slider from './Slider.vue';

export default {
	data() {
		return {
			banner_items: []
		}
	},

	components: {
		Slider
	},

	route: {
		activate(transition) {
			var self = this;

			this.update_banner().then(function() {
				setTimeout(function() {
					transition.next();
				}, 0)
			});
		},
		data(transition) {
			transition.next();
		},
		canReuse(transition) {
			transition.abort();
		}
	},

	ready() {
		($(function() {
			$('.Banner').owlCarousel({
				loop: true,
				nav: false,
				dots: false,
				loop: true,
				items: 1
			});
		}))
	},

	methods: {
		update_banner() {
			return this.$http.get('/api/banner/', function(data) {
				this.$set('banner_items', data);
			});
		}
	}
}
</script>

<style lang="stylus">
@import '../../stylus/app'

.Banner
	&__item
		background-size cover
		background-position center center
		min-height 400px
		height 60vw
		max-height 800px
		width 100%
</style>