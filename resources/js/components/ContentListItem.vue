<template>
    <div>
        <span>
            {{ content.title }}
        </span>
        <span class="float-right">
            <a href="#" class="btn-outline">
                <i @click.prevent="sendDisplayContent" class="fa fa-fw fa-eye"></i>
            </a>
        </span>
        <span class="float-right mr-3">
            <a href="#" class="btn-outline">
                <!-- TODO: inline style -->
                <i class="fa fa-fw fa-edit" style="color:#ce6100"></i>
            </a>
        </span>
        <span class="float-right mr-3">
            <a href="#" class="btn-outline">
                <i class="fa fa-fw fa-trash text-danger"></i>
            </a>
        </span>
    </div>
</template>

<script>
export default {
  props: ['content', 'index'],
  methods: {
    sendDisplayContent: function() {
      console.log('Event displayContent');
      this.$emit('displayContent', this.index);
    },
  },
  mounted() {
    console.log('Content-List-Item component mounted.');
  },
};
</script>
