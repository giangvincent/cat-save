<template>
  <div>
    <nav-top></nav-top>
    <div class="row feed-cont">
      <div class="col-2 col-s-3 left"></div>
      <nav-left v-show="sidebar_showup"></nav-left>

      <feed></feed>
      <nav-right></nav-right>
    </div>
    <float-user v-if="!$isMobile"></float-user>
    <goto-top></goto-top>
  </div>
</template>

<script>
// @ is an alias to /src
import NavTop from "@/components/Navigation/Top.vue";
import NavLeft from "@/components/Navigation/Left.vue";
import NavRight from "@/components/Navigation/Right.vue";
import GotoTop from "@/components/Navigation/GotoTop";
import FloatUser from "@/components/Navigation/FloatUserIcon";
import Feed from "@/components/Content/HomeFeed.vue";
import { mapState, mapMutations } from "vuex";

export default {
  name: "home",
  components: {
    NavTop,
    NavLeft,
    NavRight,
    FloatUser,
    GotoTop,
    Feed
  },
  computed: {
    ...mapState({
      sidebar_showup: state => state.sidebar_showup
    })
  },
  mounted() {
    if (!this.$isMobile) {
      this.TOGGLE_SIDEBAR();
    }
  },
  methods: {
    ...mapMutations(["TOGGLE_SIDEBAR"])
  }
};
</script>

<style lang="scss"></style>
