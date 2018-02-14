require('./bootstrap');

window.Vue = require('vue');
import Buefy from 'buefy'

Vue.use(Buefy)
//Vue.component('example-component', require('./components/ExampleComponent.vue'));
var app = new Vue({
  el: '#app',
  data: {}
})

document.addEventListener('DOMContentLoaded', () => {

  // Get the navbar-burger element
  var $burger = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // check if there's any navbar burger
  if($burger.length > 0) {
    // Add a click event to each burger found

    $burger.forEach(($el) => {
      $el.addEventListener('click', () => {
        const target = $el.dataset.target;
        let $target = document.getElementById(target);

       // Toggle the class on both the "navbar-burger" and the "navbar-menu"
       $el.classList.toggle('is-active');
       $target.classList.toggle('is-active');
      })
    })
  }
})
