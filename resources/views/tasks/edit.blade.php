<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Actualizar tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="keep">Rótulo</label>
                {{-- Vincular el nombre de la tarea --}}
                <input type="text" name="keep" class="form-control" v-model="fillKeep.keep">
                <span v-for="error in errors" v-text="error" class="text-danger"></span>
            </div>
            <div class="modal-footer">
                {{-- Enviar el formulario usando el id de la tarea seleccionada --}}
                <input type="button" class="btn btn-primary" value="Actualizar" v-on:click="updateKeep(fillKeep.id)">
            </div>
        </div>
    </div>
</div>