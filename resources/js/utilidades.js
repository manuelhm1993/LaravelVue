//Utilidades y comportamientos propios de la aplicación
new Vue({
    el: '#crud',
    created: function () {
        this.getKeeps();
    },
    data: {
        keeps: [],
        pagination: {
            total: 0,
            currentPage: 0,
            perPage: 0,
            lastPage: 0,
            from: 0,
            to: 0
        },
        offset: 3,
        newKeep: '',
        fillKeep: { id: '', keep: '' },
        errors: []
    },
    computed: {
        isActived: function () {
            //Retorna la página actual para activarla
            return this.pagination.currentPage;
        },
        pagesNumber: function () {
            //Si no existe un hasta se retorna un array vacío
            if(!this.pagination.to) {
                return [];
            }

            //Controlar el desde
            let from = this.pagination.currentPage - this.offset;

            if(from < 1) {
                from = 1;
            }

            //Controlar el hasta
            let to = from + (this.offset * 2);

            if(to >= this.pagination.lastPage) {
                to = this.pagination.lastPage;
            }

            //Controlar la numeración
            let pagesArray = [];

            while(from <= to) {
                pagesArray.push(from);
                from++;
            }

            return pagesArray;
        }
    },
    methods: {
        getKeeps: function (page) {
            let urlKeeps = `/tasks?page=${page}`;

            axios.get(urlKeeps).then(response => {
                //Cargar la variable keeps con todas las tareas
                this.keeps = response.data.tasks.data;

                //Cargar el objeto pagination con todos los controles no se coloca data por ser un objeto
                this.pagination = response.data.pagination;
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
                toastr.success(`Tarea creada correctamente, número: #${response.data.id}`);
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
            let urlKeeps = `/tasks/${id}`;

            //Como se trata de un objeto simplemente se envía el atributo fillKeep
            axios.put(urlKeeps, this.fillKeep).then(response => {
                //Listar todas las tareas
                this.getKeeps();

                //Resetear las variables utilizadas
                this.fillKeep = { id: '', keep: '' };
                this.errors   = [];

                //Ocultar el modal de edición con JQuery
                $('#edit').modal('hide');

                //Mensaje de feedback con el plugin JQuery toastr
                toastr.success(`Tarea #${response.data.id} actualizada correctamente`);
            }).catch(error => {
                //Tratamiento de errores
                this.errors = error.response.data;
            });
        },
        deleteKeep: function (keep) {
            let urlKeeps = `/tasks/${keep.id}`;

            //Elimina el registro
            axios.delete(urlKeeps).then(response => {
                //Lista nuevamente las tareas
                this.getKeeps();
                
                //Mensaje de feedback
                toastr.success(`Tarea #${keep.id} eliminada correctamente`);
            });
        },
        changePage: function (page) {
            this.pagination.currentPage = page;//Cambiar la página actual
            this.getKeeps(page);//Página solicitada
        }
    }
});