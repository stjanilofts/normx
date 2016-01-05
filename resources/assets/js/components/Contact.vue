<template>
	<div class="Page">
		<div v-if="$loadingRouteData"><h3><i class="fa fa-cog fa-spin"></i> Sæki...</h3></div>
		<div v-if=" ! $loadingRouteData">
			<div class="Page__content">
				<h1>Hafa samband</h1>

				<basic-form></basic-form>
			</div>
		</div>
	</div>
</template>

<script>
import BasicForm from './_BasicForm.vue';

export default {
	data() {
		return {
		}
	},

	components: {
		BasicForm
	}
}
</script>

<style lang="stylus">
@import '../../stylus/variables'
</style>