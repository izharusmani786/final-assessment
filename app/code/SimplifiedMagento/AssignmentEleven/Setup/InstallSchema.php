<?php

namespace SimplifiedMagento\AssignmentEleven\Setup;

use \Magento\Framework\Setup\InstallSchemaInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\DB\Ddl\Table;

/**
 * Class InstallSchema
 *
 * @package Thecoachsmb\Mymodule\Setup
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

        $tableName = $setup->getTable('assignmentfinal_affiliate_member');

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
                    'plan_name',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Plan Name'
                )
                ->addColumn(
                    'plan_description',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Plan Description'
                )
                ->addColumn(
                    'plan_image',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Plan Image'
                )
                ->addColumn(
                    'plan_type',
                    Table::TYPE_INTEGER,
                    10,
                    ['nullable' => false],
                    'Plan Type'
                )
                ->addColumn(
                    'created_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                    'Created At'
                )
                ->setComment('Thecoachsmb - Article');
            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}