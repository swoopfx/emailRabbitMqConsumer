<?php

namespace Application\Controller;

use PhpAmqpLib\Message\AMQPMessage;
use Laminas\Mail\Transport\SmtpOptions;
use Laminas\Mail\Message;
use Laminas\Mail\Transport\Smtp as SmtpTransport;
use RabbitMqModule\ConsumerInterface;

class Consumer implements ConsumerInterface{

    private $mail;

    public function __construct($mail)
    {
        $this->mail = $mail;
    }

    public function execute(AMQPMessage $message): ?int
    {
        $data = json_decode($message->body, true);

        try {
            $transport = new SmtpTransport();
        
        $options   = new SmtpOptions(array(
            'name'              => 'smtp.mailtrap.io',
            'host'              => 'smtp.mailtrap.io',
            'port'              => 2525,
            'connection_class'  => 'crammd5',
            'connection_config' => array(
                'username' => '0e01ebf2e8ea80',
                'password' => '8e76f4a0d4b8fd',
            ),
        ));


        $transport->setOptions($options);
        $message = (new Message())
        ->addFrom('sender@example.com', $data["foo"])
        ->addReplyTo('replyto@example.com', 'Jane Doe')
        ->setSubject('Demo of multiple mails per SMTP connection')
        ->setBody("Maily from {$data['foo']}");
        $message->setTo("ezekie_a@yahoo.com");
        $transport->send($message);
            
        } catch (\Throwable $th) {
            //throw $th;
        }
        return ConsumerInterface::MSG_ACK;
    }
}