<template>
	<b-toast :title="title" visible solid>
	  <slot></slot>
	</b-toast>
</template>

<script>
	export default {
		props: ['title']
	}
</script>