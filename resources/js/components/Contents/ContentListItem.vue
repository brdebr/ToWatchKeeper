<template>

    <li :class="{'bg-selected' : active}">

        <div>
            <span>
                {{ content.title }}
            </span>
            <span @click.prevent="sendDisplayContent" class="float-right">
                <a href="#" class="btn-outline">
                    <i class="fa fa-fw fa-eye"></i>
                </a>
            </span>
            <span @click.prevent="sendDisplayEditContent" class="float-right mr-3">
                <a href="#" class="btn-outline">
                    <!-- TODO: inline style -->
                    <i class="fa fa-fw fa-edit" style="color:#ce6100"></i>
                </a>
            </span>
            <span @click.prevent="deleteContent" class="float-right mr-3">
                <a href="#" class="btn-outline">
                    <i class="fa fa-fw fa-trash text-danger"></i>
                </a>
            </span>
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
      console.log('Sending Event displayContent');
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
      console.log('Sending Event displayEditContent');
      ContentsEventsBus.displayEditContent(this.content);
    },
  },
  mounted() {
    console.log('Content-List-Item component mounted.');
  },
};
</script>
