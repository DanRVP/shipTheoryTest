<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;

class ResultsTable extends Table
{
    public function initialize(array $config) : void
    {
        //allows a timestamp for created and modify
        $this->addBehavior('Timestamp');
    }

    //This function should create a dynamic slug based on the name of the user (does not account for duplicates)
    public function beforeSave($event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedFName = Text::slug($entity->first_name);
            $sluggedSName = Text::slug($entity->surname);
            $sluggedName = $sluggedFName.'-'.$sluggedSName;
            $entity->slug = substr($sluggedName, 0, 191);
        }
    }
}
