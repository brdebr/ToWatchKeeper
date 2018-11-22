<template>
    <div class="container">
        <contents-display/>
        <contents-list :contents="contents"/>
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
