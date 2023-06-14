<?php

namespace App\Command;

use App\Service\ExportCreateProduct;
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
            ->addArgument('vtex_account_name',InputArgument::OPTIONAL,'Account Name')
            ->addArgument('vtex_app_key',InputArgument::OPTIONAL,'Api Key')
            ->addArgument('vtex_app_token',InputArgument::OPTIONAL,'App Token');
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->createProduct->createProducts();

        return Command::SUCCESS;
    }

}