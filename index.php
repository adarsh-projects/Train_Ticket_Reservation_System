<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/css/index.css">
    <link rel="stylesheet" href="./css/css/login.css">
    <link rel="stylesheet" href="./css/css/signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="206066169954-ejpb3egmng04mch98ki0sdjicgtulkb1.apps.googleusercontent.com">
    <style>
      .form-popup{
        border-radius: 5px;
          bottom: 15%;
          right: 25%;
          top: 5%;
      }
      .close{
        color: #fff;
        background-color: rgb(32, 166, 255);
        border: 1px solid rgb(32, 166, 255);
        font-size: 30px;
        font-weight: 400;
        line-height: 27px;
        height: 25px;
        margin-top: 5%;
        margin-right: -10%;
        width: 25px;
        border-radius: 50%;
        overflow: hidden;
        opacity: 1;
        position: absolute;
        left: auto;
        right: 8px;
        top: 8px;
        z-index: 1;
        transition: all 0.3s;
      }
      .close:hover{
        color: #fff;
        box-shadow: 0 0 5px rgba(0,0,0,0.5);
      }
      .close:focus{ outline: none; }
    </style>
      <script>

        window.fbAsyncInit = function() {
          // FB JavaScript SDK configuration and setup
          FB.init({
            appId      : '215034370677549', // FB App ID
            cookie     : false,  // enable cookies to allow the server to access the session
            xfbml      : true,  // parse social plugins on this page
            version    : 'v3.2' // use graph api version 2.8
          });
          
          // Check whether the user already logged in
          FB.getLoginStatus(function(response) {
              if (localStorage.getItem("fflag") == 'fl') {
                document.getElementById("signuppage").style.display = "none";
                document.getElementById("adminloginpage").style.display = "none";
                document.getElementById("loginpage").style.display = "none";
                document.getElementById("n1").disabled = false;
                document.getElementById("n2").disabled = false;
                document.getElementById("n1").style.opacity = 1;
                document.getElementById("n2").style.opacity = 1;
                document.getElementById('dropdownMenuButton1').style.display = 'none';
                document.getElementById('sig').style.display = 'none';
                document.getElementById('username').textContent = "Hello, " + localStorage.getItem("fname");
                document.getElementById('profileimg').src = localStorage.getItem("furl");
                document.getElementById('username').style.display = 'block';
                document.getElementById('profileimg').style.display = "block";
                
              }
          });
        };

        // Load the JavaScript SDK asynchronously
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        // Facebook login with JavaScript SDK
        function fbLogin() {
          FB.login(function (response) {
              if (response.authResponse) {
                  // Get and display the user profile data
                  getFbUserData();
              } else {
                  document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
              }
          }, {scope: 'email'});
        }

        // Fetch the user profile data from facebook
        function getFbUserData(){
          FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
          function (response) {
              localStorage.setItem("fflag", "fl");
              localStorage.setItem("fname", response.first_name);
              localStorage.setItem("furl", response.picture.data.url);
              document.getElementById("signuppage").style.display = "none";
              document.getElementById("adminloginpage").style.display = "none";
              document.getElementById("loginpage").style.display = "none";
              document.getElementById("n1").disabled = false;
              document.getElementById("n2").disabled = false;
              document.getElementById("n1").style.opacity = 1;
              document.getElementById("n2").style.opacity = 1;
              document.getElementById('dropdownMenuButton1').style.display = 'none';
              document.getElementById('sig').style.display = 'none';
              document.getElementById('username').textContent = "Hello, " + response.first_name;
              document.getElementById('profileimg').src = response.picture.data.url;
              document.getElementById('username').style.display = 'block';
              document.getElementById('profileimg').style.display = "block";
              
          });
        }

        // Logout from facebook
        function fbLogout() {
          localStorage.setItem("fflag", "fo");
          FB.logout(function() {
            document.getElementById('username').style.display = "none";
            document.getElementById('profileimg').style.display = "none";
            document.getElementById('dropdownMenuButton1').style.display = "block";
            document.getElementById('sig').style.display = "block";
          });
        }
    </script>
    <script>
        function onSignIn(googleUser) {
              var profile = googleUser.getBasicProfile();
              localStorage.setItem("fflag", "fl");
              localStorage.setItem("furl", profile.getImageUrl());
              document.getElementById("signuppage").style.display = "none";
              document.getElementById("adminloginpage").style.display = "none";
              document.getElementById("loginpage").style.display = "none";
              document.getElementById("n1").disabled = false;
              document.getElementById("n2").disabled = false;
              document.getElementById("n1").style.opacity = 1;
              document.getElementById("n2").style.opacity = 1;
              document.getElementById('dropdownMenuButton1').style.display = 'none';
              document.getElementById('sig').style.display = 'none';
              document.getElementById('username').textContent = "Hello, Adarsh";
              document.getElementById('profileimg').src = profile.getImageUrl();
              document.getElementById('username').style.display = 'block';
              document.getElementById('profileimg').style.display = "block";
          }
    </script>
  </head>
<body>
    <div id="n1" class="container" style="background-color:rgb(223, 221, 221);">
        <div class="row">
          <div class="col">
            <button class="pnrsttaus">PNR Status</button>
          </div>
          <div class="col col-lg-8">
            <h1 class="logo">SAFAR</h1> 
          </div>
          <div class="col" style="text-align:right;">
            <div class="dropdown">
              <button class="login dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Login 
              </button>
              <ul class="dropdown-menu" style="padding-left: 10px;" aria-labelledby="dropdownMenuButton1">
                <li><button class="signup" style="white-space: nowrap; width: 130px;" onclick="openForm()"> User Login</button></li>
                <li><button class="signup" style="white-space: nowrap; width: 130px;" onclick="openForm2()">Admin Login</button></li>
              </ul>
              <h3 id="username" style="font-size:18px; margin-top:20px; ">hello, Adarsh</h3>
            </div>
          </div>
          <div class="col">
            <button class="signup" id="sig" onclick="openForm1()">SignUp</button>
            <img id="profileimg" class="dropdown-toggle" src="./img/img/image.png" data-bs-toggle="dropdown" aria-expanded="false" alt="">
            <ul class="dropdown-menu" style="padding-left: 10px;" aria-labelledby="dropdownMenuButton1">
              <li><button class="signup" style="white-space: nowrap; width: 130px;" onclick="fbLogout()">Log Out</button></li>
            </ul>
          </div>
        </div>
    </div>
    <div id="n2" class="container" style="margin-top: 40px;">
        <div class="row">
          <div class="col">
            <h4 style="text-align: center; margin-left: -130px;"> Train number</h4>
              <div class="f">
                <div style="margin-left: 15px;">
                    <label>Train Number: </label><br>
                    <input type="text" id="train_number" placeholder="Enter train number">
                    <button id="gettrainstn" onclick="tranno()">Get train</button>
                </div>
                <div class="line" style="margin-left: 16px;">
                    <hr style="color: black;">
                    <p style="font-size: 20px;">or</p>
                    <hr>
                </div>
                <div style="margin-left: 15px; margin-top: -20px;">
                    <label>Source: </label>
                    <input type="text"  id="src" style="width: 370px;" placeholder="Enter train source">
                </div>
                <div style="margin-left: 15px;">
                    <label>Destination: </label>
                    <input type="text" id="des" style="width: 370px;" placeholder="Enter train destination">
                </div>
                <div style="margin-left: 15px;">
                    <label>Date: </label>
                    <input type="date" id="date1" style="width: 370px;">
                </div>
                <div style="margin-left: 15px;">
                    <button id="gettrainsd" onclick="srcdes()">Get Trains</button>
                </div>
              </div>
        </div>
        <div class="col">
            <div class="o">
                <h4 style="text-align: center;">Updates</h4> 
                <div class="p">
                    <p class="p1"><b style="font-size: 20px; color: red;"><sup>*</sup> train update :</b><br><span style="font-size: 18px;"> Amaravathi express enrouting from hubli to vijaywada from 01/01/2022</span></p>
                </div>
             </div>
          </div>
      </div>
    </div>
    <div class="form-popup" id="loginpage">
      <div class="row1">
        <div class="left" style="text-align: center;">
          <div style="width: 400px;">
            <div>
              <p style="margin-top: 60px;">Welcome to</p>
              <p style="margin-top: -30px;">SAFAR</p>
              <img src="./img/img/image.png" style="height: 200px; width: 200px;">
            </div>
          </div>
        </div>
        <div class="" style="background-color: white;">
          <div style="width: 400px; height: 500px; border: 1px solid  rgb(100, 165, 250);">
            <div class="centered" style="margin-left: 10px; margin-top: 50px;">
              <button type="button" class="close" onclick="closeForm()" data-dismiss="modal" aria-label="Close"><sup>×</sup></button>

                <h1>Login</h1>
                <div class="c2" style="width: 370px;">
                  <div class="c1 g-signin2" data-onsuccess="onSignIn" style="width:160px;">
                    <img src="./img/img/google.png" style="margin: 9px 0px 0px 10px; width: 18px; height: 18px;" alt="">
                    <p class="lginwith" >Log in with Google</p>
                  </div>
                  <div class="c1" onclick="fbLogin();" id="fbLink" style="margin-left: 3px; width: 170px;" >
                    <img src="./img/img/facebook.png" style="margin: 2px 0px 0px 0px; width: 32px; height: 32px;" alt="">
                    <p class="lginwith"  style="margin-left: -4px; white-space: nowrap;">Log in with Facebook</p>
                  </div>
                </div>
                <div class="line" style=" margin-top: 20px; margin-left: 24px;">
                  <hr style="color: black;">
                  <p style="font-size: 18px; margin: 0px 10px 0px 10px;">or</p>
                  <hr>
                </div>
                <div style="margin: -20px 0px 0px 20px;">
                    <label for="uname" style="margin-top: 30px;">E-mail</label><br>
                    <input type="text" id="username" placeholder="Enter Username" name="uname" required><br>
              
                    <label for="psw">Password</label><br>
                    <input type="password" id="password" placeholder="Enter Password" name="psw" required><br>
                      
                    <br>
                    <button id="login" onclick="check()">Login</button>
                    <p style="font-size: 12px;">New member ?<span><b style="color: rgb(100, 165, 250); font-size: 14px;"><a onclick="openForm1()">Register</a></b></span></p>
                </div>    
            </div>
        </div>
      </div>
      </div>
    </div>
    <div class="form-popup" id="signuppage">
      <div class="row12" style=" height: 550px;">
        <div style="width: 400px;  background-color: white;">
          <div style="margin-top: 50px;">
            <div>
              <button type="button" class="close" onclick="closeForm1()" data-dismiss="modal" aria-label="Close"><sup>×</sup></button>
                <h1>Sign Up</h1>
                <div class="c211" style="margin-top: 20px;">
                  <div class="c111 g-signin2" data-onsuccess="onSignIn" style="border: 1px solid black;">
                    <img src="./img/img/google.png" style="margin: 6px 0px 0px 10px; width: 22px; height: 22px;" alt="">
                    <p class="lginwith1">Log in with Google</p>
                  </div>
                  <div class="c111" onclick="fbLogin();" id="fbLink" style="margin-left: 5px; width: 500px;">
                    <img src="./img/img/facebook.png" style="width: 34px; height: 34px;" alt="">
                    <p class="lginwith1" style="margin-left: -10px; width: 130px;">Log in with Facebook</p>
                  </div>
                </div>
                <div class="line" style="margin-left: 24px;">
                  <hr style="color: black;">
                  <p style="font-size: 20px; margin: 0px 10px 0px 10px;">or</p>
                  <hr>
                </div>
                <div class="name" style="margin-left: 28px;">
                  <div class="col1">
                    <label for="first Name"> First Name</label>
                    <input style="width: 166px;" type="text" placeholder="First name"/>
                  </div>
                  <div class="col1">
                    <label for="Last Name"> Last Name</label>
                    <input style=" margin-left: 7px; width: 166px;" type="text" placeholder="Last name"/>
                  </div>
                </div>
                <div class="container" style=" margin-left: 16px; margin-top: -20px;">
                    <label for="uname" style="margin-top: 30px;">E-mail</label><br>
                    <input type="text" id="username" placeholder="Enter Username" name="uname" required><br>
              
                    <label for="psw">Password</label><br>
                    <input type="password" id="password" placeholder="Enter Password" name="psw" required><br>
                      
                    <br>
                    <button id="signUp" onclick="check()">SignUp</button>
                    <p style="font-size: 12px;">Already a member ?<span><b style="color: rgb(100, 165, 250); margin-left: 5px; font-size: 14px;"><a onclick="openForm()">Login</a></b></span></p>
                </div>    
            </div>
            </div>
        </div>
        <div class="col left" style="text-align: center;">
          <div class="split">
            <div class="centered">
              <p style="margin-top: 60px;">Welcome to</p>
              <p style="margin-top: -30px;">SAFAR</p>
              <img src="./img/img/image.png" style="height: 200px; width: 200px;">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-popup" id="adminloginpage">
      <div class="row1">
        <div class="left" style="text-align: center;">
          <div style="width: 400px;">
            <div>
              <p style="margin-top: 60px;">Welcome to</p>
              <p style="margin-top: -30px;">SAFAR</p>
              <img src="./img/img/image.png" style="height: 200px; width: 200px;">
            </div>
          </div>
        </div>
        <div class="" style="background-color: white;">
          <div style="width: 400px; height: 500px; border: 1px solid  rgb(100, 165, 250);">
            <div class="centered" style="margin-left: 10px; margin-top: 50px;">
              <button type="button" class="close" onclick="closeForm2()" data-dismiss="modal" aria-label="Close"><sup>×</sup></button>

                <h1>Admin Login</h1>
                
                <div style="margin: -20px 0px 0px 20px;">
                    <label for="uname" style="margin-top: 30px;">E-mail</label><br>
                    <input type="text" id="adminusername" placeholder="Enter Username" name="uname" required><br>
              
                    <label for="psw">Password</label><br>
                    <input type="password" id="adminpassword" placeholder="Enter Password" name="psw" required><br>
                      
                    <br>
                    <button id="login" onclick="adminlogin()">Login</button>
                </div>    
            </div>
        </div>
      </div>
      </div>
    </div>
    
    <script>
        function tranno(){
          if(localStorage.getItem("fflag") == 'fl'){
            var tno = document.getElementById("train_number").value;
            localStorage.setItem("train_no", tno);
            window.location.replace("/project/search_by_trainno.php");
          }else{
            alert("Please login or signup before searching trains")
          }
        }
        function srcdes(){
          
          if(localStorage.getItem("fflag") == 'fl'){
            var src = document.getElementById("src").value;
            var des = document.getElementById("des").value;
            var dates = document.getElementById("date1").value;
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;
            if(dates <= today){
              alert("please enter valid date");
            }else{
              localStorage.setItem("src_des", src+"_"+des);
              window.location.replace("/project/search_by_s_d.php")
            }
          }else{
            alert(document.getElementById("date1").value)
            alert("Please login or signup before searching trains")
          }
        }
        document.getElementById('username').style.display = 'none';
        document.getElementById('profileimg').style.display = 'none';
        function adminlogin(){
          var user = document.getElementById("adminusername").value;
          var pass = document.getElementById("adminpassword").value; 
          if(user=="admin" && pass=="admin"){
            window.location.replace("/adminPage.php");
          }else{
            alert("If Your Admin Then Only Use ADMIN LOGIN");
          }
        }
        function openForm() {
          document.getElementById("signuppage").style.display = "none";
          document.getElementById("adminloginpage").style.display = "none";
          document.getElementById("loginpage").style.display = "block";
          document.getElementById("n1").disabled = true;
          document.getElementById("n2").disabled = true;
          document.getElementById("n1").style.opacity = 0.5;
          document.getElementById("n2").style.opacity = 0.5;
        }
        
        function closeForm() {
          document.getElementById("loginpage").style.display = "none";
          document.getElementById("n1").disabled = false;
          document.getElementById("n2").disabled = false;
          document.getElementById("n1").style.opacity = 1;
          document.getElementById("n2").style.opacity = 1;
        }
        function openForm2() {
          document.getElementById("loginpage").style.display = "none";
          document.getElementById("signuppage").style.display = "none";
          document.getElementById("adminloginpage").style.display = "block";
          document.getElementById("n1").disabled = true;
          document.getElementById("n2").disabled = true;
          document.getElementById("n1").style.opacity = 0.5;
          document.getElementById("n2").style.opacity = 0.5;
        }
        
        function closeForm2() {
          document.getElementById("adminloginpage").style.display = "none";
          document.getElementById("n1").disabled = false;
          document.getElementById("n2").disabled = false;
          document.getElementById("n1").style.opacity = 1;
          document.getElementById("n2").style.opacity = 1;
        }
        function openForm1() {
          document.getElementById("loginpage").style.display = "none";
          document.getElementById("adminloginpage").style.display = "none";
          document.getElementById("signuppage").style.display = "block";
          document.getElementById("n1").disabled = true;
          document.getElementById("n2").disabled = true;
          document.getElementById("n1").style.opacity = 0.5;
          document.getElementById("n2").style.opacity = 0.5;
        }
        
        function closeForm1() {
          document.getElementById("signuppage").style.display = "none";
          document.getElementById("n1").disabled = false;
          document.getElementById("n2").disabled = false;
          document.getElementById("n1").style.opacity = 1;
          document.getElementById("n2").style.opacity = 1;
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    

  </body>
</html>