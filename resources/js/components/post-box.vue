<template>
    <div>
        <h3>{{postTitle}}</h3>          
        <p>{{postBody}}</p>
        <a :href="href" class="btn btn-primary">Read more</a>
        <hr>
    </div>
</template>

<script>
    export default {
        props: {
        	postTitle : {required: true},
        	postBody  : {required: true},
            href      : {default : '#'}
    	}
    }
</script>
