<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card card-default">
                    <div class="card-header">
                        <span>I'm a Content list !</span>
                        <small class="float-right text-muted">Listing : {{ listSize }} contents </small>
                        </div>

                    <div class="card-body">
                        <content-detail :content="contents[0]"></content-detail>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li v-for="content in contents" :key="content.id" class="list-group-item">
                            <content-item-list :content="content"></content-item-list>
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
      contents: [],
      selected: contentPlaceholder,
    };
  },
  computed:{
      listSize: function () {
          return this.contents.length;
      }
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
    console.log('Content-List Component mounted.');
  },
};
</script>
