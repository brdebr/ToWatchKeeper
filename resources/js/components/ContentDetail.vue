<template>
    <div>
        <div class="text-capitalize d-flex align-items-baseline">
            <h5>
                {{ content.title }}
            </h5>
            <div class="ml-auto">
                Released: {{content.release}}
            </div>
        </div>

        <h6 class="card-subtitle mb-2 text-muted">
            <span>Type:
                <span class="text-capitalize badge badge-pill badge-primary">
                    {{content.type}}
                </span>
            </span>
        </h6>
        <div class="d-flex">
            <div class="mr-3 font-weight-bold">Synopsis:</div>
            <div class="">{{content.synopsis}}</div>
        </div>
        <a :href="content.infourl" class="float-right card-link badge badge-info">More info</a>
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
