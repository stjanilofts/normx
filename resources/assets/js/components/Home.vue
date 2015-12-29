<template>
	<div class="Home">
		<div class="Banner owl-carousel">
			<div v-for="item in banner_items" class="Banner__item" :style="{ backgroundImage: 'url(/imagecache/slick/' + item + ')' }">
			</div>
		</div>

		<div class="Slider--container">
			<div class="Slider owl-carousel">
				<div class="Slider__item" v-for="item in slider_items">
					<div class="Slider__left">
						<img :src="'/imagecache/slideset/' + item" />
					</div>
					<div class="Slider__right">
						<h4>Nafn á potti</h4>
						<p>Raworin awoirna wirona w<br>faii awrioawnr aiown <br>rwanroiawnrnoiawrn</p>
						<a href="#" class="Button Button--alt">Sjá meira</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			banner_items: [],
			slider_items: []
		}
	},

	beforeCompile() {
		this.banner_items = ['1.jpg', '2.jpg', '3.jpg'];
		this.slider_items = ['1.jpg', '2.jpg', '3.jpg'];
	},

	route: {
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

			$('.Slider').owlCarousel({
				nav: false,
				dots: false,
				loop: true,
				items: 2,
				responsive: {
					0: {
						items: 1
					},
					480: {
						items: 2
					}
				}
			});
		}))
	},

	methods: {
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

.Slider--container
	padding 1em
	background #EEE url('/img/vatn2.jpg')
.Slider
	max-width $max-width
	margin 0 auto
	&__item
		color white
		padding 1em
		h4
			line-height 1
			color white
			padding 0
			padding-bottom 0.5em
			margin 0
		lost-utility clearfix
	&__left, &__right
		lost-column 1/2
		+large()
			h4
				padding-top 0.5em
			lost-column 1/1
</style>