# 12Move - Schoolopdracht
Project voor PROJ: COVID19.

# Opdracht beschrijving
We moeten voor het schoolvak BAP (Afgekort Backend Programming) een website maken die voor een specifieke doelgroep in de corona tijden heel handig zou zijn. Mike Yang en ik kozen specifiek voor een onderdeel: Fit blijven. Wij wilden een website maken waar je meerdere dingen op kon doen, waaronder sportvideo's bekijken.

# Uitwerking - Inleiding
Mike Yang en ik hebben samengewerkt om deze website tot realiteit te brengen. Ik werkte voornamelijk aan de functies binnen de website en de hosting. Mike richtte zich vooral op de backend functies en de styling van de website.

# Uitwerking - BMI Berekenen
Ik heb bij deze website gewerkt aan een BMI calculator, deze is als volgt uitgewerkt. 

Om te beginnen heb je waardes nodig. Deze waardes maken deel uit van de BMI, hier gaat het namelijk om de hoogte en het gewicht. Om de hoogte en het gewicht uit het formulier te halen gebruik ik een simpel stukje javascript.
```js
form.addEventListener('submit', function (event) {
    const gewicht = document.forms["form"]["gewicht"].value;
    const lengte = document.forms["form"]["lengte"].value;

    const url = createURL(baseUrl, gewicht, lengte);

    getRequest(url, callback);

    event.preventDefault();
});
```

Uiteindelijk sturen we de waardes op naar een php bestand, deze maakt uiteindelijk de berekening en stuurt het terug naar het javascript bestand.
```js
function createURL(url, gewicht, lengte) {
    return `${url}?gewicht=${gewicht}&lengte=${lengte}`;
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
```

```php
$gewicht = $_GET["gewicht"];
$lengte = $_GET["lengte"];

function bmi($gewicht, $lengte) {
    return round(
        $gewicht /
        ($lengte/ 100 * $lengte/ 100),
        2);
}
echo bmi($gewicht, $lengte);
```

Uiteindelijk als het PHP bestand de BMI heeft berekend sturen gaan we de beslissing maken onder welke categorie het getal valt.
```js
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
```

Dit is hoe het systeem werkt om je BMI te berekenen.

# Uitwerking - COVID19 API
Op de website hadden we nog een klein plekje, en we wilde graag een COVID19 API hebben met daarin infromatie over COVID19.

Informatie uit de API halen we op door JS.

```js
  
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
```

