<?php declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;

require __DIR__ . '/vendor/autoload.php';

class App extends Symfony\Component\Console\Application
{

    public function __construct(iterable $commands)
    {
        foreach ($commands as $command) {
            $this->add($command);
        }

        parent::__construct();
    }
}

$container = new ContainerBuilder();
$loader    = new YamlFileLoader($container, new FileLocator(__DIR__ . '/config'));

$loader->load('services.yaml');
$container->compile();

$app = $container->get(App::class);
$app->run();
