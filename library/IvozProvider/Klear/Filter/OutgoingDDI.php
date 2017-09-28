<?php
class IvozProvider_Klear_Filter_OutgoingDDI implements KlearMatrix_Model_Field_Select_Filter_Interface
{
    protected $_condition = array();

    public function setRouteDispatcher(KlearMatrix_Model_RouteDispatcher $routeDispatcher)
    {
        // Get current object id
        $currentScreen = $routeDispatcher->getCurrentItemName();
        $pk = $routeDispatcher->getParam("pk", false);

        // Only display DDIs belonging to edited company
        if (is_array($pk)) {
            //Avoid multiple choice error on klear
            $this->_condition = ["1=2"];
            return true;
        }

        $this->_condition = [
            'self::company = :pk',
            ['pk' => $pk ? $pk  : '']
        ];

        return true;
    }

    public function getCondition()
    {
        return $this->_condition;
    }
}
