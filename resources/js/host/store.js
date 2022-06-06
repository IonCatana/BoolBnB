import Vue from 'vue' ;

const state = Vue.observable(
    {
        visibleSearch: true,
        searchResult: {},
    }
)
console.log(state.searchResult)

export default state;