<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(#141e30, #243b55);
}

.register-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.register-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.register-box .user-box {
  position: relative;
}

.register-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.register-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.register-box .user-box input:focus ~ label,
.register-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.register-box form button {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  margin-left: 25%;
  letter-spacing: 4px;
  background-color: transparent;
}

.register-box button:hover {
  background: #000000;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}

.register-box button span {
  position: absolute;
  display: block;
}

.register-box button span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.register-box button span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.register-box button span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  100%,100% {
    right: 100%;
  }
}

.register-box button span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  100%,100% {
    bottom: 100%;
  }
}


.animate {
    height: 100%;
    display: block;
    margin: 0;
    padding: 0;
    width: 100%;
}

.animate > li {
    position: absolute;
    height: 50px;
    width: 50px;
    top: 100%;
    left: 19px;
    background-color: rgba(255, 255, 255, 0.1);
    z-index: -1;
    overflow: hidden;
    animation: move 10s linear infinite;
}

.animate > li:nth-last-of-type(2) {
    left: 70px;
    animation-delay: 3.5s;
    height: 15px;
    width: 15px;
}

.animate > li:nth-last-of-type(3) {
    left: 140px;
    animation-delay: 3s;
   
}

.animate > li:nth-last-of-type(4) {
    left: 210px;
    animation-delay: 1.5s;
}
.animate > li:nth-last-of-type(5) {
    left: 310px;
    animation-delay: 3.5s;
}

/* Continue with other li:nth-last-of-type() animations */
/* ... Rest of your styles */

@keyframes move {
    to {
        top: -10px;
        margin-left: 50%;
        margin-right: 20%;
        transform: rotate(310deg);
    }
}

@keyframes move {
    to {
        top: -40px;
        margin-left: 20%;
        margin-right: 50%;
        transform: rotate(310deg);
    }
}


.signup-link {
        margin: 20px 0 10px;
        text-align: center;
      }
      .signup-link a {
        font-size: 1em;
        color: #0ef;
        text-decoration: none;
        font-weight: 600;
      }
      .signup-link a:hover {
        text-decoration: underline;
      }


    </style>
</head>

<body>


    <div class="register-box">
        <h2>Register</h2>
        <form action="proses_register.php" method="post">
            <div class="user-box">
                <input type="text" name="username" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>

            <button type="submit">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                register
            </button>
        </form>
        <ul class="animate">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>

        <div class="signup-link">
            <a href="login.php">-->> kembali Ke Login <<-- </a>
          </div>
      </div>

</body>
</html>