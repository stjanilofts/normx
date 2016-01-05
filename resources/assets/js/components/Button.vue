<template>
	<a class="Button" :href="'/#!' + path">
		{{ title }}
	</a>
</template>

<script>
export default {
	props: ['path', 'title'],

	data() {
		return {
		}
	},

	ready() {
	}
}
</script>

<style lang="stylus">
@import '../../stylus/variables'

.Button
	text-decoration none !important
	font-size 1em !important
	display inline-block !important
	line-height 1.5em !important
	border none !important
	background $blue
	padding 0.5em 2em !important
	color white !important
	text-transform uppercase !important
	font-weight bold !important
	text-align center !important
	transition background 0.2s !important
	&:hover, &:focus, &:active
		transition background 0.2s !important
		background $blue-dark
	&--alt
		background white
		color $blue !important
		&:hover, &:focus, &:active
			transition background 0.2s !important
			background #EEE
	&--small
		font-size 0.8em !important
		padding 0.25em 1em !important
</style>