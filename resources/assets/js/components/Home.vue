<template>
	<div class="Home">
		<div class="Banner--container">
			<div class="Banner owl-carousel">
				<div v-for="item in banner_items" class="Banner__item" :style="{ backgroundImage: 'url(/imagecache/slick/' + item.image + ')' }">
				</div>
			</div>

			<div class="Boxes">
				<div class="Boxes__inner">
					<a class="Box" v-link="{ path: '/heitir-pottar' }">
						<span class="Box__content">
							Heitir pottar
						</span>
					</a>

					<a class="Box" href="#">
						<span class="Box__content">
							Lok á potta
						</span>
					</a>

					<a class="Box" v-link="{ path: '/kaminur' }">
						<span class="Box__content">
							Kamínur
						</span>
					</a>
				</div>
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
.Banner--container
	position relative
	lost-utility clearfix
	+small()
		padding 0
		margin 0
		line-height 1
.Boxes
	position absolute
	z-index 1000
	bottom 2em
	left 0
	right 0
	+small()
		display inline-block
		lost-utility clearfix
		left auto
		width 100%
		margin-bottom 0
		padding-bottom 0
		right auto
		bottom 0px
		z-index auto
		position relative
	.Boxes__inner
		max-width 1000px
		margin 0 auto
	.Box
		border-radius 3px
		box-shadow 1px 1px 2px rgba(0,0,0,0.2)
		text-decoration none
		&:hover
			text-decoration none
		min-height 150px
		background rgba($blue2, 0.95)
		color white
		font-size 1.6em
		font-weight bold
		margin-bottom 1em
		lost-column 1/3 3
		lost-align center
		+small()
			min-height auto
			padding-top 1em
			padding-bottom 1em
			width 100%
			display block
			text-align center
			margin-bottom 0
			lost-align reset
			lost-column 1/1 1 0px
		&__content
			padding 1em
			text-align center
</style>