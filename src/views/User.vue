<template>
  <div>
    <div class="row" style="background-color: #fafafa;">
      <div class="col-4 col-12-s none768"></div>
      <div class="col-4 col-12-s profile-top">
        <div class="avatar">
          <img src="img/2.jpg" />
        </div>
        <p class="huge-title strong">Đãng Linh Dzô</p>
        <p class="huge-title">
          <a href="#" class>@giangdam</a>
        </p>
      </div>
      <div class="col-4 col-12-s none768"></div>
    </div>

    <div class="row">
      <div class="col-2 col-s-12 none768"></div>
      <div class="col-8 col-s-12 padnone768">
        <div class="tablink-f pad-1em">
          <button class="tablink" onclick="openPage('Home', this)" id="defaultOpen">
            <svg class="svg-icon" viewBox="0 0 20 20">
              <path
                d="M4.317,16.411c-1.423-1.423-1.423-3.737,0-5.16l8.075-7.984c0.994-0.996,2.613-0.996,3.611,0.001C17,4.264,17,5.884,16.004,6.88l-8.075,7.984c-0.568,0.568-1.493,0.569-2.063-0.001c-0.569-0.569-0.569-1.495,0-2.064L9.93,8.828c0.145-0.141,0.376-0.139,0.517,0.005c0.141,0.144,0.139,0.375-0.006,0.516l-4.062,3.968c-0.282,0.282-0.282,0.745,0.003,1.03c0.285,0.284,0.747,0.284,1.032,0l8.074-7.985c0.711-0.71,0.711-1.868-0.002-2.579c-0.711-0.712-1.867-0.712-2.58,0l-8.074,7.984c-1.137,1.137-1.137,2.988,0.001,4.127c1.14,1.14,2.989,1.14,4.129,0l6.989-6.896c0.143-0.142,0.375-0.14,0.516,0.003c0.143,0.143,0.141,0.374-0.002,0.516l-6.988,6.895C8.054,17.836,5.743,17.836,4.317,16.411"
              />
            </svg>
            <span>Đang lưu</span>
          </button>

          <button class="tablink" onclick="openPage('News', this)">
            <svg class="svg-icon" viewBox="0 0 20 20">
              <path
                d="M10,6.536c-2.263,0-4.099,1.836-4.099,4.098S7.737,14.732,10,14.732s4.099-1.836,4.099-4.098S12.263,6.536,10,6.536M10,13.871c-1.784,0-3.235-1.453-3.235-3.237S8.216,7.399,10,7.399c1.784,0,3.235,1.452,3.235,3.235S11.784,13.871,10,13.871M17.118,5.672l-3.237,0.014L12.52,3.697c-0.082-0.105-0.209-0.168-0.343-0.168H7.824c-0.134,0-0.261,0.062-0.343,0.168L6.12,5.686H2.882c-0.951,0-1.726,0.748-1.726,1.699v7.362c0,0.951,0.774,1.725,1.726,1.725h14.236c0.951,0,1.726-0.773,1.726-1.725V7.195C18.844,6.244,18.069,5.672,17.118,5.672 M17.98,14.746c0,0.477-0.386,0.861-0.862,0.861H2.882c-0.477,0-0.863-0.385-0.863-0.861V7.384c0-0.477,0.386-0.85,0.863-0.85l3.451,0.014c0.134,0,0.261-0.062,0.343-0.168l1.361-1.989h3.926l1.361,1.989c0.082,0.105,0.209,0.168,0.343,0.168l3.451-0.014c0.477,0,0.862,0.184,0.862,0.661V14.746z"
              />
            </svg>
            <span>Đã đăng</span>
          </button>

          <button class="tablink" onclick="openPage('Contact', this)">
            <svg class="svg-icon" viewBox="0 0 20 20">
              <path
                d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"
              />
            </svg>
            <span>Thông tin</span>
          </button>
        </div>
        <!-- User navbar -->

        <user-saved></user-saved>
        <user-created></user-created>

        <div id="Contact" class="tabcontent">
          <div class="col-12 col-s-12">
            <h2 class="mid-title pad-1em text-center">Quản lý thông tin trên kênh của bạn</h2>

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
                    <label for="country">Giới tính</label>
                  </div>
                  <div class="div-75">
                    <select id="country" name="country">
                      <option value="australia">Nam</option>
                      <option value="canada">Nữ</option>
                      <option value="usa">Khác</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="div-25">
                    <label for="subject">Giới thiệu bản thân</label>
                  </div>
                  <div class="div-75">
                    <textarea
                      id="subject"
                      name="subject"
                      placeholder="Giới thiệu về bản thân hoặc kênh"
                      style="height: 169px;"
                    ></textarea>
                  </div>
                </div>
                <div class="row" style="text-align: right;">
                  <input type="submit" value="Thay đổi thông tin" class="btn-huge" />
                </div>
              </form>
            </div>

            <div class="cont-input">
              <form action="/action_page.php">
                <div class="row">
                  <div class="div-25">
                    <label for="fname">Mật khẩu hiện tại</label>
                  </div>
                  <div class="div-75">
                    <input
                      type="password"
                      id="fname"
                      name="firstname"
                      placeholder="Mật khẩu hiện tại"
                    />
                  </div>
                </div>
                <div class="row">
                  <div class="div-25">
                    <label for="lname">Mật khẩu mới</label>
                  </div>
                  <div class="div-75">
                    <input type="password" id="lname" name="lastname" placeholder="Mật khẩu mới" />
                  </div>
                </div>

                <div class="row" style="text-align: right;">
                  <input type="submit" value="Đổi mật khẩu" class="btn-huge" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="col-2 col-s-12 none768"></div>
    </div>
    <div class="back">
      <back-to-home></back-to-home>
    </div>
  </div>
</template>

<script>
/* eslint-disable vue/no-unused-components */
import BackToHome from "@/components/Navigation/BackToHome.vue";
import SlideReactTool from "@/components/Editor/SlideReactTool.vue";
import ContentBtns from "@/components/Content/ContentBtns.vue";
import UserCreated from "@/components/Content/UserCreated.vue";
import UserSaved from "@/components/Content/UserSaved.vue";
export default {
  name: "User",
  components: {
    BackToHome,
    SlideReactTool,
    ContentBtns,
    UserCreated,
    UserSaved
  }
};
</script>

<style></style>
