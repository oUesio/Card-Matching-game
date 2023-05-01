
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

            .combined {
                position:relative;
            }

            .combined img {
                position: absolute;
                height:100px; 
                width:100px;
            }

            #avatar {
                float: right;
                border-left: 3px solid white;
				width: 2cm;
				height: .9cm;
				padding-top: 7px;
                padding-right: 12px;
				text-align: center;
            }

            #avatar img {
                height:25px; 
                width:25px;
            }

            #game {
                float: left;
                background-color: gray;
                box-shadow: 0 5px 5px 0 rgba(0,0,0,0.2);
                padding: 0;
                color: white;
                position: relative;
                height: 100%;
                max-width: 75%;
                width: 75%;
                overflow-y: auto;
            }

            #stats {
                float: right;
                height: 100%;
                color: white;
                max-width: 20%;
                width: 20%;
                background-color: rgba(75, 75, 75, 0.8);
                border-radius: 10px;
                height: 200px;
            }

            #stats { 
                padding-left: 20px;
            }


            .card {
                background-color: transparent;
                border-radius: 25px;
                perspective: 1000px;
            }

            #game .combined {
                position: absolute;
                top: 20%;
                left: 20%;
                -moz-transform: translateX(-50%) translateY(-50%);
                -webkit-transform: translateX(-50%) translateY(-50%);
                transform: translateX(-50%) translateY(-50%);
            }

            .card-inner {
                position: relative;
                border-radius: 25px;
                width: 100%;
                height: 100%;
                text-align: center;
                transition: transform 0.6s;
                transform-style: preserve-3d;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            }

            .card-inner.is-flipped {
                transform: rotateY(180deg);
            }

            .card-front, .card-back {
                position: absolute;
                width: 100%;
                height: 100%;
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
            }

            .card-front {
                background-color: rgb(200, 200, 200);
                border-radius: 25px;

            }

            .card-back {
                background-color: #3a365e;
                border-radius: 25px;

                transform: rotateY(180deg);
            }

            .row {
                padding: 10px;
                display: flex;
                justify-content: space-between;
            }

            .row div {
                float: left;
                display: block;
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
                    transform: scale(1.2);
                    -webkit-transform: scale(1.2);
                }
            }

            h1#start {
                animation: leaves 2s ease-in-out infinite alternate;
                -webkit-animation: leaves 2s ease-in-out infinite alternate;
            }
        </style>

        <script src="avatar.js"></script> 
        <script src="game.js"></script> 
    <head>

    <body>
		<div id="main">
            <ul id="navbar">
                <li id="home"><a href="index.php">Home</a></li> 

                <li id="user"><div class="combined" id="avatar">
                    <img src="avatar/empty.svg" id="head">
                    <img src="avatar/empty.svg" id="eyes">
                    <img src="avatar/empty.svg" id="mouth">
                    <img src="avatar/empty.svg" id="other">
                </div></li>			
                <li id="register"><a href="registration.php">Register</a></li>	
                <li id="leaderboard"><a href="leaderboard.php">Leaderboard</a></li>	
                <li id="memory"><a href="pairs.php">Play Pairs</a></li>				
            </ul>
            <div>
                <div id="game">
                    <h1 id="start">Start the game</h1>
                </div>
                <div id="stats">
                    <p id="time">Time elapsed: 2m 0s</p>
                    <p id="attempts">Attempts made: 0</p>
                    <br>
                    <p id="pointsTotal">Total points: 0</p>
                    <p id="pointsRound">Round Points: 0</p>
                </div>
            </div>
        </div>

        <script>
            var registered = loadAvatar();
            if (registered) {
                document.getElementById("register").style.display = 'none';
            } else {
                document.getElementById("leaderboard").style.display = 'none';
                document.getElementById("user").style.display = 'none';
            }

            let points = 0;
            let round = 0;
            let roundPoints = new Array(7).fill(0);
            const rounds = [[6, 2], [8, 2], [10, 2], [12, 3], [15, 3], [16, 4], [20, 4]];
            document.getElementById("start").addEventListener( 'click', function() {startRound(6, 2)});
        </script>
	</body>
</html>