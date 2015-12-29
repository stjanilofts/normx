<template>
	<div class="Page">
		<div v-if="$loadingRouteData"><h3><i class="fa fa-cog fa-spin"></i> Sæki...</h3></div>
		<div v-if=" ! $loadingRouteData">
			<h1>Innskráning</h1>
			
            <form @submit.prevent="onSubmit">
				<input type="text" name="email" v-model="email" />
				<input type="password" name="password" v-model="password" />
				<button class="Button">Innskrá</button>
			</form>

			<div v-if="error">
				Rangt netfang eða lykilorð.
			</div>
		</div>
	</div>
</template>

<script>
import Btn from './Button.vue';

export default {
	data() {
		return {
			email: '',
			password: '',
			error: false
		}
	},

	components: {
		Btn
	},

	methods: {
		onSubmit() {
			var credentials = {
				_token: document.querySelector('#token').getAttribute('value'),
				email: this.email,
				password: this.password
			};

			this.$http.post('/auth/login', credentials, function(data) {
				if(data.success == 1) {
					window.location.href = '/admin';
				}

				if(data.success == 0) {
					this.error = true;
				}
			}.bind(this));
		}
	}
}
</script>

<style lang="stylus">
@import '../../stylus/variables'
</style>