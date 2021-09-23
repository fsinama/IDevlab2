<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    /**
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    #[Route('/envoyer/email/', name: 'email_send', methods: ["POST"])]
    public function sendEmail(MailerInterface $mailer,Request $request): RedirectResponse
    {
        $subject = $request->get("name")." | ".$request->get("subject");
        $email = (new Email())
            ->from($request->get("forwarder"))
            ->to("f.sinama972@gmail.com")
            ->cc('f.sinama@idevlab.fr')
            ->bcc('floflo9721@gmail.com')
            //->replyTo('fabien@example.com')
            ->priority(Email::PRIORITY_HIGH)
            //->html('<p>See Twig integration for better HTML integration!</p>')
            ->subject($subject)
            ->text($request->get("body"));

        $mailer->send($email);

        // ...

        return $this->redirectToRoute('profile_cv');
    }
}
