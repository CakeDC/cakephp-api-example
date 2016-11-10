<?php
use Cake\Filesystem\File;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class SampleUsersSeed extends AbstractSeed
{

    /**
     * {@inheritDoc}
     */
    public function run()
    {
        $this->Users = TableRegistry::get('CakeDC/Users.Users');
        // debug($this->Users->find()->toArray());exit;
        
        $user = [
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'password',
            'first_name' => 'super',
            'last_name' => 'admin',
            'token' => 'e028878364b54c178f01f5af17820abb',
            'token_expires' => '2030-01-01',
            'api_token' => '11111',
            'activation_date' => null,
            'tos_date' => '2016-11-01',
            'active' => true,
            'is_superuser' => false,
            'role' => 'user',        
        ];

        $this->Users->save($this->Users->newEntity($user));
    }    
}
