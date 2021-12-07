<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./divdetails.css">

</head>
<body>
   
    <div class="head_body">
        <p class="but1" onclick="getBack()">Safar</p>
        <p class="ph" id="text">Hello,Adarsh</p>
        <img class="profile" id="pr" src="/home_bank/profile/profileimg.png" alt="">
    </div>
    <div class="container">
        <div class="row" >
          <div class="col1">
            <img src="./Screenshot from 2021-12-06 16-48.png" alt="">
          </div>
          <div class="col2" style="width: 1000px;">
            <div class="main">
                <header class="head">
                    <table>
                        <tr>
                            <td>
                                <div>   
                                    <span class="top_left" id="train_name">train Name</span> 
                                    <span class="top_left2">(</span>
                                    <span class="top_left3" style="font-weight: bold;" id="train_num">Train Number</span>
                                    <span class="top_left4">)</span>
                                </div>            
                            </td>
                            <td>
                                <div>
                                    <span class="top_right" id="train_runson">Runs ON</span>
                                 </div>
             
                            </td>
                        </tr>
                    </table>
                </header>
                <table>
                    <tr>
                        <td >
                            <div class="top_left">
                                <span id="train_src">Train Source</span>
                                <span>|</span>
                                <span id="train_departdate">Depart date</span>
                                <span>|</span>
                                <span id="train_departtime">Depart Time</span>
                            </div>
                        </td>
                        <td>
                            <div class="top_right">
                                <span id="train_dest">Destination</span>
                                <span>|</span>
                                <span id="train_arrivaldate">Arrive Date</span>
                                <span>|</span>
                                <span id="train_arrivaltime">Arraive Time</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <span class="set_left"  id="noPassanger">Seats</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button style=" height:35px; font-size: 20px;" id="but" onclick="bookTicket()">Book</button>
                        </td>
                        <td>
                            <div style="text-align: right; margin-right: 10px;">
                                <span class="set_right2" id="train_price">500</span>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>    
          </div>
        </div>
      </div>
    <script>
        function getBack(){
            window.location.replace("/index.php");
        }
        if(localStorage.getItem("fflag") == 'fl'){
            document.getElementById('text').textContent = "Hello, " + localStorage.getItem("fname");
            document.getElementById('pr').src = localStorage.getItem("furl");
        }
        function bookTicket(){
            var no_of_passanger = prompt("Enter a Number Of Passanger");
            localStorage.setItem("no_passanger",no_of_passanger)
            var tno = document.getElementById("train_num").textContent;
            localStorage.setItem("train_no",tno);
            window.location.replace("/addPassanger.php");
        }
        var tno = localStorage.getItem("train_no");
        const api_url ="http://localhost:8080/api/train/"+tno;
            async function getapi(url) {
                let options = {
                method:'GET'
            }
            const response = await fetch(url,options);
            var data1 = await response.json();
            show(data1);            
        }
        getapi(api_url);
        function show(data1){
            const api_url = "http://localhost:8080/api/traindetails/"+tno;
                async function getapi(url) {
                    let options = {
                    method:'GET'
                }
                const response = await fetch(url,options);
                var data = await response.json();
                show1(data);            
            }
            getapi(api_url);
            function show1(data){
                var departime =  data.depart_time;
                var arrivetime = data.arrive_time;
                
                document.getElementById("train_num").textContent = data1.train_number;
                document.getElementById("train_src").textContent = data1.source;
                document.getElementById("train_dest").textContent =data1.destinations;
                document.getElementById("train_price").textContent = "Price: "+data1.ticket_price;
                document.getElementById("train_name").textContent = data1.train_name;
                document.getElementById("train_departdate").textContent =  data.depart_date;
                document.getElementById("train_departtime").textContent =  departime;
                document.getElementById("train_arrivaldate").textContent =   data.arrive_date;
                document.getElementById("train_arrivaltime").textContent =   arrivetime;
                document.getElementById("train_runson").textContent = "Runs On: "+data.runs_on;
                document.getElementById("noPassanger").textContent = "Available Seats: 675";    
            }
        }

    </script>
</body>
</html>
