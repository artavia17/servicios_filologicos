

<form id="form">

    <div class="d-flex justify-content-between mb-4">
        <h3>Actualización del "Inicio"</h3>
        <button class="btn btn_orange" id="enviar_datos">Actualizar Inicio</button>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Video de fondo</label>
        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Titulo principal</label>
        <input type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Titulo secundario</label>
        <input type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <input type="hidden" class="form-control" id="escritura_effect_value">
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Textos del efecto de escritura (Opcional)</label>
        <div class="api_effect_escritura">
            <div class="mb-3" id="content_effect_text">
                <div class="d-flex align-items-center mb-3">
                    <label class="text-break" style="white-space: nowrap;">Nombre: </label>
                    <input type="text" class="form-control ms-3 input_type" id="0">
                </div>
            </div>

            <button class="btn btn_orange" id="text_acomulativo">Agregar efecto escritura</button>
        </div>
    </div>

</form>
