require('./bootstrap');
window.Vue = require('vue');


$(() => {
    var room_id = $('input[name="room_id"]').val();
    /**
     *  update message real time
     */

    Vue.component('message', require('./components/ChatAdmin.vue').default);

    Vue.prototype.$roomId = document.querySelector("input[name='room_id']").getAttribute('value');

    const app = new Vue({
        el: '#chat',

    });
});


$(() => {

    var room_id = $('input[name="room_id"]').val();
    
    /**
     *  give notice real time
     */

    var count = [];

    $('.user').each(function(){
        var count_noti = $(this).children('.notifications').attr('id');
        if (count_noti  != 0 && count_noti != '') {
            var user_id = $(this).children('.user-name').attr('id');
            count[user_id] = parseInt(count_noti);
        }
    });

    $.get("getAllUserId", function(data){
        $.each(data, function(key, user){
            // listen for channel chat
            Echo.private('chat.'+user['id'])
                .listen('MessageSent', (e) => {
                    if (count[user['id']] == '' || !count[user['id']]) {
                        count[user['id']] = 1;
                    } else {
                        count[user['id']] = count[user['id']] + 1;
                    }
                    $('.user').find('.user-name').each(function(){
                        if ($(this).attr('id') == user['id'] && $(this).attr('id') != room_id) {
                            if ($(this).parent('.user').find('#number').css('display') == 'none') {
                                $(this).parent('.user').find('#number').css('display', 'block');
                                $(this).parent('.user').find('#number').html(count[user['id']]);
                            } else {
                                $(this).parent('.user').find('#number').html(count[user['id']]);
                            }
                            $(this).find('#message_latest').html(e.message.user.name+': '+e.message.message);

                        } else if($(this).attr('id') == user['id'] && $(this).attr('id') == room_id){
                            $(this).find('#message_latest').html(e.message.user.name+': '+e.message.message);
                            $.get('messenger/update-notification-admin/'+room_id, (data)=> {
                                // console.log(data);
                            });
                        }
                    });
                });

            // listen for channel status
            Echo.private('status.'+user['id'])
                .listen('UserOnline', (e) => {

                    $('.user').find('.user-name').each(function(){
                        if ($(this).attr('id') == user['id']) {
                            if (e.user.status == 'off') {
                                $(this).parent('.user').find('.status').css('display', 'none');
                                if ($(this).attr('id') == room_id) {
                                    $('#user-status').html('Not active');
                                }
                            } else {
                                $(this).parent('.user').find('.status').css('display', 'block');
                                if ($(this).attr('id') == room_id) {
                                    $('#user-status').html('Active now');
                                }
                            }
                        }
                    });
                });
        });
    });

});

