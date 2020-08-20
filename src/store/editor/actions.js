import axios from "axios"

export default {
    createContent({ rootState, state, commit, dispatch }, content) {

        console.log(rootState.userActions.user)
        return new Promise((resolve, reject) => {
            // The Promise used for router redirect in login
            axios({
                url: rootState.apiUrl + `/api/user/${rootState.userActions.user.id}/create-content`,
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
