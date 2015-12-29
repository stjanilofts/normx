<template>
	<div class="Haus">
		<menu></menu>
	</div>

	<div>
	    <router-view
			class="router-view"
			transition="fade"
			transition-mode="out-in">
	    </router-view>
	</div>

	<div class="Footer">
		<div class="Footer__items">
			<div>
				<strong>NORMX</strong><br>
				Auðbrekku 6, 200 Kópavogur<br>
				Sími 565 8899<br>
				normx@normx.is<br>
				Opnunartími<br>
				Mán-fim: 10-18<br>
				Föstudaga: 10-17<br>
			</div>
			<div>
				<a href="#"><i class="fa fa-facebook"></i></a>
			</div>
		</div>
	</div>
</template>

<script>
import Menu from './Menu.vue';

export default {
	ready() {
	},

	components: {
		Menu
	}
}
</script>

<style lang="stylus">
@import '../../stylus/app'

.Haus
	transition all 0.2s ease
	height auto
	border-bottom 4px solid $blue

.Footer
	border-top 4px solid $blue
	height 300px
	&__items
		padding 10px
		padding-top 2em
		padding-bottom 2em
		max-width $max-width
		color $blue
		margin 0 auto
		div
			lost-column 1/2
			+small()
				text-align center
				lost-column 1/1
				margin-bottom 1em
			&:nth-child(2)
				i
					font-size 3em
					color $blue2
				+small()
					text-align center
				text-align right
</style>