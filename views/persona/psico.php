<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Edad</th>
        <th scope="col">Grado</th>
        <th scope="col">Jornada</th>
        <th scope="col">Acudiente</th>
        <th scope="col">Celular</th>
        <th scope="col">Correo</th>
        <th scope="col" colspan="2">Accciones</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Andres</td>
        <td>Barrera</td>
        <td>11</td>
        <td>6</td>
        <td>Tarde</td>
        <td>Carlos Mayorga</td>
        <td>3115470450</td>
        <td>j@gmail.com</td>
        <td>
            <button type="button" class="btn btn-success">Aceptar</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Rechazar</button>
            <button type="button" class="btn btn-secondary">Adjuntos</button>
        </td>
    </tr>
    <tr>
        <td>Luis</td>
        <td>Diaz</td>
        <td>12</td>
        <td>7</td>
        <td>Mañana</td>
        <td>Enrique Diaz</td>
        <td>3115470450</td>
        <td>j@gmail.com</td>
        <td>
            <button type="button" class="btn btn-success" onclick="Swal.fire('Any fool can use a computer')">Aceptar</button>
            <button type="button" class="btn btn-danger">Rechazar</button>
            <button type="button" class="btn btn-secondary">Adjuntos</button>
        </td>
    </tr>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rechazo estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Motivo:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger">Rechazar</button>
            </div>
        </div>
    </div>
</div>