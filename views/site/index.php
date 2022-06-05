
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Grado</th>
        <th scope="col">Matriculados</th>
        <th scope="col">Cupos</th>
        <th scope="col">Jornada</th>
        <th scope="col">Accciones</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>6</td>
        <td>2</td>
        <td>120</td>
        <td>Mañana</td>
        <td>
            <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Revisar</a>
        </td>
    </tr>
    </tbody>
</table>

<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Estudiante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" onclick="enviar()" class="btn btn-primary">Aceptar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Estudiantes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Grado</th>
                        <th scope="col">Jornada</th>
                        <th scope="col">Accciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Andres</td>
                        <td>Barrera</td>
                        <td>3115470450</td>
                        <td>j@gmail.com</td>
                        <td>6</td>
                        <td>Tarde</td>
                        <td>
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Revisar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Luis</td>
                        <td>Peres</td>
                        <td>3115470450</td>
                        <td>j@gmail.com</td>
                        <td>6</td>
                        <td>Tarde</td>
                        <td>
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Revisar</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Estudiante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Grado</th>
                        <th scope="col">Jornada</th>
                        <th scope="col">Accciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Andres</td>
                        <td>Barrera</td>
                        <td>3115470450</td>
                        <td>j@gmail.com</td>
                        <td>6</td>
                        <td>Tarde</td>
                        <td>
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Modificar</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Estudiantes</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script class="u-script" type="text/javascript" src="js/jquery-1.9.1.min.js" defer=""></script>
<script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
