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
					
					<div style="margin-bottom: 2em; display: inline-block; width: 100%;">
						<div class="Product__left">
							<img :src="'/imagecache/product/' + product.images[0].name" />
						</div>

						<div class="Product__right">
							<div class="inner">
								<h3><strong>Lýsing</strong></h3>
								{{{ product.content }}}
								<strong>Verð {{ price(product.price) }}</strong>
							</div>
						</div>
					</div>

					<div class="Product__full">
						<fyrirspurn :product="product"></fyrirspurn>
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
		},

		price(x) {
			var parts = x.toString().split(".");
			parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
			return parts.join(".") +  ',- kr.';
		}
	}
}
</script>

<style lang="stylus">
@import '../../stylus/app'
//@import '../../stylus/variables'
//@import '../../stylus/media-queries'

.Product
	background url('/img/top1grad.jpg') top center no-repeat
	background-size 100%
	h1
		font-size 3em
		font-weight bold
		text-align center
		margin-bottom 1em
	lost-utility clearfix
	margin 0 auto
	padding-bottom 1em
	&__container
		border-radius 8px
		border 4px solid $blue2
		+large()
			border-radius 0px
			border 0px solid $blue2
		lost-utility clearfix
		background white
		padding 1em
		min-height 600px
		max-width 1200px
		margin 0 auto
		margin-top 3em
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
			padding-left 1em
			+small()
				padding-top 1em
				padding-left 0 !important
		h3:first-of-type
			margin-top 0
			padding-top 0
		lost-column 1/2 2 0px
	&__full
		lost-column 1/1 1 0px
</style>