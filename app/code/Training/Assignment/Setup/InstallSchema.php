<?php

namespace Training\Assignment\Setup;

use \Magento\Framework\Setup\InstallSchemaInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\DB\Ddl\Table;

/**
 * Class InstallSchema
 *
 * @package Training\Assignment\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Install Articles table
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $tableName = $setup->getTable('custom_product_review');

        if ($setup->getConnection()->isTableExists($tableName) != true) {
            $table = $setup->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'user_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['nullable' => false],
                    'User Id'
                )
                ->addColumn(
                    'product_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['nullable' => false],
                    'Product Id'
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Name'
                )
                ->addColumn(
                    'email',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Email'
                )
                ->addColumn(
                    'phone',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Phone'
                )
                ->addColumn(
                    'product_description',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Product Description'
                )
                ->addColumn(
                    'product_rating',
                    Table::TYPE_INTEGER,
                    null,
                    ['nullable' => false],
                    'Product Rating'
                )
                ->addColumn(
                    'status',
                    Table::TYPE_INTEGER,
                    10,
                    ['nullable' => false],
                    'Status'
                )
                ->addColumn(
                    'created_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                    'Created At'
                )
                ->addColumn(
                    'updated_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                    'Updated At'
                )
                ->setComment('Training - Product Table');
            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}