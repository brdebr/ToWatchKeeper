<template>
    <div class="container-fluid">
        <div class="align-items-baseline row">
            <div class="col-4 input-group mb-3 pl-0">
                <input type="text" class="form-control" v-model.trim="content.title" :placeholder="placeholder.title">
                <div class="input-group-append">
                    <button @click.prevent="updateContent" class="btn btn-outline-success" type="button">
                        <span class="float-right">
                            <!-- TODO: inline style -->
                            <i class="fa fa-fw fa-edit" style="color:#ce6100"></i>
                        </span>
                    </button>
                </div>
            </div>
            <div class="col-3 ml-auto text-right">
                <date-picker v-model="content.release" :config="options"></date-picker>
            </div>
        </div>
        <div class="row align-items-baseline">
            <h6 class="card-subtitle mb-2 text-muted">
                <span>Type:
                    <span class="text-capitalize badge badge-pill badge-primary">
                        {{content.type}}
                    </span>
                </span>
            </h6>
        </div>
        <div class="row align-items-baseline">
            <div class="d-flex">
                <div class="mr-3 font-weight-bold">Synopsis:</div>
                <div class="">{{content.synopsis}}</div>
            </div>
            <a :href="content.infourl" class="float-right card-link badge badge-info">More info</a>
        </div>
    </div>
</template>

<script>
let apiUrl = 'http://localhost:8000/api/contents/';
import { ContentsEventsBus } from './ContentsEventsBus.js';

export default {
  props: ['content'],
  data: function() {
    return {
      placeholder: {},
      options: {
        format: 'DD/MM/YYYY',
        showTodayButton: true,
        showClear: true,
      },
    };
  },
  methods: {
    updateContent: function() {
      console.log('Fetching updateContent from server...', [
        apiUrl + this.content.id,
        this.content,
      ]);
      axios
        .patch(apiUrl + this.content.id, this.content)
        .then(result => {
          console.log('Content updated : Success!', result.data);
          ContentsEventsBus.contentUpdated(result.data.data.new);
        })
        .catch(err => {
          console.log('Content updated : Failed!', err);
          alert("Didn't work");
        });
    },
  },
  mounted() {
    if (this.placeholder !== {} && this.placeholder !== this.content) {
      this.placeholder = { ...this.content };
    }
    console.log('Content component mounted.');
  },
  beforeDestroy() {
    this.placeholder = {};
  },
};
</script>
