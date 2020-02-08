<?php
declare(strict_types=1);

 

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use tennisClub\Court;

class CourtController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        //
    }

    /**
     * Searches for court
     */
    public function searchAction()
    {
        $numberPage = $this->request->getQuery('page', 'int', 1);
        $parameters = Criteria::fromInput($this->di, '\tennisClub\Court', $_GET)->getParams();
        $parameters['order'] = "id";

        $court = Court::find($parameters);
        if (count($court) == 0) {
            $this->flash->notice("The search did not find any court");

            $this->dispatcher->forward([
                "controller" => "court",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $court,
            'limit'=> 10,
            'page' => $numberPage,
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {
        //
    }

    /**
     * Edits a court
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {
            $court = Court::findFirstByid($id);
            if (!$court) {
                $this->flash->error("court was not found");

                $this->dispatcher->forward([
                    'controller' => "court",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id = $court->getId();

            $this->tag->setDefault("id", $court->getId());
            $this->tag->setDefault("surface", $court->getSurface());
            $this->tag->setDefault("floodlights", $court->getFloodlights());
            $this->tag->setDefault("indoor", $court->getIndoor());
            
        }
    }

    /**
     * Creates a new court
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "court",
                'action' => 'index'
            ]);

            return;
        }

        $court = new Court();
        $court->setsurface($this->request->getPost("surface", "int"));
        $court->setfloodlights($this->request->getPost("floodlights", "int"));
        $court->setindoor($this->request->getPost("indoor", "int"));
        

        if (!$court->save()) {
            foreach ($court->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "court",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("court was created successfully");

        $this->dispatcher->forward([
            'controller' => "court",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a court edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "court",
                'action' => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost("id");
        $court = Court::findFirstByid($id);

        if (!$court) {
            $this->flash->error("court does not exist " . $id);

            $this->dispatcher->forward([
                'controller' => "court",
                'action' => 'index'
            ]);

            return;
        }

        $court->setsurface($this->request->getPost("surface", "int"));
        $court->setfloodlights($this->request->getPost("floodlights", "int"));
        $court->setindoor($this->request->getPost("indoor", "int"));
        

        if (!$court->save()) {

            foreach ($court->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "court",
                'action' => 'edit',
                'params' => [$court->getId()]
            ]);

            return;
        }

        $this->flash->success("court was updated successfully");

        $this->dispatcher->forward([
            'controller' => "court",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a court
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $court = Court::findFirstByid($id);
        if (!$court) {
            $this->flash->error("court was not found");

            $this->dispatcher->forward([
                'controller' => "court",
                'action' => 'index'
            ]);

            return;
        }

        if (!$court->delete()) {

            foreach ($court->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "court",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("court was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "court",
            'action' => "index"
        ]);
    }
}
