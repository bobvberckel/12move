// Een nieuw XMLHttpRequest aanmaken.
let request = new XMLHttpRequest;

// XMLHttpRequest openen.
request.open("GET", "https://api.covid19api.com/summary", true);

// Instellen dat onze return in JSON gaat zijn.
request.responseType = "json";

// Gegevens van de API ophalen.
request.onload = function() {
    const data = request.response;
    console.log(data);

    // Setting our HTML Elements.
    document.getElementById(`totalConfirmed`).innerHTML     =   data.Global.TotalConfirmed;
    document.getElementById(`newRecovered`).innerHTML       =   data.Global.NewRecovered;
    document.getElementById(`totalRecovered`).innerHTML     =   data.Global.TotalRecovered;
}

// Request versturen
request.send();