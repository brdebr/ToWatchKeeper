<template>
    <div>
        <h4 class="card-title text-capitalize">{{ content.title }}</h4>
        <h6 class="card-subtitle mb-2 text-muted">
            <span>Type:
                <span class="text-capitalize badge badge-pill badge-light">
                    {{content.type}}
                </span>
            </span>
            <span class="float-right">
                Released: {{content.release}}
            </span>
        </h6>
        <dl class="row">
            <dt class="col-sm-2">Synopsis:</dt>
            <dd class="col-sm-10">{{content.synopsis}}</dd>
        </dl>
        <a :href="content.infourl" class="float-right card-link badge badge-primary">More info</a>
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
