<?php
namespace application\controllers;
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends \CController
{


    /**
     * @var \Logger
     */
    protected $logger;

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();

	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function __construct($id, $module = null)
    {
        parent::__construct($id, $module);

        $this->logger = \Logger::getLogger(get_class());
    }


    public function isLoggedIn() {
        return \Yii::app()->user->id !== null;
    }

    /**
     * @param \CFilterChain $filterChain
     */
    public function filterLoggedIn($filterChain) {
        if (!$this->isLoggedIn()) {
            $this->redirect(array("account/login", "redirect" => \Yii::app()->urlManager->createUrl($this->route, $this->actionParams)));
        } else {
            $filterChain->run();
        }
    }


    /**
     * @param \CFilterChain $filterChain
     */
    public function filterTiming($filterChain) {
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $start = $time;

        $filterChain->run();

        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $finish = $time;
        $total_time = round(($finish - $start), 4);

        $this->logger->info("timing - ".$this->route.' : '.$total_time.' seconds.');
    }


    public function filters()
    {
        return array(
            'timing',
        );
    }


}