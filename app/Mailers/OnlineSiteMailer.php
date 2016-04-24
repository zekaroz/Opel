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
        $view = 'online_shop.contactEmail2';
        $data = ['customer_email' => $customer_email,
                 'customer_name'  => $name,
                 'customerMessage'=> $message,
                 'contact_number' => $number
                ];
        $subject = '[Reciopel] Contacto de ' . $name;

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send($view, $data, function($message) use ($emailTo, $subject)
        {
            $message
                ->from(env('RECIOPEL_MAIL', 'zekaroz@gmail.com'))
                ->to($emailTo)
                ->subject($subject);
        });

    }
}
