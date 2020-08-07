<template>
  <div>
    <Navbar></Navbar>
    <div class="row feed-cont">
      <div class="col-3 col-s-3 left"></div>
      <SideNavbar v-show="sidebar_showup"></SideNavbar>

      <div class="col-6 col-s-9 responsive-mobile">
        <div class="post">
          <div class="post-tit">
            <span>
              <a href="#">@giangdam</a>
            </span>
            - Tiêu đề bài post được show ra ở đây, nội dung có thể xuống hàng và
            tốt nhất nên dài như twitter bro
          </div>
          <div class="post-content">
            <div class="post-img">
              <img src="img/1.jpg" />
            </div>
            <ul class="post-right">
              <li class="avatar">
                <img src="img/2.jpg" />
              </li>
              <li>
                <button class="btn-basic btn-tool">
                  <svg class="svg-icon" viewBox="0 0 20 20">
                    <path
                      d="M4.317,16.411c-1.423-1.423-1.423-3.737,0-5.16l8.075-7.984c0.994-0.996,2.613-0.996,3.611,0.001C17,4.264,17,5.884,16.004,6.88l-8.075,7.984c-0.568,0.568-1.493,0.569-2.063-0.001c-0.569-0.569-0.569-1.495,0-2.064L9.93,8.828c0.145-0.141,0.376-0.139,0.517,0.005c0.141,0.144,0.139,0.375-0.006,0.516l-4.062,3.968c-0.282,0.282-0.282,0.745,0.003,1.03c0.285,0.284,0.747,0.284,1.032,0l8.074-7.985c0.711-0.71,0.711-1.868-0.002-2.579c-0.711-0.712-1.867-0.712-2.58,0l-8.074,7.984c-1.137,1.137-1.137,2.988,0.001,4.127c1.14,1.14,2.989,1.14,4.129,0l6.989-6.896c0.143-0.142,0.375-0.14,0.516,0.003c0.143,0.143,0.141,0.374-0.002,0.516l-6.988,6.895C8.054,17.836,5.743,17.836,4.317,16.411"
                    />
                  </svg>
                  <span>Lưu lại</span>
                </button>
              </li>
              <li>
                <button class="btn-basic btn-tool">
                  <svg class="svg-icon" viewBox="0 0 20 20">
                    <path
                      d="M12.319,5.792L8.836,2.328C8.589,2.08,8.269,2.295,8.269,2.573v1.534C8.115,4.091,7.937,4.084,7.783,4.084c-2.592,0-4.7,2.097-4.7,4.676c0,1.749,0.968,3.337,2.528,4.146c0.352,0.194,0.651-0.257,0.424-0.529c-0.415-0.492-0.643-1.118-0.643-1.762c0-1.514,1.261-2.747,2.787-2.747c0.029,0,0.06,0,0.09,0.002v1.632c0,0.335,0.378,0.435,0.568,0.245l3.483-3.464C12.455,6.147,12.455,5.928,12.319,5.792 M8.938,8.67V7.554c0-0.411-0.528-0.377-0.781-0.377c-1.906,0-3.457,1.542-3.457,3.438c0,0.271,0.033,0.542,0.097,0.805C4.149,10.7,3.775,9.762,3.775,8.76c0-2.197,1.798-3.985,4.008-3.985c0.251,0,0.501,0.023,0.744,0.069c0.212,0.039,0.412-0.124,0.412-0.34v-1.1l2.646,2.633L8.938,8.67z M14.389,7.107c-0.34-0.18-0.662,0.244-0.424,0.529c0.416,0.493,0.644,1.118,0.644,1.762c0,1.515-1.272,2.747-2.798,2.747c-0.029,0-0.061,0-0.089-0.002v-1.631c0-0.354-0.382-0.419-0.558-0.246l-3.482,3.465c-0.136,0.136-0.136,0.355,0,0.49l3.482,3.465c0.189,0.186,0.568,0.096,0.568-0.245v-1.533c0.153,0.016,0.331,0.022,0.484,0.022c2.592,0,4.7-2.098,4.7-4.677C16.917,9.506,15.948,7.917,14.389,7.107 M12.217,15.238c-0.251,0-0.501-0.022-0.743-0.069c-0.212-0.039-0.411,0.125-0.411,0.341v1.101l-2.646-2.634l2.646-2.633v1.116c0,0.174,0.126,0.318,0.295,0.343c0.158,0.024,0.318,0.034,0.486,0.034c1.905,0,3.456-1.542,3.456-3.438c0-0.271-0.032-0.541-0.097-0.804c0.648,0.719,1.022,1.659,1.022,2.66C16.226,13.451,14.428,15.238,12.217,15.238"
                    />
                  </svg>
                  <span>Cải tiến</span>
                </button>
              </li>
              <li>
                <button class="btn-basic btn-tool">
                  <svg class="svg-icon" viewBox="0 0 20 20">
                    <path
                      fill="none"
                      d="M3.936,7.979c-1.116,0-2.021,0.905-2.021,2.021s0.905,2.021,2.021,2.021S5.957,11.116,5.957,10
								S5.052,7.979,3.936,7.979z M3.936,11.011c-0.558,0-1.011-0.452-1.011-1.011s0.453-1.011,1.011-1.011S4.946,9.441,4.946,10
								S4.494,11.011,3.936,11.011z M16.064,7.979c-1.116,0-2.021,0.905-2.021,2.021s0.905,2.021,2.021,2.021s2.021-0.905,2.021-2.021
								S17.181,7.979,16.064,7.979z M16.064,11.011c-0.559,0-1.011-0.452-1.011-1.011s0.452-1.011,1.011-1.011S17.075,9.441,17.075,10
								S16.623,11.011,16.064,11.011z M10,7.979c-1.116,0-2.021,0.905-2.021,2.021S8.884,12.021,10,12.021s2.021-0.905,2.021-2.021
								S11.116,7.979,10,7.979z M10,11.011c-0.558,0-1.011-0.452-1.011-1.011S9.442,8.989,10,8.989S11.011,9.441,11.011,10
								S10.558,11.011,10,11.011z"
                    />
                  </svg>
                  <span>Chọn</span>
                </button>
              </li>
            </ul>
          </div>
          <div class="post-under">
            <button class="save btn-huge">Lưu lại</button>
          </div>
        </div>
      </div>

      <div class="col-3 col-s-12">
        <div class="right">
          <div class="aside div-right">
            <h2>What the fuck is the website?</h2>
            <p>
              Oh, this fucking website for English learner who improve Vocabs
              more-da-fucker!
            </p>
            <br />
            <h2>Who the fuck create this shit</h2>
            <p>Just only Gian, i dont know anything, dont find me !</p>
            <br />
            <h2>How the fuck i use this website ?</h2>
            <p>
              Hum, you see that hashtag ? the hashtag show "How to use", yeah !
              now, you smarter homie !
            </p>
          </div>

          <div class="div-right">
            <h2 class="mid-title">Đăng nhập để lưu lại nội dung hữu ích vào kho lưu trữ của bạn</h2>
            <button class="btn-tool btn-100 btn-basic">Đăng nhập</button>
          </div>

          <div class="box div-right">
            <h2 class="mid-title">
              <svg
                class="svg-icon"
                version="1.1"
                id="Layer_1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px"
                y="0px"
                viewBox="0 0 122.88 68.04"
                style="enable-background:new 0 0 122.88 68.04"
                xml:space="preserve"
              >
                <g>
                  <path
                    d="M2.03,56.52c-2.66,2.58-2.72,6.83-0.13,9.49c2.58,2.66,6.83,2.72,9.49,0.13l27.65-26.98l23.12,22.31 c2.67,2.57,6.92,2.49,9.49-0.18l37.77-38.22v19.27c0,3.72,3.01,6.73,6.73,6.73s6.73-3.01,6.73-6.73V6.71h-0.02 c0-1.74-0.67-3.47-2-4.78c-1.41-1.39-3.29-2.03-5.13-1.91H82.4c-3.72,0-6.73,3.01-6.73,6.73c0,3.72,3.01,6.73,6.73,6.73h17.63 L66.7,47.2L43.67,24.97c-2.6-2.5-6.73-2.51-9.33,0.03L2.03,56.52L2.03,56.52z"
                  />
                </g>
              </svg>
              Những kênh nổi bật
            </h2>
            <div class="huge-list">
              <div class="_left">
                <div class="avatar">
                  <img src="img/2.jpg" />
                </div>
              </div>
              <div class="_right">
                <p>Vincent Sexy Boy Danang Hero</p>
                <p>
                  <a href="#">@giangdo.vincent</a>
                </p>
              </div>
            </div>

            <div class="huge-list">
              <div class="_left">
                <div class="avatar">
                  <img src="img/2.jpg" />
                </div>
              </div>
              <div class="_right">
                <p>Vincent Sexy Boy Danang Hero</p>
                <p>
                  <a href="#">@giangdo.vincent</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Navbar from "@/components/Navbar.vue";
import SideNavbar from "@/components/SideNavbar.vue";
import "@/assets/main.css";
import { mapState } from "vuex";

export default {
  name: "home",
  components: {
    Navbar,
    SideNavbar
  },
  computed: {
    ...mapState({
      sidebar_showup: state => state.sidebar_showup
    })
  }
};
</script>

<style lang="scss"></style>
