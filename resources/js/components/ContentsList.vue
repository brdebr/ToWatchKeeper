<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card card-default">
                    <div class="card-header d-flex align-items-baseline">
                        <span>
                            I'm a Content list !
                        </span>
                        <small class="ml-auto text-muted">
                            Listing : {{ listSize }} contents
                        </small>
                    </div>
                    <div class="card-body">
                        <content-detail :content="contents[selected]"></content-detail>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li v-for="(content, index) in contents" :key="content.id" class="list-group-item">
                            <content-list-item @displayContent="selectContent" :index="index" :content="content"></content-list-item>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var apiUrl = 'http://localhost:8000/api/contents';
var contePlaceholder = {
  title: 'loading ...',
  release: '##/##/####',
  synopsis: 'loading ...',
  type: 'loading ...',
  infourl: 'about:blank',
};
export default {
  data: function() {
    return {
      contents: [contePlaceholder],
      selected: 0,
    };
  },
  computed: {
    listSize: function() {
      return this.contents.length;
    },
  },
  methods: {
    selectContent: function(index) {
      console.log('Select content index' + index);
      this.selected = index;
    },
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
