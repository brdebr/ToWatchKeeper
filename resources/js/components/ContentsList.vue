<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">I'm a Content list !</div>

                    <div class="card-body">
                        <content-detail :content="contents[0]"></content-detail>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li v-for="content in contents" :key="content.id" class="list-group-item">
                            <span>
                                {{ content.title }}
                            </span>
                            <span class="float-right">
                                <a href="#" class="btn-outline">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var apiUrl = 'http://localhost:8000/api/contents';
var contentPlaceholder = {
  title: ' ',
  release: '##/##/####',
  synopsis: ' ',
  type: ' ',
  infourl: 'about:blank',
};
export default {
  data: function() {
    return {
      contents: [contentPlaceholder],
    };
  },
  mounted() {
    axios
      .get(apiUrl)
      .then(result => {
        console.log('Get contents : Success!');
        this.contents = [...result.data.data];
      })
      .catch(err => {
        console.log('Get contents : Failed!');
        console.log(err);
      });
    console.log('ContentList Component mounted.');
  },
};
</script>
