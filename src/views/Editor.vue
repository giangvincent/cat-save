<template>
  <div class="flex justify-center">
    <router-link
      to="/"
      class="fixed top-0 left-0 m-3 z-10 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
    >Back</router-link>

    <div class="my-0 sm:mt-4 mx-auto bg-gray-700 relative">
      <div class="absolute z-10 text-blue-700 font-semibold top-0 right-0">
        <div
          class="p-2 m-2 hover:bg-blue-500 shadow-xl hover:text-white border-2 border border-blue-500 hover:border-transparent rounded inline-block select-none"
          @click="addText()"
        >Text</div>
        <div
          class="p-2 m-2 hover:bg-blue-500 shadow-xl hover:text-white border-2 border border-blue-500 hover:border-transparent rounded inline-block select-none"
          @click="finishAndUpload()"
        >Done</div>
      </div>
      <canvas id="mainCanvas" width="600" height="900"></canvas>
    </div>
  </div>
</template>

<script>
/* eslint-disable no-undef */
import { mapState, mapActions } from "vuex";
export default {
  name: "editor",
  data() {
    return {
      canvas: null,
      windowWidth: window.innerWidth,
      windowHeight: window.innerHeight
    };
  },
  computed: {
    ...mapState({
      previewImage: state => state.editor.previewImage
    })
  },
  mounted() {
    this.canvas = new fabric.Canvas("mainCanvas");
    if (this.windowWidth < 600) {
      this.canvas.width = this.windowWidth;
      this.canvas.height = this.windowHeight;
    }
    var self = this;

    fabric.Image.fromURL(this.previewImage, function(oImg) {
      oImg
        .set({
          left: 0,
          top: 0,
          width: self.windowWidth < 600 ? self.windowWidth : 600,
          height: self.windowWidth < 600 ? self.windowHeight : 900,
          selectable: false,
          isbackground: true,
          evented: false,
          crossOrigin: "anonymous"
        })
        .scale(1);
      self.canvas.add(oImg);
    });
    // create a rectangle with angle=45
  },
  methods: {
    ...mapActions(["createContent"]),
    addText() {
      var textProp = {
        fontSize: 40,
        left: 300,
        top: 50,
        fontFamily: "helvetica",
        angle: 0,
        fill: "#000000",
        scaleX: 1,
        scaleY: 1,
        fontWeight: "bold",
        originX: "left",
        width: 300,
        hasRotatingPoint: true,
        centerTransform: true,
        textAlign: "center"
      };
      var textbox = new fabric.Textbox("text", textProp);
      this.canvas.add(textbox);
    },
    finishAndUpload() {}
  }
};
</script>
