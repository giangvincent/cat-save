<template>
  <div class="col-7 col-s-9 responsive-mobile">
    <post></post>
  </div>
</template>

<script>
import Post from "@/components/Content/Post.vue";

export default {
  name: "home-feed",
  components: {
    Post
  }
};
</script>
