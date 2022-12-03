const email = document.getElementById('email');
const amount = document.getElementById('amount');
const bk_id = document.getElementById('book_id');
const stud_id = document.getElementById('student_id');
const tut_id = document.getElementById('tutor_id');
const major = document.getElementById('major');
const form = document.getElementById('form');


function payWithPaystack(e) {
    e.preventDefault();
    let handler = PaystackPop.setup({
        key: 'pk_test_2bb382cf83dcbbded35073cca76a746157a6dd61', // Replace with your public key
        email: email.value,
        amount: amount.value,
        callback: function(response){
          $.ajax({
            url: '../actions/process_payment.php?reference='+ response.reference,
            data: {
              book_id: bk_id.value,
              student_id: stud_id.value,
              tutor_id: tut_id.value,
              major_id: major.value
            },
            method: 'get',
            success: function (response) {
              alert(response)
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
          window.location = "./failurepage.html";
      }
  });
  handler.openIframe();
};