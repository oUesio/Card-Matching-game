
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>

            *:after {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }

            body, html {
                height: 100%;
                margin: 0;
                overflow: hidden;
                font-family: verdana;	
            }

            #main {
                position: relative;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                background-image: url("arcade-unsplash.jpg");
                height: 100%;
                max-width: 100%;
            }

            ul#navbar {
				list-style-type: none;
				padding: 0px;
				background-color: blue;
                height:38px;
                overflow: hidden;
			}

			ul#navbar li#home {
				float: left;
			}

			ul#navbar li a {
                transition: all .2s ease-in-out; 
                position: relative;
                float: right;
				display: block;
				width: 5cm;
				height: .7cm;
				padding-top: 10px;
				color: #a0a0a0;
				text-align: center;
				text-decoration: none;		
                font-size: 12px
			}

            ul#navbar li a:after {
                content: "";
                position: absolute;
                background-color: white;
                height: 5px;
                width: 0;
                left: 0;
                bottom: 0;
                transition: 0.3s;
            }

            ul#navbar li a:hover:after {
		        width: 100%;
			}

			ul#navbar li a:hover {
                color: white;
			    background-color: rgb(13, 140, 255);
                transform: scale(1.1); 
			}

            h1 {
                color: white;
                text-align: center;
            }

            @keyframes leaves {
                0% {
                    transform: scale(1.0);
                    -webkit-transform: scale(1.0);
                }
                100% {
                    transform: scale(1.5);
                    -webkit-transform: scale(1.5);
                }
            }
            
            h1#message1 {
                font-size: 250%;
            }

            h1#message2 {
                opacity: 0.8;
                animation: leaves 2s ease-in-out infinite alternate;
                -webkit-animation: leaves 2s ease-in-out infinite alternate;
            }

            #contain {
                position: absolute;
                top: 50%;
                left: 50%;
                -moz-transform: translateX(-50%) translateY(-50%);
                -webkit-transform: translateX(-50%) translateY(-50%);
                transform: translateX(-50%) translateY(-50%);
            }

            #combined {
                position:relative;
                float: right;
                border-left: 3px solid white;
				width: 2cm;
				height: .9cm;
				padding-top: 7px;
                padding-right: 12px;
				text-align: center;
            }

            #combined img {
                position:absolute;
                height:25px; 
                width:25px;
            }
        </style>
        <script src="avatar.js"></script>
    <head>

    <body>
		<div id="main">
            <ul id="navbar">
                <li id="home"><a href="index.php">Home</a></li> 

                <li id="user"><div id="combined">
                    <img src="avatar/empty.svg" id="head">
                    <img src="avatar/empty.svg" id="eyes">
                    <img src="avatar/empty.svg" id="mouth">
                    <img src="avatar/empty.svg" id="other">
                </div></li>	
                <li id="register"><a href="registration.php">Register</a></li>	
                <li id="leaderboard"><a href="leaderboard.php">Leaderboard</a></li>	
                <li id="memory"><a href="pairs.php">Play Pairs</a></li>			
            </ul>
            <div id="contain">
                <h1 id="message1"></h1>
                <a href="#" id="send" style="text-decoration:none"><h1 id="message2"></h1></a>
            </div>
        </div>

        <script>
            var registered = loadAvatar();
            if (registered) {
                document.getElementById("register").style.display = "none";

                document.getElementById("message1").innerHTML="Welcome to Pairs!";
                document.getElementById("message2").innerHTML="Click here to play";
                document.getElementById("send").href="pairs.php";
            } else {
                document.getElementById("leaderboard").style.display = "none";

                document.getElementById("message1").innerHTML="You're not using a registered session?";
                document.getElementById("message2").innerHTML="Register now";
                document.getElementById("send").href="registration.php";
            }
        </script> 
	</body>
</html>