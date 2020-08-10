<template>
  <div class="row">
    <div class="col-3 col-s-12 none768"></div>
    <div class="col-6 col-s-12 padnone768">
      <div class="col-12 col-s-12 padnone768">
        <div class="pad-1em-0 flex">
          <div class="flex-1">
            <back-to-home></back-to-home>
          </div>
          <div class="flex-2">logo</div>
          <div class="flex-1"></div>
        </div>
        <div class="tablink-f">
          <button class="tablink" onclick="openPage('Home', this)" id="defaultOpen">
            <svg class="svg-icon" viewBox="0 0 20 20">
              <path
                fill="none"
                d="M10,10.9c2.373,0,4.303-1.932,4.303-4.306c0-2.372-1.93-4.302-4.303-4.302S5.696,4.223,5.696,6.594C5.696,8.969,7.627,10.9,10,10.9z M10,3.331c1.801,0,3.266,1.463,3.266,3.263c0,1.802-1.465,3.267-3.266,3.267c-1.8,0-3.265-1.465-3.265-3.267C6.735,4.794,8.2,3.331,10,3.331z"
              />
              <path
                fill="none"
                d="M10,12.503c-4.418,0-7.878,2.058-7.878,4.685c0,0.288,0.231,0.52,0.52,0.52c0.287,0,0.519-0.231,0.519-0.52c0-1.976,3.132-3.646,6.84-3.646c3.707,0,6.838,1.671,6.838,3.646c0,0.288,0.234,0.52,0.521,0.52s0.52-0.231,0.52-0.52C17.879,14.561,14.418,12.503,10,12.503z"
              />
            </svg>
            <span>Đăng nhập</span>
          </button>

          <button class="tablink" onclick="openPage('News', this)">
            <svg class="svg-icon" viewBox="0 0 20 20">
              <path
                d="M18.303,4.742l-1.454-1.455c-0.171-0.171-0.475-0.171-0.646,0l-3.061,3.064H2.019c-0.251,0-0.457,0.205-0.457,0.456v9.578c0,0.251,0.206,0.456,0.457,0.456h13.683c0.252,0,0.457-0.205,0.457-0.456V7.533l2.144-2.146C18.481,5.208,18.483,4.917,18.303,4.742 M15.258,15.929H2.476V7.263h9.754L9.695,9.792c-0.057,0.057-0.101,0.13-0.119,0.212L9.18,11.36h-3.98c-0.251,0-0.457,0.205-0.457,0.456c0,0.253,0.205,0.456,0.457,0.456h4.336c0.023,0,0.899,0.02,1.498-0.127c0.312-0.077,0.55-0.137,0.55-0.137c0.08-0.018,0.155-0.059,0.212-0.118l3.463-3.443V15.929z M11.241,11.156l-1.078,0.267l0.267-1.076l6.097-6.091l0.808,0.808L11.241,11.156z"
              />
            </svg>

            <span>Đăng ký</span>
          </button>

          <button class="tablink" onclick="openPage('Contact', this)">
            <svg class="svg-icon" viewBox="0 0 20 20">
              <path
                d="M15.396,2.292H4.604c-0.212,0-0.385,0.174-0.385,0.386v14.646c0,0.212,0.173,0.385,0.385,0.385h10.792c0.211,0,0.385-0.173,0.385-0.385V2.677C15.781,2.465,15.607,2.292,15.396,2.292 M15.01,16.938H4.99v-2.698h1.609c0.156,0.449,0.586,0.771,1.089,0.771c0.638,0,1.156-0.519,1.156-1.156s-0.519-1.156-1.156-1.156c-0.503,0-0.933,0.321-1.089,0.771H4.99v-3.083h1.609c0.156,0.449,0.586,0.771,1.089,0.771c0.638,0,1.156-0.518,1.156-1.156c0-0.638-0.519-1.156-1.156-1.156c-0.503,0-0.933,0.322-1.089,0.771H4.99V6.531h1.609C6.755,6.98,7.185,7.302,7.688,7.302c0.638,0,1.156-0.519,1.156-1.156c0-0.638-0.519-1.156-1.156-1.156c-0.503,0-0.933,0.322-1.089,0.771H4.99V3.062h10.02V16.938z M7.302,13.854c0-0.212,0.173-0.386,0.385-0.386s0.385,0.174,0.385,0.386s-0.173,0.385-0.385,0.385S7.302,14.066,7.302,13.854 M7.302,10c0-0.212,0.173-0.385,0.385-0.385S8.073,9.788,8.073,10s-0.173,0.385-0.385,0.385S7.302,10.212,7.302,10 M7.302,6.146c0-0.212,0.173-0.386,0.385-0.386s0.385,0.174,0.385,0.386S7.899,6.531,7.688,6.531S7.302,6.358,7.302,6.146"
              />
            </svg>
            <span>Điều khoản</span>
          </button>
        </div>

        <div id="Home" class="tabcontent">
          <div class="cont-input">
            <form action="/action_page.php">
              <div class="row">
                <div class="div-25">
                  <label for="fname">Địa chỉ email</label>
                </div>
                <div class="div-75">
                  <input type="text" id="fname" name="firstname" placeholder="Địa chỉ email" />
                </div>
              </div>
              <div class="row">
                <div class="div-25">
                  <label for="lname">Mật khẩu</label>
                </div>
                <div class="div-75">
                  <input type="password" id="lname" name="lastname" placeholder="Mật khẩu" />
                </div>
              </div>

              <div class="row" style="text-align: right;">
                <input type="submit" value="Thay đổi thông tin" class="btn-huge" />
              </div>
            </form>
          </div>
        </div>

        <div id="News" class="tabcontent">
          <div class="cont-input">
            <form action="/action_page.php">
              <div class="row">
                <div class="div-25">
                  <label for="fname">Nickname</label>
                </div>
                <div class="div-75">
                  <input
                    type="text"
                    id="fname"
                    name="firstname"
                    placeholder="Điền tên hoặc Nickname"
                  />
                </div>
              </div>
              <div class="row">
                <div class="div-25">
                  <label for="lname">Địa chỉ email</label>
                </div>
                <div class="div-75">
                  <input type="text" id="lname" name="lastname" placeholder="Địa chỉ email" />
                </div>
              </div>
              <div class="row">
                <div class="div-25">
                  <label for="lname">Mật khẩu</label>
                </div>
                <div class="div-75">
                  <input type="password" id="lname" name="lastname" placeholder="Nhập mật khẩu" />
                </div>
              </div>
              <div class="row">
                <div class="div-25">
                  <label for="lname">Nhập lại mật khẩu</label>
                </div>
                <div class="div-75">
                  <input type="password" id="lname" name="lastname" placeholder="Nhập lại mật khẩu" />
                </div>
              </div>

              <div class="row" style="text-align: right;">
                <button type="submit" class="btn-huge">Thay đổi thông tin</button>
              </div>
            </form>
          </div>
        </div>

        <div id="Contact" class="tabcontent">
          <div class="col-12 col-s-12">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
              enim ad minim veniam, quis nostrud exercitation ullamco laboris
              nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
              reprehenderit in voluptate velit esse cillum dolore eu fugiat
              nulla pariatur. Excepteur sint occaecat cupidatat non proident,
              sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <br />
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
              enim ad minim veniam, quis nostrud exercitation ullamco laboris
              nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
              reprehenderit in voluptate velit esse cillum dolore eu fugiat
              nulla pariatur. Excepteur sint occaecat cupidatat non proident,
              sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <br />
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
              enim ad minim veniam, quis nostrud exercitation ullamco laboris
              nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
              reprehenderit in voluptate velit esse cillum dolore eu fugiat
              nulla pariatur. Excepteur sint occaecat cupidatat non proident,
              sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-3 col-s-12 none768"></div>
  </div>
</template>

<script>
import BackToHome from "@/components/Navigation/BackToHome.vue";
export default {
  name: "Login",
  components: {
    BackToHome
  }
};
</script>
