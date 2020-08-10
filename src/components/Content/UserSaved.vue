<template>
  <div id="Home" class="tabcontent">
    <h2 class="pad-1em text-center">Các bài đăng bạn đang lưu</h2>
    <post></post>
  </div>
</template>

<script>
import Post from "@/components/Content/Post.vue";

export default {
  name: "user-saved-feed",
  components: {
    Post
  }
};
</script>
