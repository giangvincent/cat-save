import Vue from "vue";
import Vuex from "vuex";
import state from "./state";
import mutations from "./mutations";
import actions from "./actions";

//import modules
import editor from "./editor";
import userActions from "./user_actions";

Vue.use(Vuex);

export default new Vuex.Store({
    state: state,
    mutations: mutations,
    actions: actions,
    modules: {
        editor,
        userActions
    }
});
