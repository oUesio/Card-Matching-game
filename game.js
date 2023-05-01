function generateImages(cards, matching) {
    let imgs = [{
            head: Math.floor(Math.random() * 7),
            eyes: Math.floor(Math.random() * 6),
            mouth: Math.floor(Math.random() * 6),
            other: Math.floor(Math.random() * 4)
            }]
    for (let x = 0; x < ((cards / matching) - 1); x++) { //creates imgs enough for the round
        let unique = false;
        while (!unique) { //makes sure img added is unique enough
            let features = {
            head: Math.floor(Math.random() * 7),
            eyes: Math.floor(Math.random() * 6),
            mouth: Math.floor(Math.random() * 6),
            other: Math.floor(Math.random() * 4)
            }
            similarImgExists = false;
            for (let pos = 0; pos < imgs.length; pos++) { //finds similarities in all created imgs
                sharedFeaturesCount = 0;
                if (imgs[pos].head == features.head) { //can't have the same heads
                    sharedFeaturesCount++;
                    sharedFeaturesCount++;
                } if (imgs[pos].eyes == features.eyes) {
                    sharedFeaturesCount++;
                } if (imgs[pos].mouth == features.mouth) {
                    sharedFeaturesCount++;
                } if (imgs[pos].other == features.other) {
                    sharedFeaturesCount++;
                } 
                if (sharedFeaturesCount > 1) { //can't have more than 1 features the same
                    similarImgExists = true;
                    break;
                }
            }
            if (!similarImgExists) { //adds img when finished checking all and no similarities found
                imgs.push(features);
                unique = true;
            }
        }
    }
    return imgs;
}

function createCards(cards, matching) {
    document.getElementById("game").innerHTML = "";
    let matchingCardsArray = [];

    const images = generateImages(cards, matching);
    for (let x = 0; x < matching; x++) { //no. of rows = no. of cards which need to match
        matchingCardsArray.push(new Array(cards / matching).fill(-1));
        const row = document.createElement("div");
        row.className = "row";
        row.id = "row"+x.toString() 
        row.style.height = `${document.getElementById("game").offsetHeight / (matching+1)}px`;

        for (let x = 0; x < (cards / matching); x++) {
            const temp = document.createElement("div");
            row.appendChild(temp);
        }
        
        document.getElementById("game").appendChild(row);
    }
    let headPaths = ['avatar/head/yellow.svg', 'avatar/head/red.svg', 'avatar/head/pink.svg', 'avatar/head/purple.svg', 'avatar/head/blue.svg', 'avatar/head/cyan.svg', 'avatar/head/lime.svg']
    let eyesPaths = ['avatar/eyes/annoyed.svg', 'avatar/eyes/dizzy.svg', 'avatar/eyes/down-closed.svg', 'avatar/eyes/open-wide.svg', 'avatar/eyes/open.svg', 'avatar/eyes/squint.svg']
    let mouthPaths = ['avatar/mouth/frown.svg', 'avatar/mouth/sad.svg', 'avatar/mouth/shout.svg', 'avatar/mouth/smile-lips.svg', 'avatar/mouth/smile.svg', 'avatar/mouth/yawn.svg']
    let otherPaths = ['avatar/other/cheeks.svg', 'avatar/other/glasses.svg', 'avatar/other/sleep.svg', 'avatar/other/tear.svg']
                    
    for (let pos = 0; pos < images.length; pos++) {
        const card = document.createElement("div");
        card.className = "card";
        card.style.height = `${document.getElementById("game").offsetHeight / (matching+1)}px`;//document.getElementById("game").height;
        card.style.width = `${document.getElementById("game").offsetWidth / ((cards / matching)+1)}px`;//document.getElementById("game").width;
        
        const cardInner = document.createElement("div");
        cardInner.className = "card-inner";
        const cardFront = document.createElement("div");
        cardFront.className = "card-front";
        const cardBack = document.createElement("div");
        cardBack.className = "card-back";

        cardInner.appendChild(cardFront);
        cardInner.appendChild(cardBack);

        card.appendChild(cardInner)

        const img = document.createElement("div");
        img.className = "combined";

        const head = document.createElement("IMG");
        head.setAttribute("src", headPaths[images[pos].head]);
        img.appendChild(head);

        const eyes = document.createElement("IMG");
        eyes.setAttribute("src", eyesPaths[images[pos].eyes]);
        img.appendChild(eyes);

        const mouth = document.createElement("IMG");
        mouth.setAttribute("src", mouthPaths[images[pos].mouth]);
        img.appendChild(mouth);

        const other = document.createElement("IMG");
        other.setAttribute("src", otherPaths[images[pos].other]);
        img.appendChild(other);
        
        cardBack.appendChild(img);

        let added = false;
        while (!added) {
            rowNum = Math.floor(Math.random() * matching)
            colNum = Math.floor(Math.random() * (cards / matching))
            let element = document.getElementById("row"+rowNum.toString());
            if (element.childNodes[colNum].className != "card") {
                card.firstElementChild.id = rowNum.toString()+colNum.toString();
                element.replaceChild(card, element.childNodes[colNum]);
                matchingCardsArray[rowNum][colNum] = pos;
                added = true;
            }
        }

        for (let x = 0; x < matching-1; x++) {
            added = false;
            while (!added) {
                rowNum = Math.floor(Math.random() * matching)
                colNum = Math.floor(Math.random() * (cards / matching))
                let element = document.getElementById("row"+rowNum.toString());
                if (element.childNodes[colNum].className != "card") {
                    let newCard = card.cloneNode(true);
                    newCard.firstElementChild.id = rowNum.toString()+colNum.toString();
                    element.replaceChild(newCard, element.childNodes[colNum]);
                    matchingCardsArray[rowNum][colNum] = pos;
                    added = true;
                }
            }
        }
    }
    return matchingCardsArray;
}

function showEndScreen(points, message) {
    document.getElementById("game").innerHTML = "";

    const text = document.createElement("h1");
    text.appendChild(document.createTextNode(message.toString()));
    text.style.fontSize = "50px";
    document.getElementById("game").appendChild(text);

    const score = document.createElement("h1");
    score.appendChild(document.createTextNode("Final score: "+points.toString()));
    score.style.fontSize = "60px";
    document.getElementById("game").appendChild(score);

    const playAgain = document.createElement("h1");
    const restart = document.createElement("a")
    restart.style.textDecoration = "none";
    restart.style.color = "white";
    restart.appendChild(document.createTextNode("Play Again"));
    restart.href = "pairs.php";
    playAgain.appendChild(restart);
    playAgain.style.fontSize = "40px";                                        
    document.getElementById("game").appendChild(playAgain);


    const submitScore = document.createElement("h1");
    submitScore.appendChild(document.createTextNode("Submit"));
    submitScore.onclick = function() {
        localStorage.setItem("name", getCookie('username'));
        localStorage.setItem("points", points);
        localStorage.setItem("roundPoints", roundPoints);
    }; 
    submitScore.style.fontSize = "30px";
    document.getElementById("game").appendChild(submitScore);
}

function showContinueScreen(points) {
    document.getElementById("game").innerHTML = "";

    const cont = document.createElement("h1");
    cont.appendChild(document.createTextNode("Continue?"));
    cont.style.fontSize = "50px";                
    cont.onclick = function() {
        document.getElementById("pointsRound").innerHTML = document.getElementById("pointsRound").innerHTML.substring(0, 14) + '0';
        startRound(rounds[round][0], rounds[round][1]);
    };                        
    document.getElementById("game").appendChild(cont);

    const score = document.createElement("h1");
    score.appendChild(document.createTextNode("Total score: "+points.toString()));
    score.style.fontSize = "60px";
    document.getElementById("game").appendChild(score);

    const finish = document.createElement("h1");
    finish.appendChild(document.createTextNode("End Game?"));
    finish.onclick= function() {showEndScreen(points, 'Congratulations!')};
    finish.style.fontSize = "30px";
    document.getElementById("game").appendChild(finish);
}

function startRound(totalCards, matching) { 
    let attempts = 0;
    let cardsFlipped = []; //the cards being checked
    let cardMatches = createCards(totalCards, matching); //2d array of cards which match
    var cards = document.querySelectorAll('.card-inner');
    let cardStates = []; //2d array of cards flipped because they have been matched
    let allFlipped = false;
    var clickActive = 1;
    var countDownDate = new Date().getTime() + (120 * 1000); //2 mins
    var timeRemaining = countDownDate;
    let match = [];
    let pointsRound = 0;

    var timer = setInterval(function() {
        var now = new Date().getTime();
        timeRemaining = countDownDate - now;
            
        var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
            
        document.getElementById("time").innerHTML = document.getElementById("time").innerHTML.substring(0, 14) + minutes + "m " + seconds + "s ";
            
        if (timeRemaining <= 0) { //fail game when time runs out
            clearInterval(timer);
            showEndScreen(0, 'Time ran out');
        }
    }, 1000);

    const checkFlipped = arr => arr.every( a => a.every( b => b == true ));

    for (let x = 0; x < matching; x++) {
        cardStates.push(new Array(totalCards / matching).fill(false));
    }


    [...cards].forEach((card)=>{
    card.addEventListener('click', function() {
            if (clickActive) {
                if (!card.classList.contains('is-flipped')) { //flips if isnt already, prevents adding to flipped array
                    card.classList.add('is-flipped');
                    cardsFlipped.push(card.id);
                    match.push(cardMatches[card.id.substring(0, 1)][card.id.substring(1, 2)]);
                    if (cardsFlipped.length == matching) { 
                        clickActive = 0;
                        if (match.every( (val, i, arr) => val === arr[0])) {
                            points += Math.round(timeRemaining / 1000);
                            pointsRound += Math.round(timeRemaining / 1000);
                            document.getElementById("pointsTotal").innerHTML = document.getElementById("pointsTotal").innerHTML.substring(0, 14) + points.toString();
                            document.getElementById("pointsRound").innerHTML = document.getElementById("pointsRound").innerHTML.substring(0, 14) + pointsRound.toString();
                            for (let x = 0; x < matching; x++) {
                                cardStates[cardsFlipped[x].substring(0, 1)][cardsFlipped[x].substring(1, 2)] = true;
                            }
                            allFlipped = checkFlipped(cardStates);
                            if (allFlipped) { //win
                                points -= attempts;
                                pointsRound -= attempts;
                                roundPoints[round] = pointsRound;

                                round += 1
                                clearInterval(timer);
                                if (round == 7) {
                                    showEndScreen(points, 'Congratulations!');
                                } else {
                                    showContinueScreen(points);
                                }
                            }
                            cardsFlipped = [];
                            match = [];
                            clickActive = 1;
                        } else {
                            if (attempts == 25) { //fail game when too many attempts made
                                clearInterval(timer);
                                showEndScreen(0, 'Too many attempts made');
                            }
                            for (let x = 0; x < matching; x++) {
                                setTimeout(function() {document.getElementById(cardsFlipped[x]).classList.remove('is-flipped');}, 1000);
                            }
                            setTimeout(function() {
                                cardsFlipped = [];
                                match = [];
                                clickActive = 1;
                            }, 1200);
                        }
                        attempts += 1;
                        document.getElementById("attempts").innerHTML = document.getElementById("attempts").innerHTML.substring(0, 15) + (attempts).toString();
                    }
                }
            }
        });
    });
}
