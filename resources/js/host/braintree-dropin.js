const container = document.getElementById('dropin-container');
const authorization = document.getElementById('token');
const form = document.getElementById('payment-form');

if (form && container && authorization) {  
  braintree.dropin.create({
    container,
    authorization: authorization.value,
  }, (err, dropinInstance) => {
    if (err) {
      // Handle any errors that might've occurred when creating Drop-in
      console.error('create dropin', err);
      return;
    }
    // submitButton.addEventListener('click', function () {
    //   dropinInstance.requestPaymentMethod(function (err, payload) {
    //     if (err) {
    //       console.log('request payment method', err)
    //     }
  
    //     // Send payload.nonce to your server
    //   });
    // });

    form.addEventListener('submit', event => {
      event.preventDefault();
  
      dropinInstance.requestPaymentMethod((error, payload) => {
        if (error) console.error(error);

        document.getElementById('nonce').value = payload.nonce;
        form.submit();
      });
    });
  });
}