<?php

namespace Website\Controllers;

/**
 * Class WebsiteController
 *
 * login pagina
 */
class DailyChallController
{

    public function dailyPage()
    {
        $template_engine = get_template_engine();
        echo $template_engine->render('daily_challenges');
    }
}