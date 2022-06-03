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
const actionsNeedingConfirmation = [
    'place-delete',
    'message-delete',
];
actionsNeedingConfirmation.forEach(action => {
    const buttons = document.querySelectorAll(`.${action}-form [type="submit"]`);
    
    buttons.forEach(button => {
        button.addEventListener('click', function(el) {
            el.preventDefault(); 
    
            const btn = el.target; 
    
            const form = btn.closest('.delete-form'); 
            console.log(form);
    
            if(form && confirm('Do you really want to delete this place?') ) { 
                form.submit(); 
            }
        })
    })
})

