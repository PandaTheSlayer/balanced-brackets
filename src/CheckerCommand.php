<?php


namespace BracketsChecker;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckerCommand extends Command
{

    private $checker;

    public function __construct(Checker $checker)
    {
        parent::__construct();

        $this->checker = $checker;
    }

    protected function configure()
    {
        $this->setName('check-seq')
             ->setDescription('Check if input brackets sequence is balanced')
             ->addArgument('string', InputArgument::REQUIRED, 'Brackets sequence')
        ;

    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $c = $this->checker;
        $c->set_str($input->getArgument('string'));

        if($c->check())
            $output->writeln('Sequence is balanced!');
        else
            $output->writeln('Sequence is not balanced!');
    }
}
