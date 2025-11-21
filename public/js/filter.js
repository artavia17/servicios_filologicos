const filter = document.querySelectorAll('.change_filter');
let input_checked = [];
let slug_text = '';
let url_search = new URL(window.location.href);
const params = new URLSearchParams(url_search.search);

if(params.get("page")){

    if(localStorage.getItem('scroll') == 'true') {
        localStorage.removeItem('scroll');
    }

    window.scrollTo( 0, screen.height - 50 );


    filter.forEach(async e=>{

        e.onchange = () => {

            input_checked = [];
            slug_text = '';
            const slug = e.getAttribute('slug');

            filter.forEach(input_element => {
                if(input_element.checked == true){

                    input_checked.push(input_element.getAttribute('slug'));

                }
            })

            slug_text = `/servicios?page=${params.get("page")} & ${input_checked[0] ? 'filter-one=' + input_checked[0]: '' } ${input_checked[1] ? '&filter-two=' + input_checked[1]: '' }`;

            localStorage.setItem('scroll', 'true');

            window.location = slug_text.replace(/\s+/g, '');

        }

    })

}else{
    if(localStorage.getItem('scroll') == 'true'){

        window.scrollTo( 0, screen.height - 219 );
        localStorage.removeItem('scroll');

    }


    filter.forEach(async e=>{

        e.onchange = () => {

            input_checked = [];
            slug_text = '';
            const slug = e.getAttribute('slug');

            filter.forEach(input_element => {
                if(input_element.checked == true){

                    input_checked.push(input_element.getAttribute('slug'));

                }
            })

            slug_text = `/servicios?${input_checked[0] ? 'filter-one=' + input_checked[0]: '' } ${input_checked[1] ? '&filter-two=' + input_checked[1]: '' }`;

            localStorage.setItem('scroll', 'true');

            window.location = slug_text.replace(/\s+/g, '');

        }

    })
}
