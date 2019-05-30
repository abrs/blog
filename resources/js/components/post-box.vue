<template>
    <div>
        <h2>{{postTitle}}</h2>
        <h5 v-if="showPublished">Published: {{published}}</h5>
        <p>{{postBody}}</p>
        <a :href="href" class="btn btn-primary">Read more</a>
        <hr>
    </div>
</template>

<script>
    export default {
        props: {
        	postTitle : {required: true},
            published : {},
            showPublished: {default: false},
        	postBody  : {required: true},
            href      : {default : '#'}
    	}
    }
</script>
