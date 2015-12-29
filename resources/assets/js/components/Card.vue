<template>
	<div class="Card" transition="fade">
		<div class="Card__icon Card--margin">
			<i class="fa {{ item.icon }}"></i>
		</div>

		<div class="Card__content Card--margin">
			<h3>{{ item.title }}</h3>
			
			<span>{{ item.content }}</span>
		</div>

		<div class="Card--margin">
			<btn title="Skoða" :path="item.path"></btn>
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
</style>