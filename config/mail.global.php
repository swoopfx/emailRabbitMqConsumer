<?php

return [
    'acmailer_options' => [

        /*
         * This is where you configure all the emails that can be sent by the application.
         * You can create new ones at runtime, but this eases predefining emails that do not need to change
         */
        'emails' => [
            'contact' => [
                /*
                 * Another email from which to extend configuration. Any property defined here will overwrite the
                 * extended one.
                 * Defaults to null, which means no extension is performed
                 */
                //'extends' => null,

                /*
                 * From email address of the email.
                 * Default value is an empty string
                 */
                'from' => 'ezekiel_a@yahoo.com',

                /*
                 * From name to be displayed instead of from address.
                 * Default value is an empty string
                 */
                'from_name' => 'ezekiel_a@yahoo.com',

                /*
                 * ReplyTo email address of the email.
                 * Default value is an empty string
                 */
                //'reply_to' => '',

                /*
                 * ReplyTo name to be displayed instead of from address.
                 * Default value is an empty string
                 */
                //'reply_to_name' => '',

                /*
                 * Destination addresses of sent emails.
                 * It has to be an array of email addresses.
                 * Default value is an empty array.
                 */
                'to' => ["ezekiel_a@yahoo.com"],

                /*
                 * Copy destination addresses of sent emails.
                 * It has to be an array of email addresses.
                 * Default value is an empty array
                 */
                //'cc' => [],

                /*
                 * Hidden copy destination addresses of sent emails.
                 * It has to be an array of email addresses.
                 * Default value is an empty array
                 */
                //'bcc' => [],

                /*
                 * Encoding of headers
                 * Default value is an empty string
                 */
                //'encoding' => '',

                /*
                 * Email subject.
                 * Default value is an empty string
                 */
                //'subject' => '',

                /*
                 * The email body as string.
                 * Default value is an empty string
                 */
                //'body' => '',

                /*
                 * The template to be rendered at runtime in order to generate the email's body.
                 * If both 'template' and 'body' are defined, the template takes precedence.
                 * Default value is an empty string.
                 */
                //'template' => '',

                /*
                 * The list of params to pass to the email.
                 * When using laminas/view, you can define one 'layout' param with the layout to be used if the email
                 * Default value is an empty string
                 */
                //'template_params' => [],

                /*
                 * The list of files to attach to the email.
                 * It can be a numeric or associative array, or even mixed. When the key is a string, the key will be
                 * used as the name of the attachment.
                 * Default value is an empty string
                 */
                //'attachments' => [],

                /*
                 * The attachments dir. Used to preconfigure a directory from which all files will be attached.
                 * This property needs to have two nested properties:
                 *   - path: defines the path of the directory to iterate
                 *   - recursive: Tells if all nested directories should be recursively iterated too
                 * Default value is an empty array
                 */
                //'attachments_dir' => [
                //    'path' => 'data/attachments',
                //    'recursive' => false,
                //],

                /**
                 * The character set used in the email.
                 * Default value is utf-8
                 */
                //'charset' => 'utf-8',
            ],

            // You can define as much emails as you want
        ],

        /*
         * This defines different services to send emails.
         * All of them will be capable of sending any of the previously configured emails.
         */
        'mail_services' => [
            'default' => [
                /*
                 * Tells which other mail service configuration to extend.
                 * The default service is usually the one that doesn't extend any other configuration, but others extend
                 * from it.
                 * By default, extends value is null, which means no extension is performed.
                 */
                //'extends' => null,

                /*
                 * The mail transport to be used.
                 * You can define any class implementing Laminas\Mail\Transport\TransportInterface,
                 * either the fully qualified class name as string or the instance to be used.
                 *
                 * For standard mail transports, you can use any one of these aliases:
                 *   - sendmail  => Laminas\Mail\Transport\Sendmail
                 *   - smtp      => Laminas\Mail\Transport\Smtp
                 *   - file      => Laminas\Mail\Transport\File
                 *   - null      => Laminas\Mail\Transport\InMemory
                 *   - in_memory => Laminas\Mail\Transport\InMemory
                 *
                 * If for some reason you need to use a custom adapter which is complex to be created, you can also
                 * define the name of a service that returns a Laminas\Mail\Transport\TransportInterface instance.
                 * When the MailService is created, it will automatically check if this is an existing service.
                 *
                 * Default value is 'sendmail'
                 */
                'transport' => 'smtp',

                /*
                 * This defines specific options needed by the transport when using one of 'smtp' or 'file'.
                 * If you use a custom service or any of the other transport, you don't need to define this
                 */
                'transport_options' => [
                    /********/
                    /* SMTP */
                    /********/

                    /*
                     * Hostname or IP address of the mail server.
                     * Default value is localhost
                     */
                    'host' => 'smtp.mailtrap.io',

                    /*
                     * Port of the mail server.
                     * Default value is 25
                     */
                    'port' => 2525,

                    /*
                     * The connection class used for authentication.
                     * The value can be one of 'smtp', 'plain', 'login' or 'crammd5'.
                     * Default value is 'smtp'.
                     */
                    'connection_class' => 'crammd5',

                    'connection_config' => [
                        /*
                         * The SMTP authentication identity.
                         * Default value is an empty string
                         */
                        'username' => '0e01ebf2e8ea80',

                        /*
                         * The SMTP authentication credential.
                         * Default value is an empty string
                         */
                        'password' => '8e76f4a0d4b8fd',

                        /*
                         * This defines the encryption type to be used, 'ssl' or 'tls'.
                         * Null should be used to disable SSL.
                         * Default value is null
                         */
                        'ssl' => null,
                    ],

                    /********/
                    /* FILE */
                    /********/

                    /*
                     * This is the folder where the file is going to be saved
                     * Default value is 'data/mail/output'
                     */
                    //'path' => 'data/mail/output',

                    /*
                     * A callable that will get the Laminas\Mail\Transport\File object as an argument and should return the
                     * filename.
                     * Default value is null, in which case an empty callable will be used.
                     */
                    //'callback' => null,
                ],

                /*
                 * The renderer service name to be used to render email templates.
                 * When using laminas/mvc, default value is 'mailviewrenderer', which is an alias to the standard
                 * 'viewrenderer' registered by Laminas\Mvc
                 * When using mezzio, default value is Mezzio\Template\TemplateRendererInterface
                 *
                 * The service set here must return an instance of Mezzio\Template\TemplateRendererInterface
                 */
                //'renderer' => 'mailviewrenderer',

                /*
                 * A list of mail listeners that will be attached to the mail service when created.
                 * Each element can be either a string (in which case it will be considered a service name) or a
                 * AcMailer\Event\MailListenerInterface instance.
                 * Anything else will throw a AcMailer\Exception\InvalidArgumentException.
                 * All listeners defined as service names will be lazily attached, and won't be instantiated if no email
                 * is tried to be sent
                 * By default, the list of listeners is empty
                 */
                //'mail_listeners' => [],

                /* A boolean defining if `MailService::send()` should throw an
                 * `AcMailer\Exception\MailCancelledException` if sending has been cancelled by a listener. By default
                 * this is false, which means no exception is thrown, a `AcMailer\Result\MailResult` is returned
                 * instead.
                 */
                //'throw_on_cancel' => false,
            ],

            // You can define as much mail services as you want
        ],

        'attachment_parsers' => [
            // You can register your custom attachment parsers here
        ],
    ],
];
