<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">I'm a Content list !</div>

                    <div class="card-body">
                        I'm an example content.
                    </div>
                    <ul class="list-group list-group-flush">
                        <li v-for="content in contents" class="list-group-item">{{ content.title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    var apiUrl = "http://localhost:8000/api/contents";
    export default {
        data: function () {
            return {
                contents: {}
            }
        },
        mounted() {
            axios.get(apiUrl)
                .then(result => {
                    console.log("success!");
                    this.contents = {...result.data.data};
                }).catch( err => {
                    console.log(err);
                })
            console.log('Component mounted.')
        }
    }
</script>
