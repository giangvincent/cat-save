<template>
  <div class="go-to-profile">
    <div class="flex g2p-cont">
      <div class="_left">
        <router-link :to="`/user/${user.id}`">
          <div class="avatar">
            <img :src="avatar" />
          </div>
        </router-link>
      </div>
      <div class="_right">
        <p>{{ user.name }}</p>
        <p class="sm-title">
          <router-link :to="`/user/${user.id}`">Trang cá nhân</router-link>
        </p>
        <p class="sm-title">
          <a @click="logOut">Đăng xuất</a>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
export default {
  name: "float-user",
  computed: {
    ...mapState({
      user: state => state.userActions.user
    }),
    avatar: function() {
      if (this.user.avatar !== null) {
        return this.user.avatar;
      }
      return "../assets/images/default_avatar.jpg";
    }
  },
  methods: {
    ...mapActions(["AUTH_LOGOUT"]),
    logOut() {
      this.AUTH_LOGOUT().then(() => {
        this.$router.push("/");
      });
    }
  }
};
</script>