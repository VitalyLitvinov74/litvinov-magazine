'use strict';
import Vue from "vue/types/umd";

var app = new Vue({
    el: '#app',
    data: {
        message: 'Привет, Vue!'
    },
    mounted() {
        console.log(this.message);
    }
});