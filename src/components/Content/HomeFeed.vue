<template>
  <div class="col-7 col-s-9 responsive-mobile swiper-container">
    <div class="swiper-wrapper">
      <post class="swiper-slide" v-for="content in contents" :key="content.id" :data="content"></post>
    </div>
  </div>
</template>

<script>
// import Swiper JS
import Swiper from "swiper";
// import Swiper styles
import "swiper/swiper-bundle.css";

import Post from "@/components/Content/Post.vue";
import { mapState } from "vuex";

export default {
  name: "home-feed",
  components: {
    Post
  },
  data() {
    return {};
  },
  computed: {
    ...mapState({ contents: state => state.contents })
  },
  mounted() {},
  updated: function() {
    this.$nextTick(function() {
      alert(window.innerWidth);
      if (window.innerWidth < 768) {
        var mySwiper = new Swiper(".swiper-container", {
          direction: "vertical"
        });
      }
    });
  },
  methods: {}
};
</script>
