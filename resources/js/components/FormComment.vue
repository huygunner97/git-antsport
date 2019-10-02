<template>
    <form >
        <div class="form-group">
            <textarea class="form-control textarea" v-model="newComment" placeholder="Thêm bình luận..." ></textarea>
            <span v-text="warning" style="color:red;font-size:13px"></span>
        </div>
        <div class="form-group">
            <input type="submit" @click.prevent="onSubmit" class="btn btn-submit" value="Bình luận" />
        </div>
    </form>
</template>

<script>
export default {

    data() {
        return {
            newComment : '',
            warning: '',
        };
    },

    methods: {
        onSubmit() {
            if (this.newComment == '') {
                this.warning = 'Bạn chưa nhập bình luận';
            } else {
                this.$emit('commentsent', {
                    comment: this.newComment,
                });

                this.newComment = '';
                this.warning = '';
            }
        }
    }

}
</script>