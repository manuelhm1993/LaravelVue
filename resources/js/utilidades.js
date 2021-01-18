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

            //Elimina el registro
            axios.delete(urlKeeps).then(response => {
                //Lista nuevamente las tareas
                this.getKeeps();
                
                //Mensaje de feedback
                toastr.success('Tarea #' + keep.id + ' eliminada correctamente');
            });
        }
    }
});