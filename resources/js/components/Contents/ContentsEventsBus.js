export const ContentsEventsBus = new Vue({
    methods:{
        displayContent: function (content) {
            this.$emit('displayContent', content);
        },
        contentUpdated: function (content) {
            this.$emit('contentUpdated', content);
        },
        handleDisplayContent: function (callback) {
            this.$on("displayContent", content => {
                callback(content);
              });
        }
    }
});