<template>
<div class="display-comment-bg">
    <div class="display-comment" v-for="(comment, key) in comments" v-bind:key="key">
        <div class="left">
            <img v-if="!comment.user.information || !comment.user.information.img" v-bind:src="'public/images/user.jpg'" alt="">
            <img v-else v-bind:src="'public/upload/user/'+comment.user.information.img+''" alt="">
        </div>
        <div class="right">
            <div class="user-name">
                <span >{{ comment.user.name }}</span>
                <span>{{comment.created_at}}</span>
            </div>

            <p class="content-comment" >{{ comment.body }}</p>

            <form class="edit-comments" v-if="user!='notLogin'">
                <div class="form-group">
                    <textarea v-if="comment.user.id == user.id" class="form-control textarea textarea-edit" v-model="edit_comment[key]" placeholder="Sửa..."></textarea>
                    <textarea  class="form-control textarea textarea-add" v-model="new_comment[key]" placeholder="Trả lời..."></textarea>
                </div>
                <div class="form-group">
                    <input v-if="comment.user.id == user.id" type="button" class="btn btn-submit submit edit-submit" id="edit-submit" @click.prevent="editComment(key ,comment), displayCancelSubmit(key, 'parent', '')" value="Gửi" />
                    <input type="button" class="btn btn-submit submit add-submit" id="add-submit" @click.prevent="addComment(key, comment), displayCancelSubmit(key, 'parent', '')" value="Gửi" />                
                    <input type="button" class="btn btn-submit function add" id="add" value="Trả lời" @click.prevent="displayAdd(key)" />
                    <input type="button" class="btn btn-submit cancel" id="cancel" value="Hủy" @click.prevent="displayCancelSubmit(key, 'parent', '')" />
                    <input v-if="comment.user.id == user.id" type="button" class="btn btn-submit function edit" id="edit" value="Sửa" @click.prevent="displayEdit(key, 'parent', '')" />
                    <input v-if="comment.user.id == user.id || user && user.level == 1" type="button" class="btn btn-submit delete" id="delete" @click.prevent="deleteComment(key, comment.id)" value="Xóa"  />
                </div>
            </form>

            <div class="display-comment-child" v-for="(comment_child, key_child) in comment.replies" v-bind:key="key_child">
                <div class="left">
                    <img v-if="!comment_child.user.information || !comment_child.user.information.img" v-bind:src="'public/images/user.jpg'" alt="">
                    <img v-else v-bind:src="'public/upload/user/'+comment_child.user.information.img+''" alt="">
                </div>

                <div class="right">
                    <div class="user-name">
                        <span >{{ comment_child.user.name }}</span>
                        <span>{{comment_child.created_at}}</span>
                    </div>
                    <p class="content-comment" >{{ comment_child.body }}</p>
            
                    <form  v-if="comment_child.user.id == user.id"  class="edit-comments">
                        <div class="form-group">
                            <textarea class="form-control textarea textarea-edit-child" v-model="edit_comment_child[key_child]" placeholder="Sửa..."></textarea>
                        </div>
                        <div class="form-group">
                            <input type="button" class="btn btn-submit submit edit-submit-child" id="edit-submit" @click.prevent="editCommentChild(key_child, comment_child), displayCancelSubmit(key, 'child', key_child)" value="Gửi" />
                            <input type="button" class="btn btn-submit cancel-child" id="cancel" value="Hủy" @click.prevent="displayCancelSubmit(key, 'child', key_child)" />
                            <input type="button" class="btn btn-submit function edit-child" id="edit" value="Sửa" @click.prevent="displayEdit(key, 'child', key_child)" />
                            <input type="button" class="btn btn-submit delete-child" id="delete" @click.prevent="deleteCommentChild(key_child, comment_child.id, comment.replies)" value="Xóa"  />
                        </div>
                    </form>

                    <form v-else  class="edit-comments">
                        <div class="form-group">
                            <input v-if="user && user.level == 1" type="button" class="btn btn-submit" id="delete" @click.prevent="deleteCommentChild(key_child, comment_child.id, comment.replies)" value="Xóa"  />
                        </div>
                    </form>
                </div>
            </div>
        </div>
   
    </div>
</div>
</template>

<script>
export default {
    props: [ 'comments', 'user'],

    data() {
        return {
            new_comment: [],
            edit_comment: [],
            edit_comment_child: [],
        };
    },

    methods: {
        
        addComment(key, comment) {
            if (!this.new_comment[key] || this.new_comment[key] == '') {
                alert('Bạn chưa nhập bình luận');
            } else {
                let body = this.new_comment[key];
                let post_id = this.$postId;
                let parent_id = comment.id;
                axios.post('comments/add', {body, post_id, parent_id}).then(response => {
                        comment.replies.push( response.data);
                    });

                this.new_comment[key] = '';
            }
        },

        editComment(key, comment) {
            if (!this.edit_comment[key] || this.edit_comment[key] == '') {
                alert('Bạn chưa nhập bình luận');
            } else {
                comment.body = this.edit_comment[key];

                let body = this.edit_comment[key];
                axios.post('comments/edit/'+comment.id, {body}).then(response => {
                    //
                });
            }
        },

        editCommentChild(key_child, comment_child) {
            if (!this.edit_comment_child[key_child] || this.edit_comment_child[key_child] == '') {
                alert('Bạn chưa nhập bình luận');
            } else {
                comment_child.body = this.edit_comment_child[key_child];

                let body = this.edit_comment_child[key_child];
                axios.post('comments/edit/'+comment_child.id, {body}).then(response => {
                    //
                });
            }
        },

        deleteComment(key, comment_id) {
            if (confirm("Chắc chắn xóa ?")) {
                this.comments.splice(key, 1);
                axios.get('comments/delete/'+comment_id).then(response => {
                    //
                });
            }
        },

        deleteCommentChild(key_child, comment_child_id, comment_replies) {
            if (confirm("Chắc chắn xóa ?")) {
                comment_replies.splice(key_child, 1);
                axios.get('comments/delete/'+comment_child_id).then(response => {
                    //
                });
            }
        },

        displayAdd(key) {

            let display_comment_bg = $('.display-comment-bg');
            let display_comment_key = display_comment_bg.find('.display-comment').get(key);
            let display_comment = display_comment_bg.find(display_comment_key);

            display_comment.find('.textarea-add').show();
            display_comment.find('.add').hide();
            display_comment.find('.edit').hide();
            display_comment.find('.edit-submit').hide();
            display_comment.find('.add-submit').show();
            display_comment.find('.cancel').show();
            display_comment.find('.delete').hide();

        },

        displayEdit(key, relationship, key_child) {

            let display_comment_bg = $('.display-comment-bg');
            let display_comment_key = display_comment_bg.find('.display-comment').get(key);
            let display_comment = display_comment_bg.find(display_comment_key);
            
            if (relationship == 'parent') {

                display_comment.find('.textarea-edit').show();
                display_comment.find('.add').hide();
                display_comment.find('.edit').hide();
                display_comment.find('.edit-submit').show();
                display_comment.find('.add-submit').hide();
                display_comment.find('.cancel').show();
                display_comment.find('.delete').hide();

            } else {

                let display_comment_child_key = display_comment.find('.display-comment-child').get(key_child);
                let display_comment_child = display_comment.find(display_comment_child_key);

                display_comment_child.find('.textarea-edit-child').show();
                display_comment_child.find('.edit-child').hide();
                display_comment_child.find('.edit-submit-child').show();
                display_comment_child.find('.cancel-child').show();
                display_comment_child.find('.delete-child').hide();
            }

        },

        displayCancelSubmit(key, relationship, key_child) {

            let display_comment_bg = $('.display-comment-bg');
            let display_comment_key = display_comment_bg.find('.display-comment').get(key);
            let display_comment = display_comment_bg.find(display_comment_key);
            
            if (relationship == 'parent') {

                display_comment.find('.textarea-edit').hide();
                display_comment.find('.textarea-add').hide();
                display_comment.find('.add').show();
                display_comment.find('.edit').show();
                display_comment.find('.edit-submit').hide();
                display_comment.find('.add-submit').hide();
                display_comment.find('.cancel').hide();
                display_comment.find('.delete').show();

            } else {

                let display_comment_child_key = display_comment.find('.display-comment-child').get(key_child);
                let display_comment_child = display_comment.find(display_comment_child_key);

                display_comment_child.find('.textarea-edit-child').hide();
                display_comment_child.find('.edit-child').show();
                display_comment_child.find('.edit-submit-child').hide();
                display_comment_child.find('.cancel-child').hide();
                display_comment_child.find('.delete-child').show();
            }

        },
    
    }

}
</script>