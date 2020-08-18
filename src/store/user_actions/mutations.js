export default {
    AUTH_REQUEST: (state) => {
        state.status = 'loading'
    },
    AUTH_SUCCESS: (state, token) => {
        state.status = 'success'
        state.token = token
    },
    AUTH_ERROR: (state) => {
        state.status = 'error'
    },
    SET_USER_DETAIL: function (state, userData) {
        state.user = userData
    }
};
