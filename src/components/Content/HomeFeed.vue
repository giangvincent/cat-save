<template>
  <div
    class="col-7 col-s-9 responsive-mobile"
    v-touch:swipe="swipeHandler"
    v-touch:longtap="longtapHandler"
  >
    <post
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
      bottomTime: 0,
      topTime: 0
    };
  },
  computed: {
    ...mapState({ contents: state => state.contents }),
    curPost() {
      return this.contents[this.curIndex].id;
    }
  },
  watch: {
    curIndex: function() {
      this.bottomTime = 0;
      this.topTime = 0;
      console.log("watch current index", this.bottomTime, this.topTime);
      window.scrollTo(
        {
          top: 0,
          left: 0,
          behavior: "smooth"
        },
        200
      );
    }
  },
  mounted() {},
  methods: {
    swipeHandler(direction) {
      if (window.innerWidth < 768) {
        console.log(this.bottomTime, this.topTime, direction);
        if (this.bottomTime > 1 && direction == "top") {
          console.log("swipeHandler : next post");
          this.curIndex =
            this.curIndex < this.contents.length - 1
              ? this.curIndex + 1
              : this.contents.length - 1;
        }

        if (this.topTime > 1 && direction == "bottom") {
          console.log("swipeHandler : prev post");
          this.curIndex = this.curIndex > 0 ? this.curIndex - 1 : 0;
        }
      }
    },
    longtapHandler() {
      console.log("longtapHandler");
    },
    onScrollPost(event) {
      if (event == "bottom") {
        this.bottomTime++;
      }
      if (event == "top") {
        this.topTime++;
      }
    }
  }
};
</script>
