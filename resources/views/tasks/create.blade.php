<div class="modal fade" id="create" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Nueva tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="keep">Rótulo</label>
                <input type="text" name="keep" class="form-control" v-model="newKeep">
                <span v-for="error in errors" v-text="error" class="text-danger"></span>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-primary" value="Crear" v-on:click="storeKeep()">
            </div>
        </div>
    </div>
</div>
