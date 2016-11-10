<?php
use Cake\Filesystem\File;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use Migrations\AbstractSeed;

/**
 * Blogs seed.
 */
class SampleBlogsSeed extends AbstractSeed
{

	public $topics = ["blog", "journal", "area"];
	public $names = ["Alex", "Fred", "Bill", "Liz", "Nik", "Jane"];
	public $surnames = ["Smith", "N.", "B.", "L."];

    /**
     * {@inheritDoc}
     */
    public function run()
    {
        $this->Blogs = TableRegistry::get('Blogs');
		
		$records = [];
		for ($i = 1; $i <= 30; $i++) {
			$name = $this->_getRand($this->names);
			$name .= ' ' . $this->_getRand($this->surnames);
			$name .= "'s " . $this->_getRand($this->topics);
			$description = '';
			$records[] = compact('name', 'description');
		}
		
        $this->Blogs->saveMany($this->Blogs->newEntities($records));
    }
	
	protected function _getRand($array) {
		return $array[rand(0, count($array) - 1)];
	}
}
