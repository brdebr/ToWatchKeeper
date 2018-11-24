<template>
    <div class="container">
        <contents-display/>
        <contents-list :contents="contents"/>
    </div>
</template>

<script>
let apiUrl = 'http://localhost:8000/api/contents';

export default {
  data: function() {
    return {
      contents: [],
      selected: 0,
      editing: false,
    };
  },
  computed: {

  },
  methods: {
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
