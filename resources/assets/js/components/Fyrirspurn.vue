<template>
	<div class="Vorulisti--container">
		<p>Ef að þú vilt prófa að bæta við aukahlutum getur þú gert það með því að smella á takkann hér fyrir neðan. Það er einnig góð leið til að fá góða hugmynd um lokaverð.</p>

		<button class="Button" @click="showForm">{{ showform_text }}</button>

		<form v-cloak class="Vorulisti">
			<fieldset v-for="(c, category) in categories">
				<div class="category">
					<legend @click="showOptions">{{ category.title }}</legend>
					<p v-if="category.info">{{ category.info }}</p>
					<div class="options">
						<div v-for="(i, item) in category.items | orderBy 'price'"
							 class="Vorulisti__selectable">
							<div class="Vorulisti__item" :class="[ hasItem(item) ? 'selected' : '' ]">
								<label>
									<input type="radio" :name="category.title" @click="addItem(item)" />
									<i class="fa" :class="[ hasItem(item) ? 'fa-check-circle-o' : 'fa-circle-o' ]"></i>
									<span class="title">{{ item.title }}</span><br>{{ price(item.price) }}
								</label>
							</div>
						</div>
					</div>
				</div>
			</fieldset>

			<button class="Button" @click.prevent="showForm">{{ showform_text }}</button>
		</form>

		<table v-if="chosen.length">
			<tr>
				<th>Valdir aukahlutir</th>
				<th>Verð</th>
			</tr>
			<tr v-for="(i, item) in chosen" v-if="item != null" track-by="$index">
				<td>{{ item.title }}</td>
				<td>{{ price(item.price) }}</td>
			</tr>
			<tr>
				<td><strong>Samtals með potti</strong></td>
				<td><strong>{{ samtals }}</strong></td>
		</table>

		<h3>Senda fyrirspurn varðandi pott</h3>

		<form class="Basic">
			<div>
				<div class="form-row">
					<label for="nafn">Nafn</label>
					<input type="text" v-model="fyrirspurn.nafn">
				</div>

				<div class="form-row">
					<label for="netfang">Netfang</label>
					<input type="text" v-model="fyrirspurn.netfang">
				</div>

				<div class="form-row">
					<label for="simi">Símanúmer</label>
					<input type="text" v-model="fyrirspurn.simi">
				</div>

				<div class="form-row" style="margin-top: 1em;">
					<button class="Button">Senda</button>
				</div>
			</div>
		</form>
	</div>
</template>

<script>
export default {
	props: ['baseprice'],

	components: {
	},

	data() {
		return {
			fyrirspurn: {
				nafn: '',
				netfang: '',
				simi: ''
			},

			showform_text: 'Velja aukahluti',
			chosen: [],
			categories: [
				{
					title: 'Lok',
					info: 'Veldu lok.',
					items: [
						{
							title: 'Állok standard',
							price: 104000
						},
						{
							title: 'Állok með lyftipumpu og öryggislás',
							price: 125000
						},
						{
							title: 'Állok standard með einangrun',
							price: 129000
						},
						{
							title: 'Állok með lyftipumpu, einangrun  og öryggislás',
							price: 153000
						},
					]
				},
				{
					title: 'Hitastýringar',
					info: 'Veldu hitastýringu.',
					items: [
						{
							title: 'Sturtutæki',
							price: 12900
						},
						{
							title: 'Blöndunarloki fyrir heitt og kalt vatn 3/4“',
							price: 10900
						},
						{
							title: 'Blöndunarloki fyrir heitt og kalt vatn 1“',
							price: 15900
						},
						{
							title: 'Blöndunartæki með hitamæli, 42 L/m',
							price: 30700
						},
						{
							title: 'Hitastýring með blæðingu á heitu og köldu vatni án rofa',
							price: 76000
						},
						{
							title: 'Hitastýring, einföld með yfirhitavara',
							price: 122000
						},
						{
							title: 'Hitastýring, tvöföld með yfirhitavara',
							price: 163000
						}
					]
				},
				{
					title: 'Ljós',
					info: 'Veldu ljós',
					items: [
						{
							title: 'Balboa ljós, 1 stk með spenni, rofa og 12v peru',
							price: 21800
						},
						{
							title: 'Balboa ljós, 2 stk með spenni, rofa og 12v peru',
							price: 28750
						},
						{
							title: 'Eurohouse led ljós 1 stk með spenni og rofa',
							price: 14850
						},
						{
							title: 'Eurohouse led ljós 2 stk með spenni og rofa',
							price: 20800
						},
						{
							title: 'Eurohouse led ljós 3 stk með spenni og rofa',
							price: 26750
						}
					]
				},
			]
		}
	},

	ready() {
	},

	computed: {
		samtals() {
			var self = this;

			var price = this.chosen.reduce(function(total, item) {
				if(item) {
					return total + item.price
				}
			}, self.baseprice);

			return this.price(price);
		}
	},

	methods: {
		showForm() {
			if($('.Vorulisti').is(':hidden')) {
				this.showform_text = 'Fela aukahluti';
			} else {
				this.showform_text = 'Velja aukahluti';
			}

			$('.Vorulisti').slideToggle('fast');
		},

		showOptions(e) {
			//$el = $(e.target);
			//$el.siblings('div.options').slideToggle('fast');
		},

		hasItem(item) {
			var found = false
			
			for(var i = 0; i <= this.chosen.length; i++) {
				if(this.chosen[i] && (this.chosen[i].title === item.title)) {
					found = true
				}
			}

			return found
		},

		addItem(item) {
			if(this.hasItem(item)) {
				this.chosen.$remove(item)
			} else {
				this.chosen.push(item)
			}
		},

		price(x) {
			var parts = x.toString().split(".");
			parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
			return parts.join(".") +  ',- kr.';
		}
	}
}
</script>

<style lang="stylus">
@import '../../stylus/app'
//@import '../../stylus/variables'
//@import '../../stylus/media-queries'
.Vorulisti--container
	lost-utility clearfix

table
	tr
		border-bottom 1px solid #EEE
	td:first-child
		width 80%
	td:last-child
		text-align right

.Vorulisti
	display none
	fieldset
		padding 0
		legend
			border-bottom 2px solid $blue2
			margin-top 0
			padding-bottom 0.5em
			margin-bottom 0.5em
			padding-top 0
			cursor pointer
			display block
			width 100%
			font-size 1.8em
			text-transform uppercase
		border 0px solid white
		margin 0
		margin-top 1em
		margin-bottom 1em
		padding-bottom 1em
	/*&__selectable
		lost-waffle 1/4 4 1em
		+large()
			lost-waffle 1/3 3 1em
		+medium()
			lost-waffle 1/2 2 1em
		+small()
			lost-waffle 1/1 1 1em*/
	&__item
		span.title
			font-weight bold
		padding 0.5em
		margin-bottom 0.5em
		transition background 0.3s
		border-radius 8px
		&.selected
			color white
			background $blue2
		label
			i
				&.greenify
					color green
			display block
			cursor pointer
		input
			display none

[v-cloak]
	display none

form
	label
		font-weight bold
</style>