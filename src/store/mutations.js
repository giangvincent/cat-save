export default {
    TOGGLE_SIDEBAR(state) {
        state.sidebar_showup = !state.sidebar_showup;
    },
    SET_LOAD_STATUS(state, payload) {
        state.loadStatus = payload
    },
    SET_CONTENTS(state, payload) {
        state.contents = payload
    }
};
