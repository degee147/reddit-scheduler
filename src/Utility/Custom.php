<?php

namespace App\Utility;

use App\Controller\Component\CustomComponent; //we're just using this so we can load model
// use App\Controller\AppController; //we're just using this so we can load model
use Cake\Console\Shell;
use Cake\Controller\ComponentRegistry;

// <- resides in your app's src/Controller/Component folder

//use Goutte\Client;
//use Symfony\Component\DomCrawler\Crawler;
//use GuzzleHttp\Psr7;
//use GuzzleHttp\Exception\RequestException;

class Custom extends Shell
// class Custom extends Component
// class Custom  extends AppController

{
    public $CustomComp;
    //public $components = ['Flash', 'Auth', 'Notify', 'Email'];

    public function initialize()
    {
        $this->CustomComp = new CustomComponent(new ComponentRegistry());
    }
    
}
