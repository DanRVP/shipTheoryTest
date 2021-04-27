<?php


namespace App\Controller;


class ResultsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        //Uses cakephp paginator to load a view based on the index.php template and display data
        $results = $this->Paginator->paginate($this->Results->find()->order(['created' => 'DESC']));
        $this->set(compact('results'));
    }

    public function add(){
        //create a new entity
        $result = $this->Results->newEmptyEntity();
        //Check that it is a post request method
        if ($this->request->is('post')){
            //grab data from form and patch it onto the empty entity
            $result = $this->Results->patchEntity($result, $this->request->getData());
            //grab the client IP address (currently outputs '::1' on my machine. Not sure why, would need to look into it)
            $ip = $this->request->clientIp();
            //set the IP address in the database
            $result->ip_address = $ip;
            //save this entity to the database
            if ($this->Results->save($result)){
                //display if successfully saved
                $this->Flash->success("Result Saved");
            } else {
                $this->Flash->error("Unable to save the result");
            }
        }
        $this->set('result', $result);
    }
}
