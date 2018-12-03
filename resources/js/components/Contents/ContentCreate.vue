<template>
  <div class="row justify-content-center">
    <div class="col-md-11">
      <div class="card card-default border-secondary bg-dark mb-3">
        <div class="card-header d-flex align-items-baseline text-light">
          <span >I'm a Content Creator !</span>
          <button @click="createContent" class="ml-auto btn btn-success">
            <i class="fa fa-plus-circle"></i>
          </button>
        </div>
        <div class="card-body bg-light overflow-h-border-bottom">
          <div class="container-fluid">
            <div class="row align-items-baseline mb-2">
              <div class="col-2 font-weight-bold pl-0">
                  Title:
              </div>
              <div class="col-10">
                <input
                  type="text"
                  class="form-control"
                  v-model.trim="content.title"
                  placeholder="Content Title"
                >
              </div>
              
            </div>
            <div class="row align-items-baseline mb-2">
                <div class="col-2 font-weight-bold pl-0">
                  Type:
                </div>
                <div class="col-6 pr-0">
                    <input 
                     type="text" 
                     class="form-control"
                     placeholder="Content type"
                     v-model="content.type"
                    />
                </div>
                <div class="col-4">
                  <date-picker 
                   v-model="content.release"
                   class="text-center"
                   placeholder="Date"
                   :config="options"
                  />
                </div>
            </div>
            <div class="row align-items-baseline mb-2">
                <div class="col-2 font-weight-bold pl-0">
                  Info URL:
                </div>
                <div class="col-10">
                    <input 
                     type="text" 
                     class="form-control"
                     placeholder="Info URL"
                     v-model="content.infourl"
                    />
                </div>
            </div>
            <div class="row align-items-baseline">
                <div class="col-2 font-weight-bold pl-0">
                    Synopsis:
                </div>
                <div class="col-10">
                    <textarea 
                     v-model="content.synopsis"
                     placeholder="Synopsis"
                     class="form-control"
                     rows="3"/>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
let apiUrl = 'http://localhost:8000/api/contents/'
import { ContentsEventsBus } from './ContentsEventsBus.js'

export default {
  data: function() {
    return {
      content: {},
      options: {
        format: 'DD/MM/YYYY',
        showTodayButton: true,
        showClear: true,
      },
    }
  },
  methods: {
    createContent: function() {
      console.log('Creating content ...',{
        content:this.content
      })
      this.$store.dispatch('insert_content',this.content)
    },
  },
  mounted() {
    console.log('ContentCreate component mounted.')
  },
  created(){
    ContentsEventsBus.handleClearCreate(() => {
      this.content = {}
    })
  }
}
</script>
