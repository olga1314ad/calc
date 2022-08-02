<?php

namespace App\Controller;

use App\Notification\ResultNotification;
use App\Services\Calculator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private MessageBusInterface $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    #[Route('/', name: 'calculator')]
    public function index(Request $request): Response
    {
        $number1 = $request->request->get('number1');
        $number2 = $request->request->get('number2');
        $result ='';

        if($request->request->get('submit')){
            $operation_class = "App\Services\\".ucfirst($request->request->get('operation'));

            if(class_exists($operation_class)){
                $calculator = new Calculator( new $operation_class);
                $calculator->calculate($number1, $number2);
                $result = $calculator->getResult();

                $this->messageBus->dispatch(new ResultNotification($result));
            }
            else{
                 $result='Что-то пошло не так...';
            }
        }

        return $this->render('calculator/index.twig',[
              'number1' => $number1,
              'number2' => $number2,
              'result' =>  $result
        ]);
    }
}
