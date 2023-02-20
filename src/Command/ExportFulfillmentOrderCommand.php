<?php

namespace App\Command;

use App\Service\ExportFulfillmentOrder;
use App\Service\InsertProducts;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExportFulfillmentOrderCommand extends Command
{
    public function __construct(
        private ExportFulfillmentOrder $fulfillmentOrder
    )
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName("export:fulfillment-order");
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->fulfillmentOrder->fulfillOrders();

        return 0;
    }

}