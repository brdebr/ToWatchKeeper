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
                    <!-- TODO: inline style -->
                    <i class="fa fa-fw fa-edit" style="color:#ce6100"></i>
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
import { ContentsEventsBus } from './ContentsEventsBus.js';

let apiUrl = 'http://localhost:8000/api/contents/';
export default {
  props: ['content', 'index', 'active'],
  methods: {
    sendDisplayContent: function() {
      ContentsEventsBus.displayContent(this.content);
    },
    deleteContent: function() {
      console.log('Sending Event deleteContent');
      console.log('Content', this.content);

      axios
        .delete(apiUrl + this.content.id)
        .then(result => {
          console.log('Content deleted : Success!');
          console.log(result.data);
          ContentsEventsBus.contentDestroyed(result.data.data.id);
        })
        .catch(err => {
          console.log('Content deleted : Failed!');
          console.log(err);
        });
    },
    sendDisplayEditContent: function() {
      ContentsEventsBus.displayEditContent(this.content);
    },
  },
  mounted() {
    console.log('Content-List-Item component mounted.');
  },
};
</script>
