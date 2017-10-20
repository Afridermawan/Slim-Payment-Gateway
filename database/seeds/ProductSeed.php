<?php

use Phinx\Seed\AbstractSeed;

class ProductSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data[] = [
            'name'  => 'Product1',
            'price' => 12000,
        ];

        $data[] = [
            'name'  => 'Product2',
            'price' => 13000,
        ];

        $data[] = [
            'name'  => 'Product3',
            'price' => 12000,
        ];
        $this->insert('products', $data);
    }
}
