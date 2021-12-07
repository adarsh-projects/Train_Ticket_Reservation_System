<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!--<button id="rzp-button1">Pay</button>-->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        data={
            "amount": 1000,
            "currency": "INR",
            "receipt": "rcptid_11"
        }
        let options1 = {
            method:'POST',
            headers:{
                'Content-Type':'application/json'
            },
            body:JSON.stringify(data)
        }

        let fres = fetch("https://api.razorpay.com/v1/orders",options1);
            fres.then(res => res.json()).then(d => {
                console.log(d)
        })
        function show(data){
            var options = {
                "key": "rzp_test_mV8jOFpPaexiRp", // Enter the Key ID generated from the Dashboard    
                "amount": "1000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise    
                "currency": "INR",    
                "name": "Safar",    
                "description": "Transaction",    
                "image": "https://img.favpng.com/15/12/20/logo-train-png-favpng-b6jiHMKarcxzbffSwUYQmFxYi.jpg",    
                "order_id": "order_IT3Xyq5GNzdCV5", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1    
                "handler": function (response){
                    alert("Payment successfully Done!");
                    window.location.replace("/pdf.php");    
                },    
                "prefill": {        
                    "name": "Adarsh Sharma",        
                    "email": "adarsh.sharma@example.com",        
                    "contact": "8879616692"    
                },    
                "notes": {        
                    "address": "Safar Corporate Office"    
                },    
                "theme": {        
                    "color": "#3399cc"    
            }};
            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function (response){        
                alert("Are sure you want to cancle Ticket Order")
                window.location.replace("/addPassanger.php");
            });
            rzp1.open();
        }
    </script>
</body>
</html>