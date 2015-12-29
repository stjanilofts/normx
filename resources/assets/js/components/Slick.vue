<template>
	<div v-cloak class="Slick" v-if="items">
		<div v-for="item in items" class="Slick__item"
			 :style="{ backgroundImage: 'url(/imagecache/slick/' + item + ')' }">
		</div>
	</div>
</template>

<script>
export default {
	props: ['items'],

	data() {
		return {
		}
	},

	ready() {
		console.log('slick ready');
		//this.onUpdate();
	},

	attached() {
		console.log('slick attached');
		
		if(jQuery('.Slick').hasClass('slick-initialized')) {
			jQuery('.Slick').slick('unslick');
		}
	},

	ready() {
		this.onUpdate();
		console.log('slick ready');
	},

	methods: {
		onUpdate() {
			jQuery('.Slick').slick({
				fade: true,
				arrows: false,
				dots: false,
				pauseOnHover: false,
				autoplay: true,
				autoplaySpeed: 3000
			});
		}
	}
}
</script>

<style lang="stylus">
.Slick
	&__item
		background-size cover
		background-position center center
		background-repeat no-repeat
		width 100%
		height 60vw
		max-height 800px
		min-height 500px
[v-cloak]
	display none
</style>