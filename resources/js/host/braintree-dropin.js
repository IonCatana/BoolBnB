braintree.dropin.create({
  container: document.getElementById('dropin-container'),
  // ...plus remaining configuration
}, (error, dropinInstance) => {
  // Use `dropinInstance` here
  // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
});