<template>
	<b-toast :title="title" visible>
	  <slot></slot>
	</b-toast>
</template>

<script>
	export default {
		props: ['title']
	}
</script>