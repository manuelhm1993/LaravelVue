//Utilidades y comportamientos propios de la aplicación

new Vue({
    el: '#crud',
    created: function () {
        this.getKeeps();
    },
    data: {
        keeps: [],
    },
    methods: {
        getKeeps: function () {
            let urlKeeps = '/tasks';

            axios.get(urlKeeps).then(response => {
                this.keeps = response.data;
            });
        },
        deleteKeep: function (keep) {
            let urlKeeps = '/tasks/' + keep.id;

            axios.delete(urlKeeps).then(response => {
                this.getKeeps();
            });
        }
    }
});