<?php

namespace Prince\Productattach\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Prince\Productattach\Helper\Data;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $tableName = $setup->getTable('prince_productattach');
        if (!$setup->getConnection()->tableColumnExists($tableName, 'storage_type')) {
            $setup->getConnection()
                ->addColumn(
                    $tableName,
                    'storage_type',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => false,
                        'default' => Data::STORAGE_TYPE_AWS_S3,
                        'comment' => 'Storage Type'
                    ]
                );
        }

        $setup->endSetup();
    }
}