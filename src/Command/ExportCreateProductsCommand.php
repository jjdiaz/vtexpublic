<?php

namespace App\Command;

use App\Service\ExportCreateProduct;
use App\Service\ExportFulfillmentOrder;
use App\Service\InsertProducts;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExportCreateProductsCommand extends Command
{
    public function __construct(
        private ExportCreateProduct $createProduct
    )
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName("export:create:product")
            ->addArgument('test_argument',InputArgument::OPTIONAL,'Test Argument');

    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $argument = $input->getArgument('test_argument');
        $this->createProduct->createProducts();

        return Command::SUCCESS;
    }

}