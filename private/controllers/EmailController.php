<?php

namespace Website\Controllers;

/**
 * Class WebsiteController
 *
 * confirm email
 */
class EmailController
{

    public function sendTestEmail()
    {
        $mailer = getSwiftMailer();
        $message = createEmailMessage('', 'test mail', 'Mike Yang', 'aznlilmike@hotmail.com');
        $message->setBody('content of testmail');

        $aantal_verstuurd = $mailer->send($message);
        echo "Aantal = " . $aantal_verstuurd;
    }
}