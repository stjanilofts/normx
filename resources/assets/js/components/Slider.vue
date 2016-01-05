<template>
	<div class="Home">
		<div class="Slider--container">
			<h2>Pottar og laugar</h2>
			<div class="Slider owl-carousel">
				<div class="Slider__item" v-for="item in slider_items">
					<div class="Slider__left">
						<img :src="'/imagecache/slideset/' + item.image" />
					</div>
					<div class="Slider__right">
						<h4>{{ item.title }}</h4>
						<p>{{ item.content }}</p>
						<button v-link="{ path: 'vorur/' + item.slug }" class="Button Button--alt">Sjá meira</button>
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
			slider_items: []
		}
	},

	ready() {
		var self = this;

		self.update_slider().then(function() {
			setTimeout(function() {
				($(function() {
					$('.Slider').owlCarousel({
						autoplay: true,
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
					})
				}))
			}, 0)
		});
	},

	methods: {
		update_slider() {
			return this.$http.get('/api/slider/', function(data) {
				this.$set('slider_items', data);
				//console.log('updated slider');
			});
		}
	}
}
</script>

<style lang="stylus">
@import '../../stylus/app'

.Slider--container
	padding 2em
	background #EEE url('/img/vatn2.jpg')
	h2
		font-weight bold
		padding-top 0
		margin-top 0
		text-align center
		color white
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
		img
			border-radius 8px
			border 4px solid $blue2
			overflow hidden
			display inline-block
		lost-column 1/2
		+large()
			h4
				padding-top 0.5em
			lost-column 1/1
</style>