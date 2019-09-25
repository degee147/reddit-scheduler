<?php
namespace App\Controller\Component;

use App\Utility\Custom;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Custom component
 */
class CustomComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public $components = ['Flash', 'Auth'];
    public $customUtil; //for use with custom utility

    
    
    public function cakeTime($time)
    {
        $time = new Time($time);
        return $time->timeAgoInwords();
    }

    public function escapeString($str)
    {
        $conn = \Cake\Datasource\ConnectionManager::get('default')->config();
        $mysqli = new \mysqli($conn['host'], $conn['username'], $conn['password'], $conn['database']);
        $search_term = mysqli_real_escape_string($mysqli, $str);

        return $search_term;
    }


    public function initialize(array $config)
    {
        $this->customUtil = new Custom();

        $this->Users = TableRegistry::get('Users');

    }
}
