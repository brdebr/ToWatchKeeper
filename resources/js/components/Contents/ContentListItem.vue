<template>

    <li :class="{'bg-selected' : active}">

        <div>
            <span>
                {{ content.title }}
            </span>
            <div @click.prevent="sendDisplayContent" class="float-right">
                <a href="javascript:void(0)" class="btn-outline">
                    <i class="fa fa-fw fa-eye"></i>
                </a>
            </div>
            <div @click.prevent="sendDisplayEditContent" class="float-right mr-3">
                <a href="javascript:void(0)" class="btn-outline">
                    <i class="fa fa-fw fa-edit color-orange-edit"></i>
                </a>
            </div>
            <div @click.prevent="deleteContent" class="float-right mr-3">
                <a href="javascript:void(0)" class="btn-outline">
                    <i class="fa fa-fw fa-trash text-danger"></i>
                </a>
            </div>
        </div>

    </li>

</template>

<script>
import { ContentsEventsBus } from './ContentsEventsBus.js'

let apiUrl = 'http://localhost:8000/api/contents/'
export default {
  props: ['content', 'index', 'active'],
  methods: {
    sendDisplayContent: function() {
      ContentsEventsBus.displayContent(this.content)
    },
    deleteContent: function() {
      this.$store.dispatch('delete_content',this.content.id)
    },
    sendDisplayEditContent: function() {
      ContentsEventsBus.displayEditContent(this.content)
    },
  },
  mounted() {
    console.log('Content-List-Item component mounted.')
  },
}
</script>

<style lang="scss" scoped>
    i.color-orange-edit{
        color: #ce6100;
    }
</style>
