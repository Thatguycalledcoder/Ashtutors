<?php
    require_once dirname(__FILE__)."/../controllers/booking_controller.php";

    $curl = curl_init();
    $data = $_GET["reference"];
    $book_id = $_GET["book_id"];
    $student_id = $_GET["student_id"];
    $tutor_id = $_GET["tutor_id"];
    $major_id = $_GET["major_id"];

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.paystack.co/transaction/verify/'.$data,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer sk_test_c3917133d2043a8e4bdddd20905479a015cdc8de",
        "Cache-Control: no-cache",
      ),
    ));
    
    $response = json_decode(curl_exec($curl));
    $err = curl_error($curl);
  
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $status = $response->data->status;
      if ($status == "success") {
        $amount = $response->data->amount / 100; 
        $currency = $response->data->currency; 
        $reference = $response->data->reference;

        $request = addBookingHistory($student_id, $tutor_id, $major, $course, $book_day, $book_time, $book_hours);
        if ($request != false) {
          removeBooking($book_id);
        }
        $bookhist_id = $request;
        makePayment($amount, $currency, $reference, $bookhist_id, $student_id, $tutor_id);
        echo $response->data->status;
      }
      else {
        echo $response->data->status;
      }
    }
?>
