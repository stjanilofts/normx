<template>
	<div>
		<div class="Page">
			<div v-if="$loadingRouteData" class="loading"><h1 style="text-align: center;"><i class="fa fa-cog fa-spin"></i></h1></div>
			<div v-if=" ! $loadingRouteData" class="Page__content">
				<h1>{{ title }}</h1>
			
				{{{ content }}}
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			content: '',
			title: '',
			submenu: []
		}
	},

	route: {
		data({ to }) {
			return this.update();
		}
	},

	methods: {
		update() {
			return this.$http.get('/api/page/' + this.$route.params.any, function(data) {
				this.$set('content', data.cmscontent);
				this.$set('submenu', data.submenu);
				this.$set('title', data.title);
			});
		}
	}
}
</script>

<style lang="stylus">
@import '../../stylus/app'
@import '../../stylus/media-queries'

.Page
	padding 1em
	lost-utility clearfix
	min-height 400px
	&__content
		max-width 800px
		margin 0 auto
	figure
		padding 0
		margin 0
		display inline-block
		max-width 400px
		height auto !important
		a
			display inline-block
			width 100%
		img
			padding 0
			margin 0
			vertical-align top
			width 100% !important
			height auto !important
		&.righter
			float right
			margin-left 1em
		&.lefter
			float left
			margin-right 1em
		&.lefter, &.righter
			+large()
				max-width 300px
			+small()
				margin 0 !important
				margin-bottom 1em !important
				width 100%
				display block
				max-width none !important
</style>