//Utilidades y comportamientos propios de la aplicación
let urlUsers = 'https://jsonplaceholder.typicode.com/users';

new Vue({
    el: '#main',
    created: function () {
        this.devolverUsuarios();
    },
    data: {
        usuarios: []
    },
    methods: {
        devolverUsuarios: function () {
            axios.get(urlUsers).then(response => {
                this.usuarios = response.data;
            });
        }
    }
});