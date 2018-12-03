<template>
  <div class="row justify-content-center">
      <div class="col-md-11">
          <div class="card card-default border-secondary bg-dark mb-3">
              <div class="card-header d-flex align-items-baseline text-white">
                  <span>
                      I'm a Content List !
                  </span>
                  <small class="ml-auto">
                      Listing : {{ contents.length }} contents
                  </small>
              </div>
              <ul class="list-group list-group-flush">
                  <content-list-item
                      v-for="(content, index) in contents"
                      :key="content.id"
                      :index="index"
                      :content="content"
                      :active="selected === index"
                      class="list-group-item">
                  </content-list-item>
              </ul>
          </div>
      </div>
  </div>
</template>

<script>
import { ContentsEventsBus } from './ContentsEventsBus.js'
let apiUrl = 'http://localhost:8000/api/contents'

export default {
  props: ['contents'],
  data: function() {
    return {
      selected: 0,
      editing: false,
    }
  },
  mounted() {  
    console.log('Content-List Component mounted.')
  },
  created(){

    ContentsEventsBus.handleDisplayContent( content => {
      this.contents.find((el,index) => {
        if(el.id === content.id){
          this.selected = index
          return el.id
        }
      })
    })
    ContentsEventsBus.handleDisplayEditContent( content => {
      this.contents.find((el,index) => {
        if(el.id === content.id){
          this.selected = index
          return el.id
        }
      })
    })
  }
}
</script>
