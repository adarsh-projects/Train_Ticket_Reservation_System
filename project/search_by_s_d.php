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
          <div class="col2"id="myList">
          </div>
        </div>
      </div>
    <script>
        function getBack(){
            window.location.replace("/index.php");
        }
        if(localStorage.getItem("fflag") == 'fl'){
            document.getElementById('pr').src = localStorage.getItem("furl");   
            document.getElementById('text').textContent = "Hello, " + localStorage.getItem("fname");
            
        }
        function bookTicket(){
            var no_of_passanger = prompt("Enter a Number Of Passanger");
            localStorage.setItem("no_passanger",no_of_passanger)
            var tno = event.target.getAttribute("class");
            localStorage.setItem("train_no",tno);
            window.location.replace("/addPassanger.php");
        }
        var sd = localStorage.getItem("src_des");
        const api_url ="http://localhost:8080/api/train/only/"+ sd;
        localStorage.setItem("tab","")
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
            for (let r of data) {
                var tno = r.train_number;
                const api_url ="http://localhost:8080/api/traindetails/"+ tno;
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
                    var t1 = localStorage.getItem("tab");
                    t1 += `
                    <div class="main">
                        <header class="head">
                            <table>
                                <tr>
                                    <td>
                                        <div>   
                                            <span class="top_left" id="train_name">${r.train_name}</span> 
                                            <span class="top_left2">(</span>
                                            <span class="top_left3" style="font-weight: bold;" id="train_num">${r.train_number}</span>
                                            <span class="top_left4">)</span>
                                        </div>            
                                    </td>
                                    <td>
                                        <div>
                                            <span class="top_right" id="train_runson">${data1.runs_on}</span>
                                        </div>
                    
                                    </td>
                                </tr>
                            </table>
                        </header>
                        <table>
                            <tr>
                                <td >
                                    <div class="top_left">
                                        <span id="train_src">${r.source}</span>
                                        <span>|</span>
                                        <span id="train_departdate">${data1.depart_date}</span>
                                        <span>|</span>
                                        <span id="train_departtime">${data1.depart_time}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="top_right">
                                        <span id="train_dest">${r.destinations}</span>
                                        <span>|</span>
                                        <span id="train_arrivaldate">${data1.arrive_date}</span>
                                        <span>|</span>
                                        <span id="train_arrivaltime">${data1.arrive_time}</span>
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
                                    <button style=" height:35px; font-size: 20px;" id="but" class="${r.train_number}" onclick="bookTicket()">Book</button>
                                </td>
                                <td>
                                    <div style="text-align: right; margin-right: 10px;">
                                        <span class="set_right2" id="train_price">${r.ticket_price}</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    `;
                    localStorage.setItem("tab", t1);
                    document.getElementById("myList").innerHTML = t1//localStorage.getItem("tab");
                }
            }

            //console.log("outside:" + localStorage.getItem("tab"));
        }
    </script>
</body>
</html>