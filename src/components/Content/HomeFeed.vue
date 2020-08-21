<template>
  <div
    class="col-7 col-s-9 responsive-mobile"
    v-touch:swipe="swipeHandler"
    v-touch:longtap="longtapHandler"
  >
    <post
      class="swiper-slide"
      v-for="content in contents"
      :key="content.id"
      :content="content"
      v-show="curPost === content.id"
      @onScroll="onScrollPost"
    ></post>
  </div>
</template>

<script>
import Post from "@/components/Content/Post.vue";
import { mapState } from "vuex";

export default {
  name: "home-feed",
  components: {
    Post
  },
  data() {
    return {
      curIndex: 0,
      readyForNext: false
    };
  },
  computed: {
    ...mapState({ contents: state => state.contents }),
    curPost() {
      return this.contents[this.curIndex].id;
    }
  },
  mounted() {},
  methods: {
    swipeHandler(direction) {
      console.log(this.readyForNext);
      if (
        this.readyForNext[0] > 0 &&
        this.readyForNext[1] == "bottom" &&
        direction == "top"
      ) {
        console.log("swipeHandler to bottom with", direction);
        this.curIndex =
          this.curIndex <= this.contents.length
            ? this.curIndex + 1
            : this.contents.length;
      }

      if (
        this.readyForNext[0] > 0 &&
        this.readyForNext[1] == "top" &&
        direction == "bottom"
      ) {
        console.log("swipeHandler to top with", direction);
        this.curIndex = this.curIndex > 0 ? this.curIndex - 1 : 0;
      }
    },
    longtapHandler() {
      console.log("longtapHandler");
    },
    onScrollPost(event) {
      this.readyForNext = event;
    }
  }
};
</script>
