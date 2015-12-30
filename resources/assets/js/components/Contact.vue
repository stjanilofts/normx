<template>
	<div class="Page">
		<div v-if="$loadingRouteData"><h3><i class="fa fa-cog fa-spin"></i> Sæki...</h3></div>
		<div v-if=" ! $loadingRouteData">
			<div class="Page__content">
				<h1>Hafa samband</h1>

				<form v-on:submit.prevent="onSubmit" v-if="!isSubmitted" class="Basic">
					<div class="form-row">
						<input id="fyrirspurn_nafn"
							   @focus="clearError"
							   :class="{'form-error': errors.nafn && errors.nafn[0]}"
							   type="text"
							   class=""
							   :disabled="isSubmitting"
							   name="nafn"
							   v-model="fyrirspurn.nafn"
						   	   placeholder="Nafn" />
					</div>

					<div class="form-row">
						<input id="fyrirspurn_netfang"
							   @focus="clearError"
							   :class="{'form-error': errors.netfang && errors.netfang[0]}"
							   type="text"
							   class=""
							   :disabled="isSubmitting"
							   name="netfang"
							   v-model="fyrirspurn.netfang"
						   	   placeholder="Netfang" />
					</div>

					<div class="form-row">
						<input id="fyrirspurn_simi"
							   @focus="clearError"
							   :class="{'form-error': errors.simi && errors.simi[0]}"
							   type="text"
							   class=""
							   :disabled="isSubmitting"
							   name="simi"
							   v-model="fyrirspurn.simi"
						   	   placeholder="Sími" />
					</div>

					<div class="form-row">
						<input id="fyrirspurn_titill"
							   @focus="clearError"
							   :class="{'form-error': errors.titill && errors.titill[0]}"
							   type="text"
							   class=""
							   :disabled="isSubmitting"
							   name="titill"
							   v-model="fyrirspurn.titill"
						   	   placeholder="Titill" />
					</div>

					<div class="form-row fullwidth">
						<textarea id="fyrirspurn_skilabod"
								  @focus="clearError"
								  :class="{'form-error': errors.skilabod && errors.skilabod[0]}"
								  rows="6"
								  class=""
								  :disabled="isSubmitting"
								  name="skilabod"
							   	  v-model="fyrirspurn.skilabod"
						   	   	  placeholder="Skilaboðin hér..."></textarea>
					</div>

					<div class="clearfix"></div>

					<div class="form-row fullwidth">
						<button class="Button"
						   	 	:disabled="isSubmitting">
							<span v-if="isSubmitting">
								Er að senda<span style="width: 20px; display: inline-block; text-align: left;">{{ dots }}</span>
							</span>

							<span v-if="!isSubmitting">
								{{ button_text }}
							</span>
						</button>
					</div>
				</form>

				<div v-if="isSubmitted">
					<h3>Takk fyrir!</h3>
					<p>Við munum fara yfir skilaboðin þín og vera í bandi.</p>
					<button @click="reset" class="Button">Senda ný skilaboð</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			dots: '',
			timer: false,
			interval: false,
			isSubmitting: false,
			isSubmitted: false,
			fyrirspurn: {
				nafn: '',
				netfang: '',
				simi: '',
				titill: '',
				skilabod: ''
			},

			errors: {
				nafn: '',
				netfang: '',
				simi: '',
				titill: '',
				skilabod: ''
			},

			button_text: 'Senda skilaboð'
		}
	},

	ready() {
		this.isSubmitting = false;
		this.isSubmitted = false;
	},

	route: {
		data(transition) {
			this.reset();
			transition.next();
		}
	},

	methods: {
    	clearError(e) {
    		var $name = e.target.getAttribute('name');
    		this.button_text = 'Senda skilaboð';
    		this.errors[$name] = '';
    	},

    	hasError(name) {
    		return (this.errors.hasOwnProperty(name) && this.errors[name].length);
    	},

    	reset() {
			this.isSubmitting = false;
			this.isSubmitted = false;
			this.fyrirspurn = {
				nafn: '',
				netfang: '',
				simi: '',
				titill: '',
				skilabod: ''
			};

			this.errors = {
				nafn: '',
				netfang: '',
				simi: '',
				titill: '',
				skilabod: ''
			};
    	},

    	onSubmit(e) {
    		clearTimeout(this.timer);
    		clearInterval(this.interval);

    		this.isSubmitted = false;
    		this.isSubmitting = true;

    		this.errors = [];

    		var self = this;

    		this.interval = setInterval(function() {
    			self.dots = self.dots + '.';

    			if(self.dots.length == 4) {
    				self.dots = '';
    			}
    		}, 150);

    		this.timer = setTimeout(function() {
    			self.$http.post('/hafa-samband', self.fyrirspurn, function(data, status, request) {
	    			self.isSubmitted = true;
	    			self.isSubmitting = false;
	    		}).error(function(data, status, request) {
	    			self.$set('errors', data);
	    			self.button_text = 'Athugaðu reitina!';
	    			self.isSubmitting = false;
	    		});
	    	}, 500);
    	}
    }
}
</script>

<style lang="stylus">
@import '../../stylus/variables'
</style>