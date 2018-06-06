
<?php
/**
 * This is a standard Controller Class.
 * This class provides advanced functions for the plugin
 *
 * @copyright Copyright (c) 2011, Shopware AG
 * @author $Author$
 * @package Shopware
 * @subpackage Controllers_Frontend
 * @creation_date 24.11.11 15:30
 * @version $Id$
 */
class Shopware_Controllers_Frontend_Paulajax extends Enlight_Controller_Action
{
    /**
     * Disable template renderer for not given actions
     * @return void
     */
    public function preDispatch()
    {
        if(in_array($this->Request()->getActionName(), array('index','savecheckoutsurvey'))) {
            $this->container->get('front')->Plugins()->ViewRenderer()->setNoRender();
        }
    }

    /**
     * index action is called if no other action is triggered
     * @return void
     */
    public function indexAction(){
        //Diese Action soll kein Template laden, sondern direkt Json formatierte Daten zurückgeben
        echo 'Index Action';
    }

    /**
     * own action which prints the request variable bar if exist
     * @return void
     */
    public function savecheckoutsurveyAction(){

        $formData = $this->Request()->getPost();

        $orderSurveyAnswer = $formData['answer'];

        Shopware()->Session()->paul_survey_answer = '';
        Shopware()->Session()->paul_survey_answer = $orderSurveyAnswer;

        exit;

    }

}