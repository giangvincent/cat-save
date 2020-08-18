import mutations from "./mutations";
import actions from "./actions";

export default {
    state: {
        user: {},
        token: localStorage.getItem("user-token") || "",
        status: ""
    },
    mutations: mutations,
    actions: actions,
    getters: {
        isAuthenticated: state => {
            return typeof state.token !== 'undefined' && state.token !== "" && state.token !== null && state.token !== 'undefined';
        },
        authStatus: state => state.status,
    }
};
