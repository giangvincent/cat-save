<template>
  <div id="News" class="tabcontent">
    <h2 class="pad-1em text-center">Các bài đăng bạn đã đăng</h2>
    <post></post>
  </div>
</template>

<script>
import Post from "@/components/Content/Post.vue";

export default {
  name: "user-created-feed",
  components: {
    Post
  }
};
</script>
