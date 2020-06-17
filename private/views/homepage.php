<?php $this->layout('website'); ?>

<div class="asidegrid">
    <div class="mainintro">
        <h1>Want To Move!</h1>

        <br>
        <br>

        <h4>
            Bij 12Move geloven wij dat fitness toegankelijk moet zijn voor iedereen.
            12Move geeft veel opties om thuis te sporten of lekker buiten in je tuin! Omdat trainen leuker wordt wanneer je het flexibel in kan passen in je leven. Vooral in dit aparte tijdperk
        </h4>

        <br>

        <img src="<?php echo site_url("/images/banner.jpg"); ?>" alt="Man sporting" width="550" height="350">
    </div>

    <div class="rechtinfo">
        <h2>COVID-19</h2>
        <h4>Wereldwijde statistieken:</h4>
        <h5>Totale besmettingen:<br /> <span id="totalConfirmed">Loading...</span></h5>
        <h5>Nieuwe genezingen:<br /> <span id="newRecovered">Loading...</span></h5>
        <h5>Totale genezingen:<br /> <span id="totalRecovered">Loading...</span></h5>
        <script src="<?php echo site_url("/js/COVID19_API.js"); ?>"></script>
        
        <hr />

        <form name="form">
            <fieldset>
                <legend style="float:right">Bereken BMI</legend>
                <label for="gewicht">Gewicht:</label><br>
                <input type="text" id="gewicht" name="gewicht" placeholder="KG"><br>
                <br>
                <label for="lengte">Lengte:</label><br>
            
                <input type="text" id="lengte" name="lengte" placeholder="CM"><br>
                <button type="submit" class="active">Berekenen</button><br>
                <br>
                <h3 id="bmi">Je BMI wordt berekend nadat je de gegevens hebt ingevuld.</h3>
            </fieldset>

        </form>
        <script src="<?php echo site_url("/js/BMI_Calculator.js"); ?>"></script>
    </div>
</div>