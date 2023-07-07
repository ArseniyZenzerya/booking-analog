require('./bootstrap');

window.Vue = require('vue').default;

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


Vue.component('place-component', require("./components/PlaceComponent").default);

Vue.component('photo-component', require("./components/PhotoComponent").default);

const appVue = new Vue({
    el: '#app',
});
