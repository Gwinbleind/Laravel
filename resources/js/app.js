require('./bootstrap');
import ExampleComponent from './components/ExampleComponent'
let app = new Vue({
    el: '#app',
    components: {
        ExampleComponent
    }
});
