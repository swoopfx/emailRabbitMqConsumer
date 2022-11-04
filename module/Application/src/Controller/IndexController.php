<?php

namespace Application\Controller;

use AcMailer\Service\MailServiceInterface;
use RabbitMqModule\Consumer;
use AcMailer\Service\MailService;
use Laminas\Mail\Message;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Mail\Transport\Smtp as SmtpTransport;
use Laminas\Mail\Transport\SmtpOptions;
use Laminas\View\Model\JsonModel;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


use function sprintf;

final class IndexController extends AbstractActionController
{

    /**
     * Undocumented variable
     *
     * @var MailService
     */
    private $mailservice;

    /**
     * Rabbit Mq Consumer
     *
     * @var Consumer
     */
    private $rabbitConsumer;

    public function __construct($rabbitConsumer)
    {
        // $this->mailservice = $mailservice;
        $this->rabbitConsumer = $rabbitConsumer;
    }

    public function indexAction()
    {

        // var_dump($this->mail)


        /**
         * @var MailService
         */
        // $mailService = $this->mailservice;
        // $result = $this->mailservice->send('contact', [
        //     'subject' => 'This is the subject',
        //     'to' => ['foobar@example.com', 'another@example.com'],
        //     'bcc' => ['hidden@domain.com'],
        // ]);

        // $this->mailservice->send("ezekiel_a@yahoo.com", [
        //     'body' => 'The body',
        //     'subject' => 'The subject',
        //     'to' => ['recipient_one@domain.com', 'recipient_two@domain.com'],
        // ]);
        // return new JsonModel([
        //     "welcome home"
        // ]);
       

        // return "welcome";
        $this->rabbitConsumer->consume();

    }
    // protected function configure()
    // {
    //     $this
    //         ->addArgument('message', InputArgument::REQUIRED, 'Greeting Message');
    // }

    // protected function execute(InputInterface $input, OutputInterface $output)
    // {
    //     $message = $input->getArgument('message');
    //     $output->writeln(sprintf('<info>Hello to world: %s<info>! ', $message));

    //     return 0;
    // }

    /**
     * Set the value of mailservice
     *
     * @return  self
     */
    public function setMailservice($mailservice)
    {
        $this->mailservice = $mailservice;

        return $this;
    }
}
