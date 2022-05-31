// Alert delete

const buttons = document.querySelectorAll('.delete-form [type="submit"]');

buttons.forEach(element => {

    element.addEventListener('click', function(el) {

        el.preventDefault(); 

        const btn = el.target; 

        const form = btn.closest('.delete-form'); 
        console.log(form);

        if(form && confirm('Do you really want to delete this post?') ){ 

            form.submit(); 
        }

    })
})