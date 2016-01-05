<template>
	<div class="container">
		<div class="Menu">
			<div class="Menu__top">
				<div>
					<a href="/#"><img src="/img/logo.png" /></a>
				</div>
				<div>
					<a @click.prevent="toggleNav" href="#"><span><i class="fa fa-bars"></i></span></a>
				</div>
			</div>
			<div class="Menu__bottom" v-if="showNav" transition="fade">
				<nav>
					<div class="menu-item" v-for="item in items | orderBy 'order'">
						<a @click.prevent="toggleNav" v-link="{ path: item.path, activeClass: 'active', params: { slug: item.slug } }"><span>{{ item.title }}</span></a>
						<!-- <div v-if="item.subs" class="subs">
							<div v-for="sub in item.subs | orderBy 'order'">
								<a v-link="{ path: sub.path, activeClass: 'active', params: { slug: sub.slug } }"><span>{{ sub.title }}</span></a>
							</div>
						</div> -->
					</div>
				</nav>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			items: [],
			showNav: false
		}
	},

	ready() {
		var self = this

		/*$(document).ready(function() {
			$('body').click(function(event) {
			    if(!$(event.target).closest('.Menu__bottom').length) {
		            if(!self.showNav) {
		            	self.toggleNav()
			        }
			    }   
			})
		});*/

		this.$http.get('/api/menu', function(data) {
			this.$set('items', data);
		});
	},

	methods: {
		toggleNav() {
			this.showNav = !this.showNav;
		}
	}
}
</script>

<style lang="stylus">
@import '../../stylus/app'

.Menu
	position relative
	a
		color $blue2
		text-decoration none
		transition all 0.2s
		&:hover, &:active, &.active
			color $blue
	&__top
		padding 10px
		display flex
		flex 1 1 auto
		flex-direction row
		align-items center
		align-content center
		justify-content space-between
		div
			&:first-child
				img
					max-width 300px
					width 35vw
					min-width 200px
					vertical-align top
				text-align left
			&:last-child
				font-size 3em
				text-align right
	&__bottom
		background $blue2
		color white
		position absolute
		z-index 10000
		left 0
		right 0
		nav
			a
				text-transform uppercase
				font-weight bold
				color white
				text-decoration none
				transition all 0.2s
				&:hover, &:active, &.active
					color white
					background $blue
			.menu-item
				padding 0
				lost-column 1/4 4 0px
				+medium()
					lost-column 1/3 3 0px
				+small()
					lost-column 1/2 2 0px
				+xsmall()
					lost-column 1/1 1 0px
				a
					display block
					width 100%
					line-height 1
					span
						display inline-block
						padding 10px
</style>