const validatio_form = document.querySelectorAll('form');


if(validatio_form){

    validatio_form.forEach(e=>{

        e.onsubmit = (elemet) => {



            let error = false;
            let button = e.querySelector ('button');
            let elementInput = e.querySelectorAll('input');
            let textarea = e.querySelector('textarea');
            let type_error = ''

            elementInput.forEach(ipt => {
                if(!ipt.value){

                    type_error = `${ipt.placeholder} - Este campo es requirido`;
                    ipt.setAttribute('placeholder', '')
                    ipt.setAttribute('placeholder',  `${ipt.getAttribute('info')} - Este campo es requirido`)
                    // ipt.placeholder = type_error;

                    ipt.classList.add('error');

                    error = true;
                }else{

                    let placeholder_input = ipt.placeholder;
                    let new_string = placeholder_input.replace('- Este campo es requirido', '');
                    ipt.placeholder = new_string;
                    ipt.classList.remove('error');
                }
            })



            if(!textarea.value){

                type_error = `${textarea.placeholder} - Este campo es requirido`;
                textarea.setAttribute('placeholder', '')
                textarea.setAttribute('placeholder',  `${textarea.getAttribute('info')} - Este campo es requirido`)
                textarea.classList.add('error');
                error = true;
            }else{
                let placeholder_input = textarea.placeholder;
                let new_string = placeholder_input.replace('- Este campo es requirido', '');
                textarea.placeholder = new_string;
                textarea.classList.remove('error');
            }

            if(error){
                elemet.preventDefault();
                console.log('Error, favor completar todos los campos')
            }else{

                button.textContent = 'Enviando información...';
                button.style.background = '#e3ae86';
                button.disabled = true;
                button.style.cursor = 'not-allowed';

            //     cursor: not-allowed;

            }

        }


    })

}
