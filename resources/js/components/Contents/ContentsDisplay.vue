<template>
  <div class="row justify-content-center">
    <div class="col-md-11">
      <div class="card card-default border-secondary bg-dark mb-3">
        <div class="card-header d-flex align-items-baseline text-light">
          <span>
              I'm a Content Displayer !
          </span>
          <small class="ml-auto">
              Record ID: #{{ content.id }}
          </small>
        </div>
        <div class="card-body bg-light overflow-h-border-bottom">
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
import { ContentsEventsBus } from "./ContentsEventsBus.js"

let apiUrl = "http://localhost:8000/api/contents"
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
    }
  },
  methods: {
    displayContent: function(content) {
      this.content = content
    },
    toggleEditing: function() {
      this.editing = !this.editing
    }
  },
  mounted() {
    console.log("Content-List Component mounted.")
  },
  created() {
    ContentsEventsBus.handleDisplayContent(content => {
      this.displayContent(content)
      this.editing = false
    })
    ContentsEventsBus.handleDisplayEditContent(content => {
      this.displayContent(content)
      this.editing = true
    })
    ContentsEventsBus.handleContentUpdated(content => {
      /* TODO: FIX THIS DOUBLE CONTENT */
      this.displayContent(content.content)
      this.editing = false
    })
  }
}
</script>

