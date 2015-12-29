<template>
	<div class="container--slideset" v-if="items">
		<h3 v-if="title">{{ title }}</h3>

		<div v-cloak class="Slideset">
			<div v-for="item in items" class="Slideset__item">
				<div class="Slideset__left">
					<img :src="'/imagecache/slideset/' + item" />
				</div>
				<div class="Slideset__right">
					<h4>Nafn á potti</h4>
					<p>Raworin awoirna wirona w<br>faii awrioawnr aiown <br>rwanroiawnrnoiawrn</p>

					<a href="#" class="Button Button--alt">Sjá meira</a>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: ['items', 'title'],

	data() {
		return {
		}
	},
	

	attached() {
		console.log('slideset attached');
		
		if(jQuery('.Slideset').hasClass('slick-initialized')) {
			jQuery('.Slideset').slick('unslick');
		}
	},

	ready() {
		this.onUpdate();
		console.log('slideset ready');
	},

	methods: {
		onUpdate() {
			jQuery('.Slideset').slick({
				slidesToShow: 2,
				arrows: true,
				slidesToScroll: 1,
				autoplay: true,
				dots: true,
				autoplaySpeed: 2000,
				responsive: [
					{
						breakpoint: 1500,
						settings: {
							arrows: false,
							dots: false,
							slidesToShow: 2
						}
					},
					{
						breakpoint: 800,
						settings: {
							arrows: false,
							slidesToShow: 1,
							dots: false
						}
					}
				]
			});
		}
	}
}
</script>

<style lang="stylus">
@import '../../stylus/media-queries'

.container--slideset
	padding 1em
	h3
		padding 0
		margin 0
		padding-bottom 1em
		text-align center
		color white
	display block
	background #EEE url('/img/vatn2.jpg')
	clear both

.Slideset
	max-width $max-width
	margin 0 auto
	&__item
		padding 1em
		h1, h2, h3, h4, h5, h6
			color white
			padding-top 0
			margin-top 0
		color white
		font-weight bold
		/*background rgba(0,0,0,0.5)*/
		text-align center
		img
			width 100%
	&__left, &__right
		outline 2px solid red
		h4
			margin 0
			padding 0
			text-align left
		lost-column 1/2 2
		+large()
			lost-column 1/1 1
	&__right
		text-align left
	&__left
		text-align right
[v-cloak]
	display none
</style>