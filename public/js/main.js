(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0],
        p = /^http:/.test(d.location) ? 'http' : 'https';
    if (!d.getElementById(id)) {
        js = d.createElement(s);
        js.id = id;
        js.src = p + "://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);
    }
})(document, "script", "twitter-wjs");

// Create Navigation menu hihgliting
$(document).ready(function() {
    var url = window.location.pathname.split('/');
    var pathname = url[1];
    // Select second url parameter if website 
    // is not served from the the root url
    if (pathname === 'sonic_fusion') {
        pathname = url[2];
    }
    console.log(pathname);
    if (pathname === '' || pathname === 'index' || pathname === 'index.php') {
        pathname = '';
    }
    $("#mainmenu a[href$='" + pathname + "']")
        .parent()
        .addClass("highlight");
});

// Registration JS validation
function validate(form) {
    var fail = [];
    fail[0] = validateNickname(form.form_nickname.value);
    fail[1] = validatePassword(form.form_password.value);
    fail[2] = validateFirstname(form.form_firstname.value);
    fail[3] = validateLastname(form.form_lastname.value);
    fail[4] = validateEmail(form.form_email.value);
    var divi = document.getElementById("valid_paragraph");
    var lblcol = document.querySelectorAll("#lbl0, #lbl1, #lbl2, #lbl3, #lbl4");

    var addd = "";
    var sum = "";
    for (var j = 0; j < fail.length; j++) {
        sum += fail[j];
    }
    if (sum === "") {
        return true;
    } else {
        for (var i = 0; i < fail.length; i++) {
            addd += "<p>" + fail[i] + "</p>";
        }
        for (var e = 0; e < fail.length; e++) {
            lblcol[e].style.color = fail[e] !== "" ? "orange" : "black";
        }
        divi.innerHTML = addd;
        return false;
    }
}

function validateFirstname(field) {
    if (field === "")
        return "No Nickname was entered!\n";
    return "";
}

function validateLastname(field) {
    if (field === "")
        return "No Surname was entered!\n";
    return "";
}

function validateNickname(field) {
    if (field === "")
        return "No Username was entered!\n";
    else if (field.length < 5)
        return "Username must be at least 5 characters!\n";
    else if (/[^a-zA-Z0-9_-]/.test(field))
        return "Only a-z, A-Z, 0-9, - and _ allowed in Usernames!\n";
    return "";
}

function validatePassword(field) {
    if (field === "")
        return "No Password was entered!\n";
    else if (field.length < 6)
        return "Password must be at least 6 characters!\n";
    else if (!/[a-z]/.test(field) || !/[A-Z]/.test(field) ||
        !/[0-9]/.test(field))
        return "Passwords require one each of a-z, A-Z and 0-9!\n";
    return "";
}

function validateEmail(field) {
    if (field === "")
        return "No Email was entered!\n";
    else if (!((field.indexOf(".") > 0) &&
            (field.indexOf("@") > 0)) ||
        /[^a-zA-Z0-9.@_-]/.test(field))
        return "The Email address is invalid!\n";
    return "";
}
