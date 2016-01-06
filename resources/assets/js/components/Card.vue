<template>
	<div class="Card">
		<div class="Card__image">
			<a v-link="{ path: '/' + item.path }"><img :src="'/imagecache/card/' + item.image" /></a>
		</div>
		<div class="Card__content">
			<a v-link="{ path: '/' + item.path }"><h3>{{ item.title }}</h3></a>
			
			<span>{{ item.short }}</span>
		</div>
	</div>
</template>

<script>
import Btn from './Button.vue';

export default {
	props: ['item'],

	data() {
		return {
		}
	},

	components: {
		Btn
	},

	ready() {
	}
}
</script>

<style lang="stylus">
@import '../../stylus/app'

.Card
	box-sizing border-box
	border-radius 8px
	border 4px solid $blue2
	a
		color $blue2
		text-decoration none
		&:hover
			text-decoration none
	lost-waffle 1/2 2 1em
	&__image
		border-top-left-radius 8px
		border-top-right-radius 8px
		vertical-align top
		padding 0
		margin 0
		line-height 1
		img
			border-top-left-radius 8px
			border-top-right-radius 8px
			width 100%
	&__content
		/*border-radius 3px
		box-shadow 1px 1px 2px rgba(0,0,0,0.2)*/
		padding 1em
		span
			display block
			min-height 140px
		h3:first-of-type
			text-align center
			padding-top 0
			margin-top 0
		p:last-of-type
			padding-bottom 0
			margin-bottom 0
</style>