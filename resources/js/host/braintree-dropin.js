const container = document.getElementById('dropin-container');
const authorization = document.getElementById('token');
const form = document.getElementById('payment-form');

if (form && container && authorization) {  
  braintree.dropin
  .create({
    container,
    authorization: authorization.value,
  })
  .then(dropinInstance => {
    form.addEventListener('submit', event => {
      event.preventDefault();
      
      dropinInstance.requestPaymentMethod()
      .then(payload => {
        document.getElementById('nonce').value = payload.nonce;
        form.submit();
      })
      .catch(error => {
        console.error('nonce', error);
      });
    });
  })
  .catch(error => {
    console.error('dropin creation');
  });
}