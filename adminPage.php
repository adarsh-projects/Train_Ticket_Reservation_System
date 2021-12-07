<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./cssFiles/admincs.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>
    <!--<img style="width:1293px; height:635px;" src="home_bank/train3.jpg"/>-->
    <div class="topnav" style="  background-color: rgb(219, 219, 219); height:70px;">
        <p style="color:black;" class="logo dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Railway</p>
        <ul class="dropdown-menu" style="padding-left: 10px;" aria-labelledby="dropdownMenuButton1">
            <li><button class="signup" style="white-space: nowrap; width: 140px;" onclick="addTrain()"> Add train</button></li>
            <li><button class="signup" style="white-space: nowrap; width: 140px;" onclick="noofpas()">No of Passanger</button></li>
            <li><button class="signup" style="white-space: nowrap; width: 140px;" onclick="noofti()"> No of Tickets</button></li>
            <li><button class="signup" style="white-space: nowrap; width: 140px;" onclick="feedBack()">FeedBack</button></li>
        </ul>
        <div class="ipf">
            <input type="text" onkeyup="myFunction()" style="margin-left: 350px; width: 300px; margin-top: 15px;" id="myInput" placeholder="Find Train by Train Number"/>
        </div>
        <p style="white-space: nowrap; font-size: 20px; margin-right: 10px; margin-top: 20px; color: black; font-weight: 300;">Hello, Admin</p>
        <img class="pr" class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" src="/img/img/image.png" alt="">
        <ul class="dropdown-menu" style="padding-left: 10px;" aria-labelledby="dropdownMenuButton1">
            <li><button class="signup" style="white-space: nowrap; width: 140px;" onclick="logout()">Logout</button></li>
        </ul>
    </div>      
    <div>
        <h1 id="admin_well_page">Welcome to Admin Page</h1>
    </div>
    <div class="traindetails">
        <table>
            <tr>
                <th>Train No.</th>
                <th >Train Name</th>
                <th >Source</th>
                <th >Destination</th>
                <th >Price</th>
                <th >Date</th>
                <th >Details</th>
            </tr>
        </table>
    </div>
    <div class="traindetails">
        <table id="myUL">
        </table>
    </div>
    <script>
        function logout(){
            window.location.replace("/index.php");
        }
        function noofpas(){
            window.location.replace("/no_of_passanger.html");
        }
        function noofti(){
            window.location.replace("/no_of_ticket.html");
        }
        setInterval(myTimer, 500);
        var color = ["red", "blue", "yellow", "green"];
        var i = 0;
        function myTimer(){
            document.getElementById("admin_well_page").style.color = color[i%4];
            i++;
        }
        function feedBack(){
            window.location.replace("/feedbackReview.php");
        }
        function detailsTrain(){
            var tno = event.target.getAttribute("class");
            localStorage.setItem("train_num",tno);
            window.location.replace("/admintraindetails.php");
        }
        function deleteTrain(){
            var tno = event.target.getAttribute("class");
            console.log(tno);
            let options = {
                method:'DELETE'
            }
            let fres = fetch("http://localhost:8080/api/train/"+tno,options);
        }
        function myFunction() {
            var input, filter, ul, li, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("tr");
            for (i = 0; i < li.length; i++) {            
                td = li[i].getElementsByTagName("td")[0];
                console.log(li[i].getElementsByTagName("td")[0] + " " + filter);
                if ( td.textContent.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
        localStorage.setItem("counter", 100)
        function addTrain(){
            localStorage.setItem("flag", "1");
            window.location.replace("/addtrain.php");
        }
        const api_url ="http://localhost:8080/api/train";
        async function getapi(url) {
	        let options = {
              method:'GET'
          }
	        const response = await fetch(url,options);
	        var data = await response.json();
	        show(data);
        }
        getapi(api_url);
        function show(data) {
            i = 0;
            let tab =``;
                for (let r of data) {
                    tab += `<tr>
                            <td>${r.train_number} </td>
                            <td>${r.train_name}</td>
                            <td>${r.source}</td>
                            <td>${r.destinations}</td>
                            <td>${r.ticket_price}</td>
                            <td>${r.st_date}</td>
                            <td><a href="#" class="${r.train_number}" onclick="detailsTrain()">Details</a></td>		
                            </tr>`;
                            i++;
                }
                document.getElementById("myUL").innerHTML = tab;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    

</body>
</html>