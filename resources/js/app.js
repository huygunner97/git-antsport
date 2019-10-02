
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

$(function(){
    Vue.component('content-comments', require('./components/Comments.vue').default);
    Vue.component('form-comment', require('./components/FormComment.vue').default);
    Vue.prototype.$postId = document.querySelector(".card-body").getAttribute('data-post');

    const comment = new Vue ({
        el: '#comment',

        data: {
            comments: [],
        },

        created() {
            this.fetchComments();
        },

        
        methods : {

            fetchComments() {
                axios.get('comments/get/'+this.$postId).then(response => {
                    this.comments = response.data;
                });
            },

            addComment(data) {
                let body = data.comment;
                let post_id = this.$postId;
               
                axios.post('comments/add', {body, post_id})
                    .then(response => {
                        this.comments.push( response.data);
                    });

            }
        },

    });
});



$(function() {
    /**
     * update and display messages
     */

    Vue.component('chat', require('./components/Chat.vue').default);

    Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');

    const app = new Vue({
        el: '#chat-support',

    });

});

$(function(){

    var chat = $('#chat-support');
    /**
     *  display chat box notification
     */

    var user_id  = $("meta[name='user-id']").attr('content');

    var count_noti = chat.find('.chat-button').attr('id');
    count_noti = parseInt(count_noti);

    chat.find('.chat-button').click(() => {
        $.get('messages/update-notification/'+user_id, function(data){
            // console.log(data);
        });
        chat.find('#number-noti').css('display', 'none');
        count_noti = 0;

        $.get('send-first-message/'+user_id, function(data){
            // console.log(data);
        });

    });
    chat.find('.exit').click(() => {
        $.get('messages/update-notification/'+user_id, function(data){
            // console.log(data);
        });
        chat.find('#number-noti').css('display', 'none');
        count_noti = 0;
    });

    Echo.private('chat.'+user_id)
        .listen('MessageSent', (e) => {
            if (count_noti == 0 || count_noti == '' || !count_noti) {
                count_noti = 1;
            } else {
                count_noti = count_noti + 1;
            }

            if (chat.find('#number-noti').css('display') == 'none') {
                chat.find('#number-noti').css('display', 'block');
                chat.find('#number-noti').html(count_noti);
            } else {
                chat.find('#number-noti').html(count_noti);
            }

            // auto scroll bottom
            var scrollToBottom = chat.find('.card-body');
            setTimeout(() => {
                scrollToBottom.animate({scrollTop : scrollToBottom.get(0).scrollHeight},300);
            }, 1);

        });


    /**
     * display chat box, scroll messages
     */
    var count_click = 0;
    chat.find('.chat-button').click(function(){
        
        chat.find('.card').show(300);
        $(this).hide(300);

        count_click++ ;
        if (count_click == 1) {
            var scrollAuto = chat.find('.card-body');
            scrollAuto.scrollTop(scrollAuto.get(0).scrollHeight);
        }

    });

    chat.find('.exit').click(function(){
        chat.find('.card').hide(300);
        chat.find('.chat-button').fadeIn();
    });
});
