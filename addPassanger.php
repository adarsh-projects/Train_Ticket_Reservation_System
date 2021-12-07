<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/cssFiles/addPassangercss.css">
</head>
<body>
    <img style="width:1295px; height:688px;" src="/home_bank/pass7.jpeg"/>
    <div class="topnav">
        <h1>Add Passangers Details</h1>
    </div>
    <div id="passanger">
        
    </div>
    <button id="book" onclick="bookTicekt()">Book</button>
    <button id="book" style="margin-left: 10px;" onclick="getBack()">Back</button>
    <p id="status"></p><br>
    <script>
        document.getElementById("status").style.display = "none";
        function getBack(){
            window.location.replace("/index.php");
        }
        var train_num = localStorage.getItem("train_no");
        var no_of_passanger = localStorage.getItem("no_passanger");
        console.log(no_of_passanger);
        var tab = ``;
        for(var i = 1; i <= no_of_passanger; i++){
            tab += `<br><label>Passanger ${i}:</label> <br>
                    <label>Name: </label>
                    <input type="text" id="name${i}" placeholder="Enter name"/>
                    <label>Age: </label>
                    <input type="text" id="age${i}" placeholder="Enter age"/>
                    <label>Gender: </label>
                    <input type="text" id="gender${i}" placeholder="Enter gender"/>`;
        }
        document.getElementById("passanger").innerHTML = tab;

        function bookTicekt(){
            const api_url ="http://localhost:8080/api/train/"+train_num;
            async function getapi(url) {
                let options = {
                method:'GET'
            }
                const response = await fetch(url,options);
                var data1 = await response.json();
                showtrain(data1);
            }
            getapi(api_url);
            function showtrain(data1){
                console.log(data1);
                var trainno = data1.train_number;
                var ticketprice = data1.ticket_price;
                var src = data1.source;
                var dst = data1.destinations;
                var stdate = data1.st_date;
                var stdate1 = stdate.split("/");
                console.log(stdate);
                var counter = localStorage.getItem("counter");
                var pnr = src.charAt(0)+""+dst.charAt(0)+"_"+stdate1[2]+""+stdate1[0]+""+stdate1[1]+"_"+counter;
                localStorage.setItem("counter", parseInt(counter)+1);
                
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                today = mm + '/' + dd + '/' +yyyy;
                var _fair = ticketprice;
                var data={
                    "pnr": pnr,
                    "train_number": trainno,
                    "total_ticket_price": ticketprice,
                    "book_ticket_date": today,
                    "st_date":stdate
                }
                let options = {
                    method:'POST',
                    headers:{
                        'Content-Type':'application/json'
                    },
                    body:JSON.stringify(data)
                }

                let fres1 = fetch("http://localhost:8080/api/tickets",options);
                    fres1.then(res => res.json()).then(d => {
                        data1=[]
                        var sum = 0;
                        for(var i = 0; i < no_of_passanger; i++){
                            var name = document.getElementById("name"+(i+1)).value;
                            var age = document.getElementById("age"+(i+1)).value;
                            var gender = document.getElementById("gender"+(i+1)).value;
                            var block1 = {
                                "name": name,
                                "age": age,
                                "gender": gender,
                                "pnr": pnr,
                                "train_number": trainno,
                                "book_ticket_date": today
                            }
                            data1[i] = block1;
                            if(gender == "Female") {
                                sum += _fair - (_fair/4);
                            }else {
                                if(age > 0 && age <= 12) {
                                    sum += _fair - (_fair/2);
                                }else if(age >= 60) {
                                    sum += _fair - ((_fair*6)/10);
                                }else{
                                    sum += _fair; 
                                }
                            }
                        }
                        localStorage.setItem("total_value", sum);
                        let options1 = {
                            method:'POST',
                            headers:{
                                'Content-Type':'application/json'
                            },
                            body:JSON.stringify(data1)
                        }

                        let fres = fetch("http://localhost:8080/api/passanger",options1);
                            fres.then(res => res.json()).then(d => {
                                localStorage.setItem("pnr_value", pnr);
                                localStorage.getItem("total_value");
                                window.location.replace("/razorpay-php-testapp-master/pay.php");
                        });
                });
            }
            
        }

    </script>
</body>
</html>