# 12Move - Schoolopdracht
Project voor PROJ: COVID19.

# Opdracht beschrijving
We moeten voor het schoolvak BAP (Afgekort Backend Programming) een website maken die voor een specifieke doelgroep in de corona tijden heel handig zou zijn. Mike Yang en ik kozen specifiek voor een onderdeel: Fit blijven. Wij wilden een website maken waar je meerdere dingen op kon doen, waaronder sportvideo's bekijken.

# Uitwerking 
Mike Yang en ik hebben samengewerkt om deze website tot realiteit te brengen. Ik werkte voornamelijk aan de functies binnen de website en de hosting. Zo heb ik bijvoorbeeld de BMI Calculator die op de website te vinden is gemaakt. Dat ging als volgt:

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
