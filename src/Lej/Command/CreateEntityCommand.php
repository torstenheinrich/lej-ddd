<?php

declare(strict_types=1);

namespace Lej\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateEntityCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('lej-ddd:create-entity')
            ->setDescription('Creates an entity.')
            ->addArgument('domain', InputArgument::REQUIRED, 'The name of the domain.')
            ->addArgument('context', InputArgument::REQUIRED, 'The name of the context.')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the entity.');
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

        $entityClassName = $input->getArgument('name');
        $idClassName = $entityClassName . 'Id';

        $entity = $twig->render('entity.php.twig', [
            'namespace' => $namespace,
            'entityClassName' => $entityClassName,
            'idClassName' => $idClassName
        ]);

        $id = $twig->render('uuid_id.php.twig', [
            'namespace' => $namespace,
            'idClassName' => $idClassName
        ]);

        file_put_contents($path . '/' . $entityClassName . '.php', $entity);
        file_put_contents($path . '/' . $idClassName . '.php', $id);
    }
}
