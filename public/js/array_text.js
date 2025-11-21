

//Typed text


const form  = document.querySelector('#form');
const boton_form = document.querySelector('#text_acomulativo');
const content_inputs = document.querySelector('#content_effect_text');
const enviar_datos = document.getElementById('enviar_datos')
const value_array_input = document.getElementById('escritura_effect_value');

let inputs = '';
let datos_inputs = [];
let id = [0];

let id_cound = document.querySelectorAll('.input_type').length;
let data_id = ''


if(boton_form ){
    boton_form.onclick = (e) =>{

        // Evita la carga del formulario
        e.preventDefault();

        get_datas();

        content_inputs.innerHTML += `<div class="mb-3">
                                        <div class="d-flex align-items-center data_effect">
                                            <label class="text-break" style="white-space: nowrap;">Nombre: </label>
                                            <input type="text" value="" class="form-control ms-3 input_type" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px" id="${id_cound}">
                                            <button type="button" class="eliminar btn btn-primary" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px">-</button>
                                        </div>
                                    </div>`;

        id.push(id_cound);

        id_cound += 1;

        restablecer_datos();

        delete_input();

    }


    enviar_datos.onclick = (e) =>{

        datos_inputs = [];
        inputs = document.querySelectorAll('.input_type');
        inputs.forEach(element=> {
            datos_inputs.push(element.value)
            id.push(Number(element.id))
        });

        value_array_input.value = datos_inputs;



    }


    delete_input();

}

function delete_input(){
    const data_effect = document.querySelectorAll('.data_effect button');

    data_effect.forEach(e=>{
        e.onclick = () =>{
            e.parentNode.remove();

            console.log(e);

        }
    })
}

function get_datas(){
    inputs = document.querySelectorAll('.input_type');
    id = [];
    datos_inputs = [];
    inputs.forEach(element=> {
        datos_inputs.push(element.value)
        id.push(Number(element.id))
    });
}

function restablecer_datos(){
    id.forEach(( value, index)=>{
        data = document.getElementById(value);
        if(datos_inputs[index]){
            data.value = datos_inputs[index];
        }
    })
}

