<?php declare(strict_types=1);

namespace App;

use App\Reverser;
use Symfony\Component\Console;

class FooCommand extends Console\Command\Command
{

    private Reverser $reverser;
    protected static $defaultName = 'foo';

    public function __construct(Reverser $reverser)
    {
        $this->reverser = $reverser;
        parent::__construct(self::$defaultName);
    }

    protected function execute(Console\Input\InputInterface $input, Console\Output\OutputInterface $output): int
    {
        $output->writeln('Foo was invoked');
        $output->writeln($this->reverser->exec('the lazy fox'));

        return self::SUCCESS;
    }
}
