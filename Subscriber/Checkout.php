<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 12.04.18
 * Time: 10:11
 */
namespace PaulCheckoutSurvey\Subscriber;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Enlight\Event\SubscriberInterface;


class Checkout implements SubscriberInterface
{
    /** @var  ContainerInterface */
    private $container;

    /**
     * Frontend contructor.
     * @param ContainerInterface $container
     **/
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Get the subscribed events.
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatch_Frontend_Checkout' => 'postDispatchCheckout',
            'Shopware_Modules_Order_SendMail_BeforeSend' => 'saveOrderFilterParams'
        ];
    }


    /**
     *
     * @param \Enlight_Event_EventArgs $args
     *
     * @Enlight\Event Enlight_Controller_Action_PreDispatch_Frontend_Checkout
     */
    public function postDispatchCheckout(\Enlight_Event_EventArgs $args)
    {
        /** @var $controller \Enlight_Controller_Action */
        $controller = $args->getSubject();
        $request = $controller->Request();

        $session = Shopware()->Session();

        $paul_survey_answer = $request->getParam('CheckoutSurveyAnswer');
        $session->paul_survey_answer = $paul_survey_answer;

    }


    /**
     *
     * @param \Enlight_Event_EventArgs $args
     *
     * @Enlight\Event Shopware_Modules_Order_SaveOrder_FilterParams
     */
    public function saveOrderFilterParams(\Enlight_Event_EventArgs $args)
    {
        $session = $this->container->get('session');
        $order = $args->getSubject();

        $order->orderAttributes['paul_order_survey'] = $session->get('paul_survey_answer');

    }
}
