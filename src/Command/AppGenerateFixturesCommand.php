<?php

namespace App\Command;

use App\Entity\Feed;
use App\Entity\TimeoutLocation;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AppGenerateFixturesCommand extends Command
{
    protected static $defaultName = 'app:generate-fixture';

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    protected function configure()
    {
        $this->setDescription('Generates fixture to test db mapping functionality');
    }

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

//        $testLocation = new TimeoutLocation();
//        $testLocation->setName('Test Entity');
//        $testLocation->setLocationName('Birmingham');
//        $testLocation->setCreated(new \DateTime());
//        $testLocation->setUpdated(new \DateTime());

        $this->addTestFixtureFeeds();

//        try {
//            $this->em->persist($testLocation);
//            $this->em->flush();
//        } catch (ORMException $e) {
//            $io->error('Failed to persist test object with error: '. $e);
//            return;
//        }

        $io->success('Finished Command');
    }

    protected function addTestFixtureFeeds(): void
    {
        foreach ($this->returnTestFeedsConfig() as $feedFixture) {
            $feedEntity = new Feed();
            $feedEntity->setLocationName($feedFixture['locationName']);
            $feedEntity->setLocationApiString($feedFixture['locationApiString']);
            $feedEntity->setProvider($feedFixture['provider']);
            $this->em->persist($feedEntity);
        }
        $this->em->flush();
    }

    private function returnTestFeedsConfig(): array
    {
        return [
            [
                'locationName' => 'London',
                'locationApiString' => 'uk-london',
                'provider' => 'fsq'
            ],
            [
                'locationName' => 'London',
                'locationApiString' => 'uk-london',
                'provider' => 'via'
            ],
            [
                'locationName' => 'London',
                'locationApiString' => 'london-uk',
                'provider' => 'timeout'
            ],
            [
                'locationName' => 'New York',
                'locationApiString' => 'usa-nycny',
                'provider' => 'fsq'
            ],
            [
                'locationName' => 'New York',
                'locationApiString' => 'usa-nycny',
                'provider' => 'via'
            ],
            [
                'locationName' => 'New York',
                'locationApiString' => 'new-york-ny-usa',
                'provider' => 'timeout'
            ],
        ];
    }
}
