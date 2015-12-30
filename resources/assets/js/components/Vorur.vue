<template>
	<div>
		<div class="Products">
			<div v-if="$loadingRouteData" class="loading"><h1><i class="fa fa-cog fa-spin"></i></h1></div>
			<div v-if=" ! $loadingRouteData">

				<div class="Products__content">
					<h1>{{ product.title }}</h1>

					<img :src="'/imagecache/product/' + product.images[0].name" />
					
					{{{ product.content }}}

					<h3>{{ product.price }}</h3>

					<fyrirspurn></fyrirspurn>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import Fyrirspurn from './Fyrirspurn.vue';

export default {
	data() {
		return {
			product: []
		}
	},

	components: {
		Fyrirspurn,
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

.Products
	padding 1em
	lost-utility clearfix
	min-height 400px
	&__content
		max-width 1000px
		margin 0 auto
</style>