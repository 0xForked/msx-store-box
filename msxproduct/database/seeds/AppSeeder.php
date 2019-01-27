<?php


use Phinx\Seed\AbstractSeed;

class AppSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * Default category data level root
     *
     */
    public function run()
    {
        $categories_seed = [
            [
                'title' => 'uncategory',
                'slug' => 'uncategory',
                'desc' => 'uncategory'
            ]
        ];

        $category = $this->table('categories');
        $category->insert($categories_seed)
             ->save();

    }
}
