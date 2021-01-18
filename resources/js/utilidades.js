//Utilidades y comportamientos propios de la aplicación

new Vue({
    el: '#crud',
    created: function () {
        this.getKeeps();
    },
    data: {
        keeps: [],
        newKeep: '',
        fillKeep: { id: '', keep: '' },
        errors: []
    },
    methods: {
        getKeeps: function () {
            let urlKeeps = '/tasks';

            axios.get(urlKeeps).then(response => {
                this.keeps = response.data;
            });
        },
        storeKeep: function () {
            let urlKeeps = '/tasks';

            axios.post(urlKeeps, {
                keep: this.newKeep//Datos del formulario
            }).then(response => {
                //Listar nuevamente las tareas
                this.getKeeps();

                //Formatear las variables del formulario
                this.newKeep = '';
                this.errors = [];

                //Ocultar el modal con JQuery
                $('#create').modal('hide');

                //Mensaje de feedback con el plugin JQuery toastr
                toastr.success('Tarea creada correctamente, número: #' + response.data.id);
            }).catch(error => {
                //Controlar los errores
                this.errors = error.response.data;
            });
        },
        editKeep: function (keep) {
            //Llena la variable fillKeep con la información del keep seleccionado
            this.fillKeep.id   = keep.id;
            this.fillKeep.keep = keep.keep;
            
            //Muestra el modal manualmente usando JQuery
            $('#edit').modal('show');
        },
        updateKeep: function(id) {

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