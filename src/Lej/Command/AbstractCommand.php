<?php

declare(strict_types=1);

namespace Lej\Command;

use Symfony\Component\Console\Command\Command;

abstract class AbstractCommand extends Command
{
    /**
     * @param string $domain
     * @param string $context
     * @return string
     */
    protected function modelPath(string $domain, string $context) : string
    {
        return sprintf('src/%s/%s/Domain/Model', $domain, $context);
    }

    /**
     * @param string $domain
     * @param string $context
     * @return string
     */
    protected function modelNamespace(string $domain, string $context) : string
    {
        return sprintf('%s\%s\Domain\Model', $domain, $context);
    }

    /**
     * @return \Twig_Environment
     */
    protected function twig() : \Twig_Environment
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../Resources/Template');
        $twig = new \Twig_Environment($loader);

        return $twig;
    }
}
