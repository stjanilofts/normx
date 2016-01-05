<template>
	<div>
		<div v-if="$loadingRouteData" class="loading">
			<div class="Product">
				<div class="Product__container">
					<center><h1><i class="fa fa-cog fa-spin"></i></h1></center>
				</div>
			</div>
		</div>
		<div v-if=" ! $loadingRouteData">
			<div class="Product">
				<div class="Product__container">
					<h1>{{ product.title }}</h1>
					
					<div>
						<div class="Product__left">
							<img :src="'/imagecache/product/' + product.images[0].name" />
						</div>

						<div class="Product__right">
							<div class="inner">
								<h3>Lýsing</h3>
								{{{ product.content }}}
							</div>
						</div>
					</div>

					<div class="Product__full">
						<fyrirspurn :baseprice="product.price"></fyrirspurn>
					</div>
				</div>
			</div>
		</div>

		<slider></slider>
	</div>
</template>

<script>
import Fyrirspurn from './Fyrirspurn.vue';
import Slider from './Slider.vue';

export default {
	data() {
		return {
			product: []
		}
	},

	components: {
		Fyrirspurn,
		Slider
	},

	route: {
		data({ to }) {
			return this.getProduct();
		}
	},

	ready() {
	},

	methods: {
		getProduct() {
			return this.$http.get('/api/product/' + this.$route.params.any, function(data) {
				this.$set('product', data);
			});
		}
	}
}
</script>

<style lang="stylus">
@import '../../stylus/app'
//@import '../../stylus/variables'
//@import '../../stylus/media-queries'

.Product
	h1
		font-size 3em
		font-weight bold
		text-align center
		margin-bottom 1em
	padding 1em
	lost-utility clearfix
	min-height 400px
	&__container
		max-width 1000px
		margin 0 auto
	&__left
		lost-column 1/2 2 0px
		+small()
			lost-column 1/1 1 0px
		img
			width 100%
	&__right
		font-size 1.2em
		+small()
			lost-column 1/1 1 0px
		.inner
			padding 1em
		h3:first-of-type
			margin-top 0
			padding-top 0
		lost-column 1/2 2 0px
	&__full
		lost-column 1/1 1 0px
</style>