const modal_element = document.querySelector(".modal_send_message");

const leer_mas = document.querySelector('.view_more');

if(modal_element){

    modal_element.onclick = () => {

        modal_element.classList.add("remove")

        setTimeout(()=>{
            modal_element.remove();
        }, 1000)


    }

}


if(leer_mas){

    const description = document.querySelector('.about .content_description');

    leer_mas.onclick = () => {

        description.classList.toggle('active')

        if(leer_mas.textContent == 'Leer más'){
            leer_mas.textContent = 'Leer menos'
        }else{
            leer_mas.textContent = 'Leer más'
        }


    }
}


window.addEventListener("scroll", (event) => {

    if(window.scrollY > 400){
        document.querySelector('nav').classList.add('active')
    }else{
        document.querySelector('nav').classList.remove('active')
    }


});
