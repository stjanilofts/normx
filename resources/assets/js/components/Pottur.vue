<template>
	<div class="Page">
		<div v-if="$loadingRouteData" class="loading"><h1><i class="fa fa-cog fa-spin"></i></h1></div>
		<div v-if=" ! $loadingRouteData">
			<h1>{{ title }}</h1>
			
			{{{ content }}}

			<h3>{{ price }}</h3>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			content: 'Hér er texti um pott',
			title: 'Snorralaug',
			price: 220000,
			submenu: []
		}
	},

	route: {
		data({ to }) {
			return to;
		}
	},

	methods: {
	}
}
</script>

<style lang="stylus">
@import '../../stylus/app'
//@import '../../stylus/variables'
//@import '../../stylus/media-queries'
</style>