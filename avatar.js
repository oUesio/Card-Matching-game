
function changeAvatar(part, img) {
    if (document.getElementById(part).src.includes(img)) {
        document.getElementById(part).src = "avatar/empty.svg"
    } else {
        document.getElementById(part).src = img
    }
}

function validateForm() {
    let x = document.forms["input"]["username"].value;
    let invalidChar = ['”','!','@','#','%','&','^','*','(',')','+','=','{','}','[',']','-',';',':','“',"'",'<','>','?','/'];
    if (x == "") {
        document.getElementById("invalid").innerHTML = "Please fill in a username.";
        return false;
    } 
    for (var pos = 0; pos < x.length; pos++) {
        if (invalidChar.includes(x.substring(pos))) {
            document.getElementById("invalid").innerHTML = "Contains an invalid character (”, !, @, #, %, &, ^, *, (, ), +, =, {, }, [, ], -, ;, :, “, ', <, >, ?, /).";
            return false;
        }
    }
    document.getElementById("invalid").innerHTML = " ";
    return true;
}

function setCookie(cname, value) {
    const d = new Date();
    d.setTime(d.getTime() + (21*24*60*60*1000)); //3 weeks
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + value + ";" + expires + ";path=/";
}

function saveUser() {
    setCookie('username', document.forms["input"]["username"].value);
    setCookie('head', document.getElementById('head').src);
    setCookie('eyes', document.getElementById('eyes').src);
    setCookie('mouth', document.getElementById('mouth').src);
    setCookie('other', document.getElementById('other').src);
    return true;
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let data = decodedCookie.split(';');
    for(let pos = 0; pos <data.length; pos++) {
        let x = data[pos];
        while (x.charAt(0) == ' ') {
        x = x.substring(1);
        }
        if (x.indexOf(name) == 0) {
            return x.substring(name.length, x.length);
        }
    }
    return "";
}

function loadAvatar() { 
    if (getCookie('username') != "") {
        document.getElementById("head").src = getCookie('head');
        document.getElementById('eyes').src = getCookie('eyes');
        document.getElementById('mouth').src = getCookie('mouth');
        document.getElementById('other').src = getCookie('other');
        return true;
    } 
    return false;
}

function addRow(name, points, roundPoints) {
    const row = document.createElement("tr");
    const username = document.createElement("td");
    username.appendChild(document.createTextNode(name));
    const score = document.createElement("td");
    score.appendChild(document.createTextNode(points));
    row.appendChild(username);
    for (let x = 0; x < roundPoints.length; x++) {
        const round = document.createElement("td");
        round.appendChild(document.createTextNode(roundPoints[x].toString()));
        row.appendChild(round);
    }
    row.appendChild(score);
    document.getElementById("board").appendChild(row);
}
