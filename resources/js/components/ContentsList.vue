<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">I'm a Content list !</div>

                    <div class="card-body">
                        <h4 class="card-title text-capitalize">{{ contents[0].title }}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <span>Type:
                                <span class="text-capitalize badge badge-pill badge-light">
                                    {{contents[0].type}}
                                </span>
                            </span>
                            <span class="float-right">
                                Released: {{contents[0].release}}
                            </span>
                        </h6>
                        <dl class="row">
                            <dt class="col-sm-2">Synopsis:</dt>
                            <dd class="col-sm-10">{{contents[0].synopsis}}</dd>
                        </dl>
                        <a :href="contents[0].infourl" class="float-right card-link badge badge-primary">More info</a>
                    </div>
                    <hr/>
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
    console.log('Component mounted.');
  },
};
</script>
