<?php
use Cake\Filesystem\File;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use Migrations\AbstractSeed;

/**
 * Posts seed.
 */
class SamplePostsSeed extends AbstractSeed
{

	public $topic1 = ["first", "initial", "brief", "detailed"];
	public $topic2 = ["review", "survey", "post", "intro", "article"];
    public $topic3 = ["fishing", "cakephp", "php", "jaascript", "walking", "swimming"]; 

    /**
     * {@inheritDoc}
     */
    public function run()
    {
        $this->Posts = TableRegistry::get('Posts');
        
        $records = [];
        for ($i = 1; $i <= 100; $i++) {
            $name = $this->_getRand($this->topic1);
            $name .= ' ' . $this->_getRand($this->topic2);
            $name .= " about " . $this->_getRand($this->topic3);
            $description = '';
            $blog_id = rand(1, 30);
            $records[] = compact('name', 'description', 'blog_id');
        }
        
        $this->Posts->saveMany($this->Posts->newEntities($records));
    }
    
    protected function _getRand($array) {
        return $array[rand(0, count($array) - 1)];
    }
}
