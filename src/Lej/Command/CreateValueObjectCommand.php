<?php

declare(strict_types=1);

namespace Lej\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateValueObjectCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('lej-ddd:create-value-object')
            ->setDescription('Creates a value object.')
            ->addArgument('domain', InputArgument::REQUIRED, 'The name of the domain.')
            ->addArgument('context', InputArgument::REQUIRED, 'The name of the context.')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the value object.');
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

        $objectClassName = $input->getArgument('name');

        $object = $twig->render('value_object.php.twig', [
            'namespace' => $namespace,
            'objectClassName' => $objectClassName
        ]);

        file_put_contents($path . '/' . $objectClassName . '.php', $object);
    }
}
