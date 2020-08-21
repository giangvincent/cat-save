<template>
  <div class="post row">
    <div class="post-content" style="background: #fff" @scroll="onScroll">
      <div class="post-img col-6 col-s-12">
        <img :src="curImage" crossorigin="anonymous" />

        <div class="col-6 col-s-12 slide-tool">
          <slide-react-tool></slide-react-tool>
        </div>
      </div>

      <div class="col-6 col-s-12">
        <div class="avatar">
          <img src="img/2.jpg" />
        </div>

        <div class="post-tit">
          <span class="strong">
            <router-link to="/user">@giangdam</router-link>
          </span>
          {{ curTitle }}
          <a
            v-for="tag in curTags"
            :key="`${content.id}-hashtag-${tag}`"
          >#{{tag}}</a>
        </div>
        <div class="post-data flex pad-1em-0">
          <div class="flex-1">
            <span class="post-data-num">696</span>
            <span>lượt yêu thích</span>
          </div>
          <div class="flex-1">
            <span class="post-data-num">125</span>
            <span>lượt lưu trữ</span>
          </div>
        </div>
      </div>

      <div class="col-6 col-s-12 post-btn">
        <content-btns></content-btns>
      </div>

      <div class="col-6 col-s-12 post-tool">
        <react-tool>3/69 Lượt tương tác</react-tool>
      </div>
    </div>
  </div>
</template>

<script>
import SlideReactTool from "@/components/Editor/SlideReactTool.vue";
import ContentBtns from "@/components/Content/ContentBtns.vue";
import ReactTool from "@/components/Content/ReactTool.vue";
import { mapState } from "vuex";

export default {
  name: "post-detail",
  components: {
    SlideReactTool,
    ContentBtns,
    ReactTool
  },
  props: {
    content: Object
  },
  data() {
    return {
      defaultImage: "../../assets/images/default.jpg",
      indexImage: 0,
      bottomTime: 0,
      topTime: 0
    };
  },
  computed: {
    ...mapState({
      apiUrl: state => state.apiUrl
    }),
    curTags() {
      if (typeof this.content.hashtags !== "undefined") {
        var tags = JSON.parse(this.content.hashtags);
        if (tags.length > 0) {
          return tags;
        }
      }
      return [];
    },
    curImage() {
      if (typeof this.content.images !== "undefined") {
        var images = JSON.parse(this.content.images);
        if (images.length > 0) {
          return this.apiUrl + "/" + images[this.indexImage];
        }
      }

      return this.defaultImage;
    },
    curTitle() {
      if (typeof this.content.title !== "undefined") {
        return this.content.title;
      }
      return "";
    }
  },
  watch: {
    content: {
      handler: function(val) {
        console.log("new post ", val);
        this.bottomTime = 0;
        this.topTime = 0;
      },
      deep: true
    }
  },
  methods: {
    onScroll({ target: { scrollTop, clientHeight, scrollHeight } }) {
      if (scrollTop + clientHeight >= scrollHeight) {
        this.$emit("onScroll", [this.bottomTime++, "bottom"]);
      }
      if (scrollTop <= 0) {
        this.$emit("onScroll", [this.topTime++, "top"]);
      }
    }
  }
};
</script>
