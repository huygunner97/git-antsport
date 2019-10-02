<template>
    <div class="card card-default">
        <i class="fas fa-times-circle exit"></i>
        <div class="card-header">
            <img src="public/images/logo.png" alt="">
            <span>Ant Sport</span>
        </div>

        <div class="card-body">
            <div class="loader"></div>
            <ul class="chat">
                <li class="left" v-if="message.user.id === 1" v-for="(message, key) in messages" v-bind:key="key">
                    <div class="admin">
                        <div class="avatar">
                            <img src="public/images/logo.png" alt="">
                        </div>
                        <div class="text-message">
                            <div class="text">
                                <span>{{ message.message }}</span>
                            </div>
                            <div class="delete" ></div>
                            <div class="date-message text-md-left">{{ message.created_at }}</div>
                        </div>
                    </div>
                </li>
                <li class="right" v-else >
                    <div class="customer">
                        <div class="text-message">
                            <div class="text" @mouseover="hover(key, 'true')" @mouseleave="hover(key, 'false')">
                                <div class="delete" >
                                    <i class="fas fa-trash delete-icon" @click.prevent="deleted(key, message.id)"></i>
                                </div>
                                <div class="message" >
                                    <span>{{ message.message }}</span>
                                </div>
                            </div>
                            <div class="date-message text-md-right">{{message.created_at}}</div>
                        </div>
                        <div class="avatar" >
                            <img v-if="message.user.information && message.user.information.img" v-bind:src="'public/upload/user/'+message.user.information.img " alt="">
                            <img v-else src="public/images/user.jpg" alt="">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <div class="input-group">
                <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Nhập tin nhắn..." v-model="newMessage" @keyup.enter="sendMessage">
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        props : ['user'],

        data() {
            return {
                messages: [],
                newMessage: '',
            }
        },

        created () {
            this.fetchMessages();
            Echo.private('chat.'+this.$userId)
                .listen('MessageSent', (e) => {
                    this.messages.push(e.message);

                    // auto scroll bottom
                    var scrollToBottom = $('#chat-support').find('.card-body');
                    setTimeout(() => {
                        scrollToBottom.animate({scrollTop : scrollToBottom.get(0).scrollHeight},300);
                    }, 1);

                });
        },

        methods: {
            fetchMessages() {
                axios.get('messages').then(response => {
                    this.messages = response.data;

                    setTimeout(function() {
                        let chat = $('#chat-support');
                        let scrollAuto = chat.find('.card-body');

                        scrollAuto.find('.loader').fadeIn();

                        let n = 0 ; let n1 = 0;  let n2 = 0; let height = 0;

                        scrollAuto.find('.chat').children('li').each(function(){
                            n++;
                        });

                        n1 = n;
                        scrollAuto.find('.chat').children('li').each(function(){
                            n1--;
                            if (n1 > 9) {
                                $(this).css('display', 'none');
                            }
                        });

                        if (n > 10) {
                            n = n-10;
                            scrollAuto.find('.loader').show();
                        } else {
                            scrollAuto.find('.loader').hide();
                        }

                        scrollAuto.scroll(function(){
                            if($(this).scrollTop() === 0){
                                if (n > 10) {
                                    n2 = n;
                                    n = n-10;
                                    setTimeout(() => {
                                        scrollAuto.find('.chat').children('li:hidden').each(function(){
                                            n2--;
                                            if (n2 < 10) {
                                                $(this).css('display', 'flex');
                                                height += $(this).height();
                                            }
                                            if (n2 == 0) {
                                                return false;
                                            }
                                        });
                                        scrollAuto.scrollTop(height);
                                        height = 0;
                                    }, 500);

                                } else {
                                    n2 = n;
                                    n = 0;
                                    setTimeout(() => {
                                        scrollAuto.find('.loader').hide();
                                        scrollAuto.find('.chat').children('li:hidden').each(function(){
                                            n2--;
                                            if (n2 < 10) {
                                                $(this).css('display', 'flex');
                                                height += $(this).height();
                                            }
                                            if (n2 == 0) {
                                                return false;
                                            }
                                            scrollAuto.scrollTop(height);
                                        });
                                    }, 500);
                                } 
                            }
                        });

                    }, 500);

                });
            },

            sendMessage() {
                let message = this.newMessage;

                if (this.user.img) {
                    this.messages.push({message:this.newMessage, id:0, created_at:"1 second ago", user:{information:this.user}});
                } else {
                    this.messages.push({message:this.newMessage, id:0, created_at:"1 second ago", user:this.user});
                }

                axios.post('messages', {message}).then(response => {
                    this.messages[this.messages.length - 1 ].id = response.data
                });
                
                // auto scroll bottom
                var scrollToBottom = $('#chat-support').find('.card-body');
                setTimeout(() => {
                    scrollToBottom.animate({scrollTop : scrollToBottom.get(0).scrollHeight},300);
                }, 1);

                this.newMessage = '';
            },

            deleted (key, id) {
                if (confirm("Chắc chắn xóa ?")) {
                    this.messages.splice(key, 1);
                    axios.get('messages/delete-messages/'+id).then(response => {
                        //
                    });
                }
            },

            hover (key, string) {
                let delete_icon = $('.delete').get(key);
                if (string == 'true') {
                    $('.text-message').find(delete_icon).css('opacity', 1);
                } else {
                    $('.text-message').find(delete_icon).css('opacity', 0);
                }
            }
        }
    }
</script>