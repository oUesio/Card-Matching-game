
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

            #details {
                padding: 0;
                color: white;
                position: relative;
                top: 50%;
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
                background-color: rgba(70, 70, 70, 0.8);
                height: 100%;
                max-width: 60%;
                overflow-y: auto;
            }

            #input {
                padding: 40px;
            }

            #username {
                padding:6px;
                border:0;
                margin:10px 0;
                box-shadow:0 0 15px 4px rgba(0,0,0,0.6);
                border-radius:10px;
                width: 300px;
                max-width: 100%;
            }

            input[type=submit] {
                color: white;
                border: none;
                background-color: blue;
                text-decoration: none;
                padding:10px;
                border-radius:14px;
                cursor: pointer;
                font-size: 20px;
            }

            .feature {
                list-style-type: none;
                margin: 0;
                padding:6px;
                display: flex;
                flex-direction: row;
                width: 100%;
                overflow-x: auto;
            }

            .feature li {
                flex: 0 0 auto;
			}

            .feature li img {
                width: 60px;
                height: 60px;
			}

            button[type="button"] {
                background-color: rgba(0,0,0,0.2);
                float: left;
            }
            ​
            #combined {
                position:relative;
            }

            #combined img {
                position:absolute;
                top:30%;
                left:75%;
                height:100px; 
                width:100px;
                padding: 5px;
                border:5px solid white;
                border-radius: 10px;
            }
        </style>
        
        <script src="avatar.js"></script> 
    <head>

    <body>
		<div id="main">
            <ul id="navbar">
                <li id="home"><a href="index.php">Home</a></li> 

                <li id="register"><a href="registration.php">Register</a></li>	
                <li id="memory"><a href="pairs.php">Play Pairs</a></li>			
            </ul>
            <div id="details">
                <form action="index.php" id="input" onsubmit="return validateForm() && saveUser()">
                    <label for="text">Username/nickname:</label><br>
                    <input type="text" id="username" name="username">
                    <p id="invalid"> </p>
                    <div id="combined">
                        <img src="avatar/empty.svg" id="head">
                        <img src="avatar/empty.svg" id="eyes">
                        <img src="avatar/empty.svg" id="mouth">
                        <img src="avatar/empty.svg" id="other">
                    </div>
                    <p>Head:</p>
                    <ul class="feature">
                        <li><button type="button" onclick="changeAvatar('head', 'avatar/head/yellow.svg')"><img src="avatar/head/yellow.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('head', 'avatar/head/red.svg')"><img src="avatar/head/red.svg"></button></li> 
                        <li><button type="button" onclick="changeAvatar('head', 'avatar/head/pink.svg')"><img src="avatar/head/pink.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('head', 'avatar/head/purple.svg')"><img src="avatar/head/purple.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('head', 'avatar/head/blue.svg')"><img src="avatar/head/blue.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('head', 'avatar/head/cyan.svg')"><img src="avatar/head/cyan.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('head', 'avatar/head/lime.svg')"><img src="avatar/head/lime.svg"></button></li>
                    </ul>
                    <br>
                    <p>Eyes:</p>
                    <ul class="feature">
                        <li><button type="button" onclick="changeAvatar('eyes', 'avatar/eyes/annoyed.svg')"><img src="avatar/eyes/annoyed.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('eyes', 'avatar/eyes/dizzy.svg')"><img src="avatar/eyes/dizzy.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('eyes', 'avatar/eyes/down-closed.svg')"><img src="avatar/eyes/down-closed.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('eyes', 'avatar/eyes/open-wide.svg')"><img src="avatar/eyes/open-wide.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('eyes', 'avatar/eyes/open.svg')"><img src="avatar/eyes/open.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('eyes', 'avatar/eyes/squint.svg')"><img src="avatar/eyes/squint.svg"></button></li>
                    </ul>
                    <br>
                    <p>Mouth:</p>
                    <ul class="feature">
                        <li><button type="button" onclick="changeAvatar('mouth', 'avatar/mouth/frown.svg')"><img src="avatar/mouth/frown.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('mouth', 'avatar/mouth/sad.svg')"><img src="avatar/mouth/sad.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('mouth', 'avatar/mouth/shout.svg')"><img src="avatar/mouth/shout.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('mouth', 'avatar/mouth/smile-lips.svg')"><img src="avatar/mouth/smile-lips.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('mouth', 'avatar/mouth/smile.svg')"><img src="avatar/mouth/smile.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('mouth', 'avatar/mouth/yawn.svg')"><img src="avatar/mouth/yawn.svg"></button></li>
                    </ul>
                    <br>
                    <p>Other:</p>
                    <ul class="feature">
                        <li><button type="button" onclick="changeAvatar('other', 'avatar/other/cheeks.svg')"><img src="avatar/other/cheeks.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('other', 'avatar/other/glasses.svg')"><img src="avatar/other/glasses.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('other', 'avatar/other/sleep.svg')"><img src="avatar/other/sleep.svg"></button></li>
                        <li><button type="button" onclick="changeAvatar('other', 'avatar/other/tear.svg')"><img src="avatar/other/tear.svg"></button></li>
                    </ul>
                    <br>
                    <input type="submit" value="Register">
                    <br>
                    <br>
                </form>
            </div>
        </div>
	</body>
</html>