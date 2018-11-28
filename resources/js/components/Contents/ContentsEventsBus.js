export const ContentsEventsBus = new Vue({
    name: 'ContentsEventsBus',
    methods:{
        // EMITTERS
        displayContent: function (content) {
            console.log('Emitting - displayContent()',content);
            this.$emit('displayContent', content);
        },
        displayEditContent: function (content) {
            console.log('Emitting - displayEditContent()',content);
            this.$emit('displayEditContent', content);
        },
        contentUpdated: function (content) {
            console.log('Emitting - contentUpdated()',content);
            this.$emit('contentUpdated', content);
        },
        contentDestroyed: function (id) {
            this.$emit('contentDestroyed', id);
        },
        // HANDLERS
        handleDisplayContent: function (callback) {
            this.$on("displayContent", content => {
                callback(content);
              });
        },
        handleDisplayEditContent: function (callback) {
            this.$on("displayEditContent", content => {
                callback(content);
              });
        },
        handleContentUpdated: function (callback) {
            this.$on("contentUpdated", content => {
                callback(content);
              });
        },
        handleContentDestroyed: function (callback) {
            this.$on("contentDestroyed", id => {
                callback(id);
              });
        },
    }
});