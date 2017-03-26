<?php

declare(strict_types=1);

namespace Lej\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateDomainEventCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('lej-ddd:create-domain-event')
            ->setDescription('Creates a domain event.')
            ->addArgument('domain', InputArgument::REQUIRED, 'The name of the domain.')
            ->addArgument('context', InputArgument::REQUIRED, 'The name of the context.')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the domain event.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $twig = $this->twig();

        $path = $this->modelPath($input->getArgument('domain'), $input->getArgument('context'));
        $namespace = $this->modelNamespace($input->getArgument('domain'), $input->getArgument('context'));
        @mkdir($path, 0755, true);

        $eventClassName = $input->getArgument('name');

        $event = $twig->render('domain_event.php.twig', [
            'namespace' => $namespace,
            'eventClassName' => $eventClassName
        ]);

        file_put_contents($path . '/' . $eventClassName . '.php', $event);
    }
}
