import axios from "axios";

export default {
    USER_REQUEST: function ({ rootState, state, commit }) {
        return new Promise((resolve, reject) => {
            // The Promise used for router redirect in login
            axios({ url: rootState.apiUrl + `/api/user/${state.user.id}/detail`, method: "POST" })
                .then(resp => {

                    commit("SET_USER_DETAIL", resp.data.success);
                    resolve(resp);
                })
                .catch(err => {

                    reject(err);
                });
        });
    },
    REGISTER_REQUEST: function ({ rootState, commit, dispatch }, user) {
        return new Promise((resolve, reject) => {
            // The Promise used for router redirect in login
            commit("AUTH_REQUEST");
            axios({ url: rootState.apiUrl + "/api/register", data: user, method: "POST" })
                .then(resp => {
                    const token = resp.data.success.token;
                    const user = resp.data.success.user;
                    localStorage.setItem("user-token", token); // store the token in localstorage
                    localStorage.setItem("user", user);
                    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
                    commit("AUTH_SUCCESS", token);
                    commit("SET_USER_DETAIL", user);
                    // you have your token, now log in your user :)
                    // dispatch("USER_REQUEST");
                    resolve(resp.data);
                })
                .catch(err => {
                    commit("AUTH_ERROR", err);
                    localStorage.removeItem("user-token"); // if the request fails, remove any possible user token if possible
                    reject(err);
                });
        });
    },
    AUTH_REQUEST: ({ rootState, commit, dispatch }, user) => {
        return new Promise((resolve, reject) => {
            // The Promise used for router redirect in login
            commit("AUTH_REQUEST");
            axios({ url: rootState.apiUrl + "/api/login", data: user, method: "POST" })
                .then(resp => {
                    const token = resp.data.success.token;
                    const user = resp.data.success.user;
                    localStorage.setItem("user-token", token); // store the token in localstorage
                    localStorage.setItem("user", user);
                    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
                    commit("AUTH_SUCCESS", token);
                    commit("SET_USER_DETAIL", user);
                    // you have your token, now log in your user :)
                    dispatch("USER_REQUEST");
                    resolve(resp);
                })
                .catch(err => {
                    commit("AUTH_ERROR", err);
                    localStorage.removeItem("user-token"); // if the request fails, remove any possible user token if possible
                    reject(err);
                });
        });
    },
    AUTH_LOGOUT: ({ commit, dispatch }) => {
        return new Promise((resolve, reject) => {
            commit("AUTH_LOGOUT")
            localStorage.removeItem('user-token') // clear your user's token from localstorage
            resolve()
        })
    }
};
