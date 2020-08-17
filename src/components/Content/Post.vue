<template>
  <div class="post row">
    <div class="post-content">
      <div class="post-img col-6 col-s-12">
        <img src="@/assets/images/default.jpg" />

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
          In letter to Congress President Donald Trump calls TikTok a threat to
          national security because the data the app collects. The letter says:
          “This data collection threatens to allow the Chinese Communist Party
          access to Americans' personal and proprietary information...”
          <a>#tiktok</a>
          <a>#hashtag</a>
          <a>#new design</a>
          <a>#fuck anyone</a>
          <a>#fuck anything</a>
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

export default {
  name: "post-detail",
  components: {
    SlideReactTool,
    ContentBtns,
    ReactTool
  }
};
</script>
