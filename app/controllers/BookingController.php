<?php
declare(strict_types=1);

 

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use tennisClub\Booking;

class BookingController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        //
    }

    /**
     * Searches for booking
     */
    public function searchAction()
    {
        $numberPage = $this->request->getQuery('page', 'int', 1);
        $parameters = Criteria::fromInput($this->di, '\tennisClub\Booking', $_GET)->getParams();
        $parameters['order'] = "id";

        $booking = Booking::find($parameters);
        if (count($booking) == 0) {
            $this->flash->notice("The search did not find any booking");

            $this->dispatcher->forward([
                "controller" => "booking",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $booking,
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
     * Edits a booking
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {
            $booking = Booking::findFirstByid($id);
            if (!$booking) {
                $this->flash->error("booking was not found");

                $this->dispatcher->forward([
                    'controller' => "booking",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id = $booking->getId();

            $this->tag->setDefault("id", $booking->getId());
            $this->tag->setDefault("bookingdate", $booking->getBookingdate());
            $this->tag->setDefault("starttime", $booking->getStarttime());
            $this->tag->setDefault("endtime", $booking->getEndtime());
            $this->tag->setDefault("memberid", $booking->getMemberid());
            $this->tag->setDefault("courtid", $booking->getCourtid());
            $this->tag->setDefault("fee", $booking->getFee());
            
        }
    }

    /**
     * Creates a new booking
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "booking",
                'action' => 'index'
            ]);

            return;
        }

        $booking = new Booking();
        $booking->setbookingdate($this->request->getPost("bookingdate", "int"));
        $booking->setstarttime($this->request->getPost("starttime", "int"));
        $booking->setendtime($this->request->getPost("endtime", "int"));
        $booking->setmemberid($this->request->getPost("memberid", "int"));
        $booking->setcourtid($this->request->getPost("courtid", "int"));
        $booking->setfee($this->request->getPost("fee", "int"));
        

        if (!$booking->save()) {
            foreach ($booking->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "booking",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("booking was created successfully");

        $this->dispatcher->forward([
            'controller' => "booking",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a booking edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "booking",
                'action' => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost("id");
        $booking = Booking::findFirstByid($id);

        if (!$booking) {
            $this->flash->error("booking does not exist " . $id);

            $this->dispatcher->forward([
                'controller' => "booking",
                'action' => 'index'
            ]);

            return;
        }

        $booking->setbookingdate($this->request->getPost("bookingdate", "int"));
        $booking->setstarttime($this->request->getPost("starttime", "int"));
        $booking->setendtime($this->request->getPost("endtime", "int"));
        $booking->setmemberid($this->request->getPost("memberid", "int"));
        $booking->setcourtid($this->request->getPost("courtid", "int"));
        $booking->setfee($this->request->getPost("fee", "int"));
        

        if (!$booking->save()) {

            foreach ($booking->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "booking",
                'action' => 'edit',
                'params' => [$booking->getId()]
            ]);

            return;
        }

        $this->flash->success("booking was updated successfully");

        $this->dispatcher->forward([
            'controller' => "booking",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a booking
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $booking = Booking::findFirstByid($id);
        if (!$booking) {
            $this->flash->error("booking was not found");

            $this->dispatcher->forward([
                'controller' => "booking",
                'action' => 'index'
            ]);

            return;
        }

        if (!$booking->delete()) {

            foreach ($booking->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "booking",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("booking was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "booking",
            'action' => "index"
        ]);
    }
}
