const bmi = document.getElementById("bmi");
const advies = document.getElementById(`advies`);
const baseUrl = "/PROJ-MVC/js/bmi.php";


form.addEventListener('submit', function (event) {
    const gewicht = document.forms["form"]["gewicht"].value;
    const lengte = document.forms["form"]["lengte"].value;

    const url = createURL(baseUrl, gewicht, lengte);

    getRequest(url, callback);

    event.preventDefault();
});

function createURL(url, gewicht, lengte) {
    return `${url}?gewicht=${gewicht}&lengte=${lengte}`;
}


function callback(response) {
    if (response < 18.5) {
        bmi.innerText = `${response}: Je hebt ondergewicht!`;
    } else if (response < 24.9) {
        bmi.innerText = `${response}: Je hebt normaal gewicht!`;
    } else if (response < 24.9) {
        bmi.innerText = `${response}: Je hebt net iets teveel gewicht!`;
    } else {
        bmi.innerText = `${response}: Je hebt obesitas.`;
    }
}

function getRequest(url, callBack) {

    let request = new XMLHttpRequest()

    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let response = request.responseText;
            callBack(response)
        }
    };

    request.open(
        'GET',
        url,
        true
    );
    
    request.send();
}