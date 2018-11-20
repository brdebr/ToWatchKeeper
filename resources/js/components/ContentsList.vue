<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card card-default">
                    <div class="card-header d-flex align-items-baseline">
                        <span @click="toggleEditing">
                            I'm a Content list !
                        </span>
                        <small class="ml-auto text-muted">
                            Listing : {{ listSize }} contents
                        </small>
                    </div>
                    <div class="card-body">
                        <template v-if="!editing">
                            <content-detail :content="contents[selected]"></content-detail>
                        </template>
                        <template v-else>
                            <content-edit :content="contents[selected]"></content-edit>
                        </template>
                    </div>
                    <ul class="list-group list-group-flush">
                        <content-list-item
                            v-for="(content, index) in contents"
                            :key="content.id"
                            :index="index"
                            :content="content"
                            :active="selected === index"
                            @displayContent="selectContent"
                            @contentDestroyed="deleteContent"
                            class="list-group-item">
                        </content-list-item>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
let apiUrl = 'http://localhost:8000/api/contents';
let contePlaceholder = {
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
      editing: false,
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
    deleteContent: function(index) {
      this.contents.pop(index);
    },
    toggleEditing: function() {
      this.editing = !this.editing;
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
