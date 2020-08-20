import axios from 'axios'

export default {
    loadDataApi({ state, commit, dispatch }, setting) {
        commit('SET_LOAD_STATUS', 'pending');
        return new Promise((resolve, reject) => {
            // The Promise used for router redirect in login
            fetch("./contents/contents.json")
                .then(res => res.json())
                .then(function (n) {
                    // console.log(n);
                    commit('SET_LOAD_STATUS', 'success');
                    var contents = n
                    commit('SET_CONTENTS', contents)
                    resolve(resp);
                })
                .catch(error => {
                    axios({
                        url: state.apiUrl + `/api/get-contents`,
                        method: "GET"
                    })
                        .then(resp => {
                            commit('SET_LOAD_STATUS', 'success');
                            var contents = resp.data
                            commit('SET_CONTENTS', contents)

                            resolve(resp);
                        })
                        .catch(err => {
                            commit('SET_LOAD_STATUS', 'error');
                            reject(err);
                        });
                });

        });
    }
};
