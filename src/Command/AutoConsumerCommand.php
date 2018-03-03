<?php

namespace App\Command;

use App\Processor\ProcessorRunner;
use App\Repository\FeedRepository;
use Doctrine\ORM\EntityManagerInterface;
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
     * @var Processor
     */
    protected $processorRunner;

    protected $feedRepository;

    protected function configure()
    {
        $this->setDescription('Consumer command for feeds');
    }

    public function __construct(EntityManagerInterface $em, ProcessorRunner $processorRunner, FeedRepository $feedRepository)
    {
        $this->em = $em;
        $this->processorRunner = $processorRunner;
        $this->feedRepository = $feedRepository;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $feeds = $this->feedRepository->findAll();

        foreach ($feeds as $feed) {
            $this->processorRunner->processFeed($feed);
        }

        $io->success('Finished Runner');
    }
}
