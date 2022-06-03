//input non fanno submit quando gli si da l'enter
const formInputs = document.querySelectorAll('.form-control');
formInputs.forEach(input => {
  input.addEventListener('keypress', e => {
    if (e.key === 'Enter') {
      // const form = e.target.closest('form');
      e.preventDefault();
    }
  })
})

// Compare alert quando si clicca sul delete
//TODO refactor con messaggi
const resourcesWithDeleteConfirmation = [
    'place',
    'message',
];
resourcesWithDeleteConfirmation.forEach(resource => {
    const buttons = document.querySelectorAll(`.${resource}-delete-form [type="submit"]`);
    
    buttons.forEach(button => {
        button.addEventListener('click', function(el) {
            el.preventDefault(); 
    
            const btn = el.target; 
    
            const form = btn.closest(`.${resource}-delete-form`); 
            console.log(form);
    
            if(form && confirm(`Do you really want to delete this ${resource}?`) ) { 
                form.submit(); 
            }
        })
    })
})

