<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateUserCommand extends Command
{
    private $entityManagerInterface;
    private $encoder;
    protected static $defaultName = "app:create-user";

    public function __construct(
        EntityManagerInterface $entityManagerInterface,
        UserPasswordHasherInterface $encoder
    )
    {
        $this->entityManagerInterface = $entityManagerInterface;
        $this->encoder = $encoder;
        parent::__construct();
    }
    protected function configure():void
    {
        $this->addArgument('username', InputArgument::REQUIRED, 'the username of the user.')
             ->addArgument('password', InputArgument::REQUIRED, 'the password of the user.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
            $user = new User();

            $user->setEmail($input->getArgument('username'));

            $password = $this->encoder->hashPassword($user, $input->getArgument('password'));
            $user->setPassword($password);

            $user->setRoles(['ROLE_ADMIN']);

            dump($user);

            $this->entityManagerInterface->persist($user);
            $this->entityManagerInterface->flush();

            return Command::SUCCESS;
    }
    

}