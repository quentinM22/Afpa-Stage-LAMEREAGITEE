<?php

namespace App\Notification;

use App\Entity\Contact;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class ContactNotification
{
    /**
     * @var ContactInterface
     */
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }
    public function notifyMobilier(Contact $contact)
    {
          $email = (new TemplatedEmail()); 
          $email ->subject('La mère Agitée Contact: ' . $contact->getMobilier()->getTitle()) 
                 ->from('noreply@lamereagitee.fr')
                 ->to('contact@lamereagitee.fr') 
                 ->replyTo($contact->getEmail())
                 ->htmlTemplate('emails/mobilierContact.html.twig')
                 ->context([
                  'contact' => $contact
            ]);

          $this->mailer->send($email);
    }
    public function notifyCollage(Contact $contact)
    {
          $email = (new TemplatedEmail()); 
          $email ->subject('La mère Agitée Contact: ' . $contact->getCollage()->getTitle()) 
                 ->from('noreply@lamereagitee.fr')
                 ->to('contact@lamereagitee.fr') 
                 ->replyTo($contact->getEmail())
                 ->htmlTemplate('emails/collageContact.html.twig')
                 ->context([
                       'contact' => $contact
                 ]);

          $this->mailer->send($email);
    }
    public function notifyAutre(Contact $contact)
    {
          $email = (new TemplatedEmail()); 
          $email ->subject('La mère Agitée Contact: ' . $contact->getAutre()->getTitle()) 
                 ->from('noreply@lamereagitee.fr')
                 ->to('contact@lamereagitee.fr') 
                 ->replyTo($contact->getEmail())
                 ->htmlTemplate('emails/autreContact.html.twig')
                 ->context([
                  'contact' => $contact
            ]);

          $this->mailer->send($email);
    }
    public function notify(Contact $contact)
    {
          $email = (new TemplatedEmail()); 
          $email ->subject('La mère Agitée Demande Contact ') 
                 ->from('noreply@lamereagitee.fr')
                 ->to('contact@lamereagitee.fr') 
                 ->replyTo($contact->getEmail())
                 ->htmlTemplate('emails/contact.html.twig')
                 ->context([
                  'contact' => $contact
            ]);

          $this->mailer->send($email);
    }
}

