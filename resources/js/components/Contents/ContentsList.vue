<template>
      <div class="row justify-content-center">
          <div class="col-md-11">
              <div class="card card-default border-secondary bg-dark">
                  <div class="card-header d-flex align-items-baseline text-white">
                      <span @click="toggleEditing">
                          I'm a Content list !
                      </span>
                      <small class="ml-auto">
                          Listing : {{ listSize }} contents
                      </small>
                  </div>
                  <ul class="list-group list-group-flush">
                      <content-list-item
                          v-for="(content, index) in contents"
                          :key="content.id"
                          :index="index"
                          :content="content"
                          :active="selected === index"
                          @displayContent="displayContent"
                          @displayEditContent="displayEditContent"
                          @contentDestroyed="deleteContent"
                          class="list-group-item">
                      </content-list-item>
                  </ul>
              </div>
          </div>
      </div>
</template>

<script>
let apiUrl = 'http://localhost:8000/api/contents';

export default {
  props: ['contents'],
  data: function() {
    return {
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
    displayContent: function(index) {
      this.selected = index;
      this.editing = false;
    },
    deleteContent: function(index) {
      this.contents.pop(index);
      this.selected = 0;
      this.editing = false;
    },
    toggleEditing: function() {
      this.editing = !this.editing;
    },
    displayEditContent: function(index) {
      this.selected = index;
      this.editing = true;
    },
    displayEditedContent: function(content) {
      this.contents[this.selected] = { ...content };
      this.editing = false;
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
