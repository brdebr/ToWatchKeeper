<template>
    <div class="container-fluid">
        <div class="align-items-baseline row">
            <div class="col-4 input-group mb-3 pl-0">
                <input type="text" class="form-control" :placeholder="content.title">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="button">
                        <span class="float-right">
                            <a href="#">
                                <!-- TODO: inline style -->
                                <i class="fa fa-fw fa-edit" style="color:#ce6100"></i>
                            </a>
                        </span>
                    </button>
                </div>
            </div>
            <div class="col-3 ml-auto text-right">
                Released: {{content.release}}
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
export default {
  props: ['content'],
  mounted() {
    console.log('Content component mounted.');
  },
};
</script>
