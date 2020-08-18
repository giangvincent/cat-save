import axios from "axios"

export default {
    createContent({ rootState, state, commit, dispatch }, content) {
        return new Promise((resolve, reject) => {
            // The Promise used for router redirect in login
            axios({
                url: rootState.apiUrl + `/api/user/${state.userActions.user.id}/detail`,
                data: content,
                method: "POST"
            })
                .then(resp => {
                    resolve(resp);
                })
                .catch(err => {
                    reject(err);
                });
        });
    }
};
