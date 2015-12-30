<template>
	<div>
		<p>Ef að þú vilt prófa að bæta við aukahlutum getur þú gert það með því að smella á takkann hér fyrir neðan. Það er einnig góð leið til að fá góða hugmynd um lokaverð.</p>

		<button class="Button">Bæta við aukahluti</button>

		<h2>{{ samtals }}</h2>

		<form v-cloak class="Vorulisti">
			<fieldset v-for="(c, category) in categories">
				<legend>{{ category.title }}</legend>

				<div>
					<div v-for="(i, item) in category.items | orderBy 'price'"
						 class="Vorulisti__selectable">
						<div class="Vorulisti__item" :class="{ 'selected': selected(category, item) }">
							<label :class="{ 'selected': selected(category, item) }">
								<input type="radio" :name="category.title" v-model="extras[category.title]" :value="item" />
									<i class="fa fa-circle-o"
									   :class="{
									   		'fa-circle-o': !extras[category.title] || extras[category.title].title != item.title,
									   		'fa-check-circle-o': selected(category, item)  }
									   "></i>
									<span class="title">{{ item.title }}</span><br>{{ price(item.price) }}
							</label>
						</div>
					</div>
				</div>
			</fieldset>
		</form>
		<pre>{{ extras | json 4 }}</pre>
	</div>
</template>

<script>
export default {
	data() {
		return {
			extras: {},
			categories: [
				{
					title: 'Lok',
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

    /*filters: {
        samtals(list) {
			return list.reduce(function(total, item) {
			    return total + 123
			}, 0)
		}
    },*/

	computed: {
		samtals() {
			if(this.extras.length > 0) {
				this.extras.forEach(function(item) {
					console.log(item.title)
				});
			}

			return 123
			/*if(this.extras.length) {
				return this.extras.filter(function(item) {
					return item.reduce(function(total, item) {
						return total + item.price
					}, 0)
				})
			}*/
		}
	},

	methods: {
		onSelect(e) {
		},

		selected(category, item) {
			return (this.extras[category.title] && this.extras[category.title].title) == item.title
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

.Vorulisti
	fieldset
		padding 1em
		legend
			margin-bottom 2em
			margin-top 2em
			display block
			font-size 1.6em
			text-transform uppercase
		background #FFF
		border 0px solid white
		margin 0
		padding 0
		margin-top 1em
		margin-bottom 1em
		padding-bottom 1em
	&__selectable
		lost-waffle 1/4 4 1em
		+large()
			lost-waffle 1/3 3 1em
		+medium()
			lost-waffle 1/2 2 1em
		+small()
			lost-waffle 1/1 1 1em
	&__item
		span.title
			font-weight bold
		padding 1em
		&.selected
			color white
			background $blue 
		label
			cursor pointer
		input
			display none

[v-cloak]
	display none
</style>