<template>
    <div>
        <a href="#" class="badge badge-primary ml-2 h4" @click="followPage" v-text="buttonText" >Follow</a>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function(){
            return {
                status: this.follows
            }
        },
        methods: {
            followPage(){
                // alert(1);
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        console.log(response.data);
                        this.status = !this.status;
                    })
                    .catch(errors => {
                        // console.log(response);
                        console.log(errors.response.status);
                        if (errors.response.status === 401){
                            window.location = '/login';
                        }
                    })
            }
        },
        computed: {
            buttonText(){
                return (this.status) ? 'Unfollow' : ' Follow';
            }
        }
    }
</script>

