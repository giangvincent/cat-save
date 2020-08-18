<template>
  <div class="row" style="background-color: #000; width: 100%;">
    <div class="col-2 col-s-12 none768"></div>
    <div class="col-8 col-s-12 padnone768" style="background-color: #fff;">
      <back-to-home></back-to-home>
      <div class="row">
        <div>
          <p>
            Hướng dẫn về đăng bài viết ra tại đây tạm thời chưa có nội dung nên
            để text tạm...
          </p>
        </div>
        <div class="re">
          <div class="post-img col-7 col-s-12" style="overflow: hidden">
            <div ref="defaultImage">
              <img src="@/assets/images/default.jpg" v-if="!startCreate" />
            </div>
            <div id="createToolContainer" @click="clickCanvasHandle()">
              <canvas
                id="createCanvas"
                :width="canvasSize[0]"
                :height="canvasSize[1]"
                style="position: absolute;"
              ></canvas>
            </div>

            <canvas id="finalCanvas" width="675" height="900" style="display: none"></canvas>

            <div class="img-editor">
              <button v-show="showTextTool" class="btn-basic btn-100" @click="doneEditText()">
                <svg class="svg-icon" viewBox="0 0 20 20">
                  <path
                    fill="none"
                    d="M7.197,16.963H7.195c-0.204,0-0.399-0.083-0.544-0.227l-6.039-6.082c-0.3-0.302-0.297-0.788,0.003-1.087
                      C0.919,9.266,1.404,9.269,1.702,9.57l5.495,5.536L18.221,4.083c0.301-0.301,0.787-0.301,1.087,0c0.301,0.3,0.301,0.787,0,1.087
                      L7.741,16.738C7.596,16.882,7.401,16.963,7.197,16.963z"
                  />
                </svg>
              </button>
              <!-- Done text tool -->

              <ul class="slide-dot" v-show="showTextTool">
                <li
                  v-for="color in colorList"
                  :key="color"
                  :style="{ 'background-color': color }"
                  @click="changeTextColor(color)"
                ></li>
              </ul>

              <button v-show="showTextTool" class="btn-basic btn-100" @click="cancelEditText()">
                <svg class="svg-icon" viewBox="0 0 20 20">
                  <path
                    fill="none"
                    d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"
                  />
                </svg>
              </button>
              <!-- Cancel text tool -->

              <button v-show="startCreate" class="btn-basic btn-100" @click="createText()">
                <svg class="svg-icon" viewBox="0 0 20 20">
                  <path
                    fill="none"
                    d="M12.871,9.337H7.377c-0.304,0-0.549,0.246-0.549,0.549c0,0.303,0.246,0.55,0.549,0.55h5.494
                      c0.305,0,0.551-0.247,0.551-0.55C13.422,9.583,13.176,9.337,12.871,9.337z M15.07,6.04H5.179c-0.304,0-0.549,0.246-0.549,0.55
                      c0,0.303,0.246,0.549,0.549,0.549h9.891c0.303,0,0.549-0.247,0.549-0.549C15.619,6.286,15.373,6.04,15.07,6.04z M17.268,1.645
                      H2.981c-0.911,0-1.648,0.738-1.648,1.648v10.988c0,0.912,0.738,1.648,1.648,1.648h4.938l2.205,2.205l2.206-2.205h4.938
                      c0.91,0,1.648-0.736,1.648-1.648V3.293C18.916,2.382,18.178,1.645,17.268,1.645z M17.816,13.732c0,0.607-0.492,1.1-1.098,1.1
                      h-4.939l-1.655,1.654l-1.656-1.654H3.531c-0.607,0-1.099-0.492-1.099-1.1v-9.89c0-0.607,0.492-1.099,1.099-1.099h13.188
                      c0.605,0,1.098,0.492,1.098,1.099V13.732z"
                  />
                </svg>
              </button>
              <!-- Add text + Show text tool -->
              <button class="btn-basic btn-100" @click="triggerPreviewImage()">
                <svg class="svg-icon" viewBox="0 0 20 20">
                  <path
                    fill="none"
                    d="M6.523,7.683c0.96,0,1.738-0.778,1.738-1.738c0-0.96-0.778-1.738-1.738-1.738c-0.96,0-1.738,0.778-1.738,1.738
                      C4.785,6.904,5.563,7.683,6.523,7.683z M5.944,5.365h1.159v1.159H5.944V5.365z M18.113,0.729H1.888
                      c-0.64,0-1.159,0.519-1.159,1.159v16.224c0,0.64,0.519,1.159,1.159,1.159h16.225c0.639,0,1.158-0.52,1.158-1.159V1.889
                      C19.271,1.249,18.752,0.729,18.113,0.729z M18.113,17.532c0,0.321-0.262,0.58-0.58,0.58H2.467c-0.32,0-0.579-0.259-0.579-0.58
                      V2.468c0-0.32,0.259-0.579,0.579-0.579h15.066c0.318,0,0.58,0.259,0.58,0.579V17.532z M15.91,7.85l-4.842,5.385l-3.502-2.488
                      c-0.127-0.127-0.296-0.18-0.463-0.17c-0.167-0.009-0.336,0.043-0.463,0.17l-3.425,4.584c-0.237,0.236-0.237,0.619,0,0.856
                      c0.236,0.236,0.62,0.236,0.856,0l3.152-4.22l3.491,2.481c0.123,0.123,0.284,0.179,0.446,0.174c0.16,0.005,0.32-0.051,0.443-0.174
                      l5.162-5.743c0.238-0.236,0.238-0.619,0-0.856C16.529,7.614,16.146,7.614,15.91,7.85z"
                  />
                </svg>
              </button>
              <!-- New images -->
              <input
                type="file"
                ref="previewImage"
                accept="image/*"
                multiple
                style="display:none"
                @change="handlePreviewImage"
              />

              <button v-show="startCreate" class="btn-basic btn-100" @click="deleteCurObject()">
                <svg class="svg-icon" viewBox="0 0 20 20">
                  <path
                    fill="none"
                    d="M7.083,8.25H5.917v7h1.167V8.25z M18.75,3h-5.834V1.25c0-0.323-0.262-0.583-0.582-0.583H7.667
                      c-0.322,0-0.583,0.261-0.583,0.583V3H1.25C0.928,3,0.667,3.261,0.667,3.583c0,0.323,0.261,0.583,0.583,0.583h1.167v14
                      c0,0.644,0.522,1.166,1.167,1.166h12.833c0.645,0,1.168-0.522,1.168-1.166v-14h1.166c0.322,0,0.584-0.261,0.584-0.583
                      C19.334,3.261,19.072,3,18.75,3z M8.25,1.833h3.5V3h-3.5V1.833z M16.416,17.584c0,0.322-0.262,0.583-0.582,0.583H4.167
                      c-0.322,0-0.583-0.261-0.583-0.583V4.167h12.833V17.584z M14.084,8.25h-1.168v7h1.168V8.25z M10.583,7.083H9.417v8.167h1.167V7.083
                      z"
                  />
                </svg>
              </button>
              <!-- Delete object -->
            </div>
            <div class="col-6 col-s-12 slide-tool">
              <slide-react-tool></slide-react-tool>
            </div>
          </div>

          <div class="col-5 col-s-12">
            <div class="post-textarea">
              <textarea
                placeholder="Nhập tiêu đề trong 240 ký tự"
                v-model="postTitle"
                maxlength="240"
              ></textarea>
            </div>

            <div class="hashtag-cont pad-1em-0">
              <span class="strong">Hashtag :</span>
              <a v-for="tag in tags" :key="tag">#{{ tag }}</a>
            </div>
            <div class="flex hashtag-form">
              <div class="_left">
                <input
                  type="text"
                  name="firstname"
                  placeholder="Nhập hashtag"
                  v-model="curTag"
                  v-on:keyup.enter="createHashtag()"
                  maxlength="50"
                />
              </div>
              <div class="_right">
                <button class="btn-basic btn-100" @click="createHashtag()">Nhập</button>
              </div>
            </div>
          </div>
          <div class="col-5 col-s-12">
            <button class="btn-huge btn-100" @click="finishAndUpload">Đăng bài viết</button>
          </div>
        </div>
      </div>
    </div>

    <div class="col-2 col-s-12 none768"></div>
  </div>
</template>

<script>
/* eslint-disable no-console */
/* eslint-disable no-unused-vars */
/* eslint-disable no-undef */
import { mapState, mapMutations, mapActions } from "vuex";
import BackToHome from "@/components/Navigation/BackToHome.vue";
import SlideReactTool from "@/components/Editor/SlideReactTool.vue";
var canvas;
function setAttr(name, value, ob) {
  ob.toObject = (function(toObject) {
    return function() {
      return fabric.util.object.extend(toObject.call(this), {
        [name]: value
      });
    };
  })(ob.toObject);
}

function setActiveStyle(styleName, value, object) {
  object = object || canvas.getActiveObject();
  console.log(object);
  if (!object) return;

  if (object.setSelectionStyles && object.isEditing) {
    var style = {};
    style[styleName] = value;
    object.setSelectionStyles(style);
    object.setCoords();
  } else {
    object.set(styleName, value);
  }

  object.setCoords();
  canvas.requestRenderAll();
}

function setActiveProp(name, value) {
  var object = canvas.getActiveObject();
  console.log(object);
  if (!object) return;
  object.set(name, value).setCoords();
  canvas.renderAll();
}

export default {
  name: "editor",
  components: {
    BackToHome,
    SlideReactTool
  },
  data() {
    return {
      startCreate: false,
      postTitle: "",
      tags: [],
      curTag: "",
      showTextTool: false,
      colorList: [
        "#ff0000",
        "#ffa500",
        "#008000",
        "#00ffff",
        "#800080",
        "#dcdcdc",
        "#000000"
      ],
      canvas: null,
      canvasSize: [675, 900],
      canvasResultsJson: [],
      imagesDataUrl: [],
      activeObject: null,
      windowWidth: window.innerWidth,
      windowHeight: window.innerHeight,
      characterLimit: 240
    };
  },
  computed: {
    ...mapState({
      previewImage: state => state.editor.previewImage
    }),
    limitTitle: function() {
      return this.postTitle.substring(0, this.characterLimit);
    }
  },
  watch: {
    activeObject: function(newVal, oldVal) {
      console.log(newVal);
      if (newVal !== oldVal && newVal !== null && newVal.type === "textbox") {
        this.showTextTool = true;
      } else {
        this.showTextTool = false;
      }
    }
  },
  mounted() {},
  methods: {
    ...mapMutations(["TOGGLE_SIDEBAR", "updatePreviewImage"]),
    ...mapActions(["createContent"]),
    initCanvas() {
      canvas = new fabric.Canvas("createCanvas");
      canvas.selectionColor = "rgba(0,255,0,0.2)";
      canvas.selectionBorderColor = "red";
      canvas.selectionLineWidth = 1;
      fabric.Object.prototype.objectCaching = false;
      canvas.setDimensions({
        width: this.canvasSize[0],
        height: this.canvasSize[1]
      });
      /* this.canvas.setWidth = this.$refs.defaultImage.clientWidth;
      this.canvas.setHeight = this.$refs.defaultImage.clientHeight; */
      var self = this;

      fabric.Image.fromURL(this.previewImage, function(oImg) {
        oImg.set({
          left: 0,
          top: 0,
          width: oImg.width,
          height: oImg.height,
          selectable: false,
          evented: false,
          crossOrigin: "anonymous"
        });

        if (oImg.width >= self.canvasSize[0] && oImg.width >= oImg.height) {
          oImg.scaleToWidth(self.canvasSize[0]);
        }
        if (oImg.height >= self.canvasSize[1] && oImg.height >= oImg.width) {
          oImg.scaleToHeight(self.canvasSize[1]);
        }
        canvas.add(oImg);
      });

      // create a rectangle with angle=45
    },
    changeTextColor(color) {
      setActiveProp("fill", color);
    },
    createText() {
      var textProp = {
        fontSize: 40,
        left: 50,
        top: 50,
        fontFamily: "helvetica",
        angle: 0,
        fill: "#000000",
        scaleX: 1,
        scaleY: 1,
        fontWeight: "bold",
        originX: "left",
        padding: 20,
        width: 100,
        height: 100,
        hasRotatingPoint: true,
        centerTransform: true,
        textAlign: "center"
      };
      var textbox = new fabric.Textbox("text", textProp);
      canvas.add(textbox);
      canvas.setActiveObject(textbox);
      this.activeObject = canvas.getActiveObject();
      this.showTextTool = true;
    },
    doneEditText() {
      this.activeObject = null;
      canvas.discardActiveObject();
      this.showTextTool = false;
      canvas.renderAll();
    },
    cancelEditText() {
      var activeObjects = canvas.getActiveObjects();
      canvas.discardActiveObject();
      if (activeObjects.length) {
        canvas.remove.apply(canvas, activeObjects);
      }
      this.activeObject = null;
      this.showTextTool = false;
      canvas.renderAll();
    },
    clickCanvasHandle() {
      console.log("clickCanvasHandle");
      this.activeObject = canvas.getActiveObject();
    },
    triggerPreviewImage() {
      this.$refs.previewImage.click();
    },
    handlePreviewImage(event) {
      var self = this;
      console.log(event.target.files);
      if (event.target.files && event.target.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          self.updatePreviewImage(e.target.result);
          self.$set(self, "canvasSize", [
            self.$refs.defaultImage.clientWidth,
            self.$refs.defaultImage.clientHeight
          ]);
          self.startCreate = true;
          self.initCanvas();
        };

        reader.readAsDataURL(event.target.files[0]);
      }
    },
    createHashtag() {
      if (this.curTag !== "") {
        this.curTag = this.curTag.replace(/\s+/g, " ");
        this.curTag = this.curTag
          .toLowerCase()
          .split(" ")
          .map(word => word.charAt(0).toUpperCase() + word.slice(1))
          .join("");
        this.curTag =
          this.curTag.charAt(0).toLowerCase() + this.curTag.slice(1);
        this.tags.push(this.curTag);
        this.curTag = "";
      }
    },
    finishAndUpload() {
      try {
        var images = canvas.toDataURL({
          format: "jpeg"
        });
        if (this.limitTitle !== "" && this.tags.length > 0) {
          var data = {
            images: [images],
            title: this.limitTitle,
            tags: this.tags,
            cat_id: 1
          };
          this.createContent(data);
        }
      } catch ($e) {
        // console.log($e);
      }
    }
  }
};
</script>
