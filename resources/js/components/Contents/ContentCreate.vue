<template>
  <div class="row justify-content-center">
    <div class="col-md-11">
      <div class="card card-default border-secondary bg-dark mb-3 overflow-hidden">
        <div class="card-header d-flex align-items-baseline text-light">
          <span >I'm a Content Creator !</span>
          <small class="ml-auto">Record ID: #{{ content.id }}</small>
        </div>
        <div class="card-body bg-light">
          <div class="container-fluid">
            <div class="align-items-baseline row">
              <div class="col-4 input-group mb-3 pl-0">
                <input
                  type="text"
                  class="form-control"
                  v-model.trim="content.title"
                  placeholder="Content Title"
                >
                <div class="input-group-append">
                </div>
              </div>
              <div class="col-3 ml-auto text-right">
                <date-picker v-model="content.release" :placeholder="'Date'" :config="options"></date-picker>
              </div>
            </div>
            <div class="row align-items-baseline">
              <h6 class="card-subtitle mb-2 text-muted">
                <span>
                  Type:
                  <span class="text-capitalize badge badge-pill badge-primary">{{content.type}}</span>
                </span>
              </h6>
            </div>
            <div class="row align-items-baseline">
              <div class="d-flex">
                <div class="mr-3 font-weight-bold">Synopsis:</div>
                <div class>{{content.synopsis}}</div>
              </div>
              <a :href="content.infourl" class="float-right card-link badge badge-info">More info</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
let apiUrl = 'http://localhost:8000/api/contents/';
import { ContentsEventsBus } from './ContentsEventsBus.js';

export default {
  data: function() {
    return {
      content: {},
      options: {
        format: 'DD/MM/YYYY',
        showTodayButton: true,
        showClear: true,
      },
    };
  },
  methods: {
    createContent: function() {

    },
  },
  mounted() {
    console.log('ContentCreate component mounted.');
  },
};
</script>
