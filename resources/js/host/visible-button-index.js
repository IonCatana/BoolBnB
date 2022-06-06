// const checkboxes = document.getElementsByClassName('visibility-check');
// console.log(checkboxes)

const buttons = document.getElementsByClassName('visibility-toggle');
for (let button of buttons) {
  button.addEventListener('click', e => {
    e.preventDefault();

    const check = e.target.closest('input[type=checkbox]');
    console.log(check)
    // TODO
  })
}