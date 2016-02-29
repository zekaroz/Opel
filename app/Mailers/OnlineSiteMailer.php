<?php  namespace Reciopel\Mailers;

/**
 * Class to send emails from the website
 */

class OnlineSiteMailer extends Mailer
{
    public function __construct(){

    }

    public function contactUs($emailTo, $name, $number, $customer_email, $message)
    {
        $view = 'online_shop.contactEmail';
        $data = ['customer_email' => $customer_email,
                 'customer_name'  => $name,
                 'customerMessage'=> $message,
                 'contact_number' => $number
                ];
        $subject = 'Contacto Online de ' . $name;

        return $this->sendTo($emailTo, $subject, $view, $data);
    }
}
