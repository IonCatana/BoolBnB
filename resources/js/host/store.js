import Vue from 'vue' ;

const state = Vue.observable(
    {
        visibleSearch: true,
        searchResult: {},
    }
)

export default state;