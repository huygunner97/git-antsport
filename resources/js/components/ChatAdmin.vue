<template>
    <div class="message">
        <!-- <input type="hidden" name="room_id" :value="user.id" > -->
        <div class="message-title">
            <div class="user-img">
                <img v-if="!user.information || !user.information.img"  src="public/images/user.jpg" alt="">
                <img v-else v-bind:src="'public/upload/user/'+user.information.img" alt="">
            </div>
            <div class="user-name">
                <p>{{ user.name }}</p>
                <p id="user-status" v-if="user.status == 'on'">Active now</p>
                <p v-else>{{user.updated_at}}</p>

            </div>
        </div>

        <div class="message-content">
            <div class="waiting"></div>
            <div class="loader"></div>
            <ul class="chat" >
                <li class="right" v-if="message.user.id === 1"  v-for="(message, key) in messages" v-bind:key="key">
                    <div class="admin">
                        <div class="text-message" :id="message.id">
                            <div class="text" @mouseover="hover(key, 'true')" @mouseleave="hover(key, 'false')">
                                <div class="delete" @click.prevent="deleted(key, message.id)">
                                    <i class="fas fa-trash"></i>
                                </div>
                                <div class="message">
                                    <span>{{ message.message }}</span>
                                </div>
                            </div>
                            <div class="date-message text-md-right">{{message.created_at}}</div>
                        </div>
                        <div class="avatar" >
                            <img v-bind:src="'public/upload/user/'+message.user.information.img " alt="">
                        </div>
                    </div>
                </li>
                <li class="left" v-else >
                    <div class="customer">
                        <div class="avatar">
                            <img v-if="!message.user.information || !message.user.information.img" src="public/images/user.jpg" alt="">
                            <img v-else v-bind:src="'public/upload/user/'+message.user.information.img " alt="">
                        </div>
                        <div class="text-message">
                            <div class="text" @mouseover="hover(key, 'true')" @mouseleave="hover(key, 'false')">
                                <div class="message">
                                    <span>{{ message.message }}</span>
                                </div>
                                <div class="delete" @click.prevent="deleted(key, message.id)">
                                    <i class="fas fa-trash"></i>
                                </div>
                            </div>
                            <div class="date-message text-md-left">{{ message.created_at }}</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="message-submit">
            <div class="input-group">
                <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Nhập tin nhắn..." v-model="newMessage" @keyup.enter="sendMessage">
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props : ['user', 'admin'],

        data() {
            return {
                messages: [],
                newMessage: '',
            }
        },

        created () {
            this.fetchMessages();
            Echo.private('chat.'+this.$roomId)
                .listen('MessageSent', (e) => {
                    this.messages.push(e.message);

                    // auto scroll bottom
                    setTimeout(() => {
                        $('.message-content').animate({scrollTop : $('.message-content').get(0).scrollHeight},300);
                    }, 1);

                });
        },

        methods: {
            fetchMessages() {
                axios.get('messenger/get-messages/'+this.$roomId).then(response => {
                    this.messages = response.data;
                    let data = this.messages;
                    // this.last_id = data[data.length-1].id;


                    setTimeout(function() {
                        let message_content = $('.message-content');

                         message_content.find('.waiting').show();
                        setTimeout(() => {
                            message_content.find('.waiting').hide();
                            message_content.find('.chat').show();
                            message_content.scrollTop(message_content.get(0).scrollHeight);
                        }, 500);

                        let n = 0;  let n1 = 0; let n2 = 0; let height = 0;

                        message_content.find('.chat').children('li').each(function(){
                            n++;
                        });

                        n1 = n;
                        message_content.find('.chat').children('li').each(function(){
                            n1--;
                            if (n1 > 9) {
                                $(this).css('display', 'none');
                            }
                        });

                        if (n > 10) {
                            n = n-10;
                            setTimeout(() => {
                                message_content.find('.loader').show();
                            }, 1005);
                        } else {
                            message_content.find('.loader').hide();
                        }

                        message_content.scroll(function(){
                            if($(this).scrollTop() === 0){
                                if (n > 10) {
                                    n2 = n;
                                    n = n-10;
                                    setTimeout(() => {
                                        message_content.find('.chat').children('li:hidden').each(function(){
                                            n2--;
                                            if (n2 < 10) {
                                                $(this).css('display', 'flex');
                                                height += $(this).height();
                                            }
                                            if (n2 === 0) {
                                                return false;
                                            }
                                        });
                                        message_content.scrollTop(height);
                                        height = 0;
                                    }, 500);

                                } else if((n <= 10) && (n> 0)) {
                                    n2 = n;
                                    n = 0;
                                    setTimeout(() => {
                                        message_content.find('.loader').hide();
                                        message_content.find('.chat').children('li:hidden').each(function(){
                                            n2--;
                                            if (n2 < 10) {
                                                $(this).css('display', 'flex');
                                                height += $(this).height();
                                            }
                                            if (n2 === 0) {
                                                return false;
                                            }
                                            message_content.scrollTop(height);
                                        });
                                    }, 500);
                                } else {
                                }
                            }
                        });
                    });

                });
            },

            sendMessage() {
                let message = this.newMessage;

                // this.last_id++ ;
                if (this.admin.img) {
                    this.messages.push({message:this.newMessage, id:0, created_at:"1 second ago", user:{id: 1, information:this.admin}});
                } else {
                    this.messages.push({message:this.newMessage, id:0, created_at:"1 second ago", user:this.admin});
                }

                axios.post('messenger/add-message/'+this.$roomId, {message}).then(response => {
                    this.messages[this.messages.length - 1 ].id = response.data;
                });

                $('.chat-user').find('.active').find('#message_latest').html('You: '+this.newMessage);
                
                // auto scroll bottom
                setTimeout(() => {
                    $('.message-content').animate({scrollTop : $('.message-content').get(0).scrollHeight},300);
                }, 1);

                this.newMessage = '';

            },

            deleted (key, id) {
                if (confirm("Chắc chắn xóa ?")) {
                    this.messages.splice(key, 1);
                    axios.get('messenger/delete-message/'+id).then(response => {
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