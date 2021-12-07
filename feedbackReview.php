<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
    font-family: sans-serif;
}
.container {
  border: 2px solid #ccc;
  background-color: rgb(255, 206, 132);
  border-radius: 5px;
  padding: 16px;
  margin: 16px;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  border-radius: 5px;
  margin-right: 20px;
}

.container span {
  font-size: 20px;
  margin-right: 15px;
}

@media (max-width: 500px) {
  .container {
      text-align: center;
  }
  .container img {
      margin: auto;
      float: none;
      display: block;
  }
}
.frcontainer{
    width: 600px;
    height: 550px;
    border-radius: 5px;
    overflow-y: scroll;
    background-color: rgb(99, 189, 231);
}
.name{
    font-size: 30px;
    margin-top: 20px;
    font-weight: bold;
}
.email{
    font-size: 15px;
    margin-top: -30px;
}
.message{
    font-size: 15px;
    text-align: center;
}
.img1{
    position: absolute;
    z-index: -1;
    width: 1365px;
    height: 694px;
    margin-top: -35px;
    margin-left: -10px;
}
button{
    width: 90px;
    height: 35px;
    border: 1px solid rgb(99, 189, 231);
    border-radius: 5px;
    background-color: rgb(99, 189, 231);
    font-size: 15px;
    margin-left: 66%;
    margin-top: 10px;
}
</style>
</head>
<body>
    <img style="width:1280px; height:690px;" class="img1" src="/home_bank/train14.jpg" alt="">
    <h2 style="text-align: center; font-size: 40px; margin-top: -10px;">FeedBack review</h2>
    <div class="frcontainer" id="myUL" style="margin-top: -30px; margin-left: 30%;">        
    </div>
    <button onclick="goBack()">Back</button>
<script>
    function goBack(){
        window.location.replace("/adminPage.php");
    }
    const api_url ="http://localhost:8080/api/feedback/";
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
                    tab += `<div class="container">
                            <img src="./home_bank/profile/profileimg.png" alt="Avatar" style="width:90px">
                            <p class="name">${r.name}</p>
                            <p class="email">${r.email}</p><br>
                            <p class="message"><span style="font-size: 30px;">&#34;<span>${r.message}<span style="font-size: 30px;">&#34;<span></p>
                        </div>`;
                            i++;
                }
                document.getElementById("myUL").innerHTML = tab;
        }
</script>
</body>
</html>
