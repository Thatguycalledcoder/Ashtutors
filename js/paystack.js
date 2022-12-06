const email = document.getElementById('email');
const amount = document.getElementById('amount');
const bk_id = document.getElementById('book_id');
const form = document.getElementById('form');


function payWithPaystack(e) {
    e.preventDefault();
    let handler = PaystackPop.setup({
        key: 'pk_test_2bb382cf83dcbbded35073cca76a746157a6dd61', // Replace with your public key
        email: email.value,
        amount: amount.value * 100,
        callback: function(response){
          $.ajax({
            url: '../actions/process_payment.php?reference='+ response.reference,
            data: {
              book_id: bk_id.value
            },
            method: 'get',
            success: function (response) {
                if (response == "success") {
                    window.location = "./payment_success.php";
                }
                else {
                    window.location = "./payment_failure.php";
                }
            }
          });
        },
        onClose: function(){
          
      }
  });
  handler.openIframe();
};