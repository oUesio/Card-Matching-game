
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

            table {
                background-color: gray;
                box-shadow: 0 5px 5px 0 rgba(0,0,0,0.2);
                padding: 0;
                color: white;
                max-height: 100%;
                max-width: 80%;
                width: 80%;
                overflow-y: auto;
                border-spacing: 2px;
            }

            td, th {
                text-align: left;
                padding: 8px;
                height: 20px;
            }

            th {
                background-color: blue;
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
                <li id="leaderboard"><a href="leaderboard.php">Leaderboard</a></li>	
                <li id="memory"><a href="pairs.php">Play Pairs</a></li>				
            </ul>

            <table id="board">
                <tr>
                    <th>Username</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>Total points</th>
                </tr>
            </table>
        </div>

        <script>
            loadAvatar(); 
            addRow(localStorage.getItem("name"), localStorage.getItem("points"), localStorage.getItem("roundPoints").split(","))
        </script>
	</body>
</html>