<?php

namespace App\Command;

use App\Entity\FourSquareLocation;
use App\Entity\Location;
use App\Entity\TimeoutLocation;
use App\Processor\ProcessorRunner;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AutoConsumerCommand extends Command
{
    protected static $defaultName = 'app:auto-consume';

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var ProcessorRunner
     */
    protected $processorRunner;

    protected function configure()
    {
        $this->setDescription('Auto runner for feeds');
    }

    public function __construct(EntityManagerInterface $em, ProcessorRunner $processorRunner)
    {
        $this->em = $em;
        $this->processorRunner = $processorRunner;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $this->processorRunner->execute();
        $io->success('Finished Runner');
    }
}
