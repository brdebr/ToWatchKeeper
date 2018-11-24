<template>
    <div class="row justify-content-center">
          <div class="col-md-11">
              <div class="card card-default border-secondary bg-dark mb-3">
                  <div class="card-header d-flex align-items-baseline text-light">
                      <span @click="toggleEditing">
                          I'm a Content DISPLAYER !
                      </span>
                      <small class="ml-auto">
                          Record ID: #{{ content.id }}
                      </small>
                  </div>
                  <div class="card-body bg-light">
                      <template v-if="!editing">
                          <content-detail :content="content"/>
                      </template>
                      <template v-else>
                          <content-edit :content="content"/>
                      </template>
                  </div>
              </div>
        </div>
    </div>
</template>

<script>
import { ContentsEventsBus } from "./ContentsEventsBus.js";

let apiUrl = "http://localhost:8000/api/contents";
// let content = ;
export default {
  data: function() {
    return {
      content: {
        title: "loading ...",
        release: "##/##/####",
        synopsis: "loading ...",
        type: "loading ...",
        infourl: "about:blank"
      },
      editing: false
    };
  },
  methods: {
    displayContent: function(content) {
      this.content = content;
    },
    toggleEditing: function() {
      this.editing = !this.editing;
    }
  },
  mounted() {
    console.log("Content-List Component mounted.");
  },
  created() {
    ContentsEventsBus.$on("displayContent", content => {
      this.displayContent(content);
      this.editing = false;
    });
    ContentsEventsBus.$on("displayEditContent", content => {
      this.displayContent(content);
      this.editing = true;
    });
    ContentsEventsBus.$on("contentUpdated", content => {
      this.displayContent(content);
      this.editing = false;
    });
  }
};
</script>
