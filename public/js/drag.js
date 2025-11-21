
// Video Drag

const video_container = document.querySelector('#view_video');
const imagen_container = document.querySelector('#imagen_drag');


if(video_container){
    function dragover_handler(ev){

        const input = document.querySelector('#dropbox');
        ev.preventDefault();
        ev.dataTransfer.dropEffect = "move"
    
    }
    
    
    function drop_handler(evt){
    
        const file_input = document.querySelector('#file_input');
    
        evt.stopPropagation();
        evt.preventDefault();
    
        console.log('hola')
    
        const data = evt.dataTransfer.files[0];
    
        let reader = new FileReader();
        reader.onloadend = function(video){

            console.log(data.type);

            if(data.type == 'video/mp4'){
                video_container.src = video.target.result;
                const data_transfer = new DataTransfer();
                data_transfer.items.add(data);
                file_input.files = data_transfer.files;
            }else{
                alert('Solo se permite formato MP4')
            }
        }
    
        reader.readAsDataURL(data);
    
    }
    
    
    function send_video(event){
    
        const data = event.files[0];
        let reader = new FileReader();
    
        reader.onloadend = (event) => {
            video_container.src = event.target.result;
            console.log('event')
        }
    
        reader.readAsDataURL(data);
    }   
}

if(imagen_container){

    function dragover_handler(ev){
        ev.preventDefault();
        ev.dataTransfer.dropEffect = "move"
    
    }
    
    
    function drop_handler(evt){
    
        const file_input = document.querySelector('#file_input');
    
        evt.stopPropagation();
        evt.preventDefault();
    
        const data = evt.dataTransfer.files[0];
    
        let reader = new FileReader();
        reader.onloadend = function(video){

            imagen_container.src = video.target.result;
            const data_transfer = new DataTransfer();
            data_transfer.items.add(data);
            file_input.files = data_transfer.files;
        }
    
        reader.readAsDataURL(data);
    
    }
    
    
    function send_video(event){
    
        const data = event.files[0];
        let reader = new FileReader();
    
        reader.onloadend = (event) => {
            imagen_container.src = event.target.result;
            console.log('event')
        }
    
        reader.readAsDataURL(data);
    }   
}


// Imagen Drag