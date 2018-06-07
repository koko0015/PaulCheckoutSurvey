
<?php

/**
 * Class Shopware_Controllers_Frontend_Paulajax
 */
class Shopware_Controllers_Frontend_Paulajax extends Enlight_Controller_Action
{

    public function preDispatch()
    {
        if(in_array($this->Request()->getActionName(), array('index','savecheckoutsurvey'))) {
            $this->container->get('front')->Plugins()->ViewRenderer()->setNoRender();
        }
    }

    public function indexAction(){
        //Diese Action soll kein Template laden, sondern direkt Json formatierte Daten zurückgeben
        echo 'Index Action';
    }

    public function savecheckoutsurveyAction(){

        $formData = $this->Request()->getPost();

        $orderSurveyAnswer = $formData['answer'];

        Shopware()->Session()->paul_survey_answer = '';
        Shopware()->Session()->paul_survey_answer = $orderSurveyAnswer;
    }

}