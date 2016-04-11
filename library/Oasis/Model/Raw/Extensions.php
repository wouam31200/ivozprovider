<?php

/**
 * Application Model
 *
 * @package Oasis\Model\Raw
 * @subpackage Model
 * @author Luis Felipe Garcia
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * [entity]
 *
 * @package Oasis\Model
 * @subpackage Model
 * @author Luis Felipe Garcia
 */

namespace Oasis\Model\Raw;
class Extensions extends ModelAbstract
{

    protected $_routeTypeAcceptedValues = array(
        'user',
        'IVRCommon',
        'IVRCustom',
        'huntGroup',
    );

    /**
     * [uuid:php]
     * Database var type binary(36)
     *
     * @var binary
     */
    protected $_id;

    /**
     * Database var type binary(36)
     *
     * @var binary
     */
    protected $_companyId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_number;

    /**
     * [enum:user|IVRCommon|IVRCustom|huntGroup]
     * Database var type varchar
     *
     * @var string
     */
    protected $_routeType;

    /**
     * Database var type binary(36)
     *
     * @var binary
     */
    protected $_IVRCommonId;

    /**
     * Database var type binary(36)
     *
     * @var binary
     */
    protected $_IVRCustomId;

    /**
     * Database var type binary(36)
     *
     * @var binary
     */
    protected $_huntGroupId;


    /**
     * Parent relation Extensions_ibfk_4
     *
     * @var \Oasis\Model\Raw\HuntGroups
     */
    protected $_HuntGroup;

    /**
     * Parent relation Extensions_ibfk_1
     *
     * @var \Oasis\Model\Raw\Companies
     */
    protected $_Company;

    /**
     * Parent relation Extensions_ibfk_2
     *
     * @var \Oasis\Model\Raw\IVRCommon
     */
    protected $_IVRCommon;

    /**
     * Parent relation Extensions_ibfk_3
     *
     * @var \Oasis\Model\Raw\IVRCustom
     */
    protected $_IVRCustom;


    /**
     * Dependent relation CallForwardSettings_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Oasis\Model\Raw\CallForwardSettings[]
     */
    protected $_CallForwardSettings;

    /**
     * Dependent relation ExternalCallFilters_ibfk_5
     * Type: One-to-Many relationship
     *
     * @var \Oasis\Model\Raw\ExternalCallFilters[]
     */
    protected $_ExternalCallFiltersByHolidayExtension;

    /**
     * Dependent relation ExternalCallFilters_ibfk_6
     * Type: One-to-Many relationship
     *
     * @var \Oasis\Model\Raw\ExternalCallFilters[]
     */
    protected $_ExternalCallFiltersByOutOfScheduleExtension;

    /**
     * Dependent relation HuntGroupCallForwardSettings_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Oasis\Model\Raw\HuntGroupCallForwardSettings[]
     */
    protected $_HuntGroupCallForwardSettings;

    /**
     * Dependent relation IVRCommon_ibfk_6
     * Type: One-to-Many relationship
     *
     * @var \Oasis\Model\Raw\IVRCommon[]
     */
    protected $_IVRCommonByTimeoutExtension;

    /**
     * Dependent relation IVRCommon_ibfk_7
     * Type: One-to-Many relationship
     *
     * @var \Oasis\Model\Raw\IVRCommon[]
     */
    protected $_IVRCommonByErrorExtension;

    /**
     * Dependent relation IVRCustom_ibfk_6
     * Type: One-to-Many relationship
     *
     * @var \Oasis\Model\Raw\IVRCustom[]
     */
    protected $_IVRCustomByTimeoutExtension;

    /**
     * Dependent relation IVRCustom_ibfk_7
     * Type: One-to-Many relationship
     *
     * @var \Oasis\Model\Raw\IVRCustom[]
     */
    protected $_IVRCustomByErrorExtension;

    /**
     * Dependent relation IVRCustomEntries_ibfk_3
     * Type: One-to-Many relationship
     *
     * @var \Oasis\Model\Raw\IVRCustomEntries[]
     */
    protected $_IVRCustomEntries;

    /**
     * Dependent relation Users_ibfk_7
     * Type: One-to-Many relationship
     *
     * @var \Oasis\Model\Raw\Users[]
     */
    protected $_Users;

    protected $_columnsList = array(
        'id'=>'id',
        'companyId'=>'companyId',
        'number'=>'number',
        'routeType'=>'routeType',
        'IVRCommonId'=>'IVRCommonId',
        'IVRCustomId'=>'IVRCustomId',
        'huntGroupId'=>'huntGroupId',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'id'=> array('uuid:php'),
            'routeType'=> array('enum:user|IVRCommon|IVRCustom|huntGroup'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'en'));

        $this->setParentList(array(
            'ExtensionsIbfk4'=> array(
                    'property' => 'HuntGroup',
                    'table_name' => 'HuntGroups',
                ),
            'ExtensionsIbfk1'=> array(
                    'property' => 'Company',
                    'table_name' => 'Companies',
                ),
            'ExtensionsIbfk2'=> array(
                    'property' => 'IVRCommon',
                    'table_name' => 'IVRCommon',
                ),
            'ExtensionsIbfk3'=> array(
                    'property' => 'IVRCustom',
                    'table_name' => 'IVRCustom',
                ),
        ));

        $this->setDependentList(array(
            'CallForwardSettingsIbfk2' => array(
                    'property' => 'CallForwardSettings',
                    'table_name' => 'CallForwardSettings',
                ),
            'ExternalCallFiltersIbfk5' => array(
                    'property' => 'ExternalCallFiltersByHolidayExtension',
                    'table_name' => 'ExternalCallFilters',
                ),
            'ExternalCallFiltersIbfk6' => array(
                    'property' => 'ExternalCallFiltersByOutOfScheduleExtension',
                    'table_name' => 'ExternalCallFilters',
                ),
            'HuntGroupCallForwardSettingsIbfk2' => array(
                    'property' => 'HuntGroupCallForwardSettings',
                    'table_name' => 'HuntGroupCallForwardSettings',
                ),
            'IVRCommonIbfk6' => array(
                    'property' => 'IVRCommonByTimeoutExtension',
                    'table_name' => 'IVRCommon',
                ),
            'IVRCommonIbfk7' => array(
                    'property' => 'IVRCommonByErrorExtension',
                    'table_name' => 'IVRCommon',
                ),
            'IVRCustomIbfk6' => array(
                    'property' => 'IVRCustomByTimeoutExtension',
                    'table_name' => 'IVRCustom',
                ),
            'IVRCustomIbfk7' => array(
                    'property' => 'IVRCustomByErrorExtension',
                    'table_name' => 'IVRCustom',
                ),
            'IVRCustomEntriesIbfk3' => array(
                    'property' => 'IVRCustomEntries',
                    'table_name' => 'IVRCustomEntries',
                ),
            'UsersIbfk7' => array(
                    'property' => 'Users',
                    'table_name' => 'Users',
                ),
        ));

        $this->setOnDeleteCascadeRelationships(array(
            'CallForwardSettings_ibfk_2'
        ));



        $this->_defaultValues = array(
        );

        $this->_initFileObjects();
        parent::__construct();
    }

    /**
     * This method is called just after parent's constructor
     */
    public function init()
    {
    }
    /**************************************************************************
    ************************** File System Object (FSO)************************
    ***************************************************************************/

    protected function _initFileObjects()
    {

        return $this;
    }

    public function getFileObjects()
    {

        return array();
    }


    /**************************************************************************
    *********************************** /FSO ***********************************
    ***************************************************************************/

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param binary $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setId($data)
    {

        if ($this->_id != $data) {
            $this->_logChange('id');
        }

        $this->_id = $data;
        return $this;
    }

    /**
     * Gets column id
     *
     * @return binary
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param binary $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setCompanyId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_companyId != $data) {
            $this->_logChange('companyId');
        }

        $this->_companyId = $data;
        return $this;
    }

    /**
     * Gets column companyId
     *
     * @return binary
     */
    public function getCompanyId()
    {
        return $this->_companyId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setNumber($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_number != $data) {
            $this->_logChange('number');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_number = $data;

        } else if (!is_null($data)) {
            $this->_number = (string) $data;

        } else {
            $this->_number = $data;
        }
        return $this;
    }

    /**
     * Gets column number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->_number;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setRouteType($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_routeType != $data) {
            $this->_logChange('routeType');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_routeType = $data;

        } else if (!is_null($data)) {
            if (!in_array($data, $this->_routeTypeAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(_('Invalid value for routeType'));
            }
            $this->_routeType = (string) $data;

        } else {
            $this->_routeType = $data;
        }
        return $this;
    }

    /**
     * Gets column routeType
     *
     * @return string
     */
    public function getRouteType()
    {
        return $this->_routeType;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param binary $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setIVRCommonId($data)
    {

        if ($this->_IVRCommonId != $data) {
            $this->_logChange('IVRCommonId');
        }

        $this->_IVRCommonId = $data;
        return $this;
    }

    /**
     * Gets column IVRCommonId
     *
     * @return binary
     */
    public function getIVRCommonId()
    {
        return $this->_IVRCommonId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param binary $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setIVRCustomId($data)
    {

        if ($this->_IVRCustomId != $data) {
            $this->_logChange('IVRCustomId');
        }

        $this->_IVRCustomId = $data;
        return $this;
    }

    /**
     * Gets column IVRCustomId
     *
     * @return binary
     */
    public function getIVRCustomId()
    {
        return $this->_IVRCustomId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param binary $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setHuntGroupId($data)
    {

        if ($this->_huntGroupId != $data) {
            $this->_logChange('huntGroupId');
        }

        $this->_huntGroupId = $data;
        return $this;
    }

    /**
     * Gets column huntGroupId
     *
     * @return binary
     */
    public function getHuntGroupId()
    {
        return $this->_huntGroupId;
    }

    /**
     * Sets parent relation HuntGroup
     *
     * @param \Oasis\Model\Raw\HuntGroups $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setHuntGroup(\Oasis\Model\Raw\HuntGroups $data)
    {
        $this->_HuntGroup = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setHuntGroupId($primaryKey);
        }

        $this->_setLoaded('ExtensionsIbfk4');
        return $this;
    }

    /**
     * Gets parent HuntGroup
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Oasis\Model\Raw\HuntGroups
     */
    public function getHuntGroup($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'ExtensionsIbfk4';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_HuntGroup = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_HuntGroup;
    }

    /**
     * Sets parent relation Company
     *
     * @param \Oasis\Model\Raw\Companies $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setCompany(\Oasis\Model\Raw\Companies $data)
    {
        $this->_Company = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setCompanyId($primaryKey);
        }

        $this->_setLoaded('ExtensionsIbfk1');
        return $this;
    }

    /**
     * Gets parent Company
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Oasis\Model\Raw\Companies
     */
    public function getCompany($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'ExtensionsIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Company = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Company;
    }

    /**
     * Sets parent relation IVRCommon
     *
     * @param \Oasis\Model\Raw\IVRCommon $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setIVRCommon(\Oasis\Model\Raw\IVRCommon $data)
    {
        $this->_IVRCommon = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setIVRCommonId($primaryKey);
        }

        $this->_setLoaded('ExtensionsIbfk2');
        return $this;
    }

    /**
     * Gets parent IVRCommon
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Oasis\Model\Raw\IVRCommon
     */
    public function getIVRCommon($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'ExtensionsIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_IVRCommon = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_IVRCommon;
    }

    /**
     * Sets parent relation IVRCustom
     *
     * @param \Oasis\Model\Raw\IVRCustom $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setIVRCustom(\Oasis\Model\Raw\IVRCustom $data)
    {
        $this->_IVRCustom = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setIVRCustomId($primaryKey);
        }

        $this->_setLoaded('ExtensionsIbfk3');
        return $this;
    }

    /**
     * Gets parent IVRCustom
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Oasis\Model\Raw\IVRCustom
     */
    public function getIVRCustom($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'ExtensionsIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_IVRCustom = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_IVRCustom;
    }

    /**
     * Sets dependent relations CallForwardSettings_ibfk_2
     *
     * @param array $data An array of \Oasis\Model\Raw\CallForwardSettings
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setCallForwardSettings(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_CallForwardSettings === null) {

                $this->getCallForwardSettings();
            }

            $oldRelations = $this->_CallForwardSettings;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    $pk = $newItem->getPrimaryKey();
                    if (!empty($pk)) {
                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_CallForwardSettings = array();

        foreach ($data as $object) {
            $this->addCallForwardSettings($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations CallForwardSettings_ibfk_2
     *
     * @param \Oasis\Model\Raw\CallForwardSettings $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function addCallForwardSettings(\Oasis\Model\Raw\CallForwardSettings $data)
    {
        $this->_CallForwardSettings[] = $data;
        $this->_setLoaded('CallForwardSettingsIbfk2');
        return $this;
    }

    /**
     * Gets dependent CallForwardSettings_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Oasis\Model\Raw\CallForwardSettings
     */
    public function getCallForwardSettings($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CallForwardSettingsIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_CallForwardSettings = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_CallForwardSettings;
    }

    /**
     * Sets dependent relations ExternalCallFilters_ibfk_5
     *
     * @param array $data An array of \Oasis\Model\Raw\ExternalCallFilters
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setExternalCallFiltersByHolidayExtension(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_ExternalCallFiltersByHolidayExtension === null) {

                $this->getExternalCallFiltersByHolidayExtension();
            }

            $oldRelations = $this->_ExternalCallFiltersByHolidayExtension;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    $pk = $newItem->getPrimaryKey();
                    if (!empty($pk)) {
                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_ExternalCallFiltersByHolidayExtension = array();

        foreach ($data as $object) {
            $this->addExternalCallFiltersByHolidayExtension($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations ExternalCallFilters_ibfk_5
     *
     * @param \Oasis\Model\Raw\ExternalCallFilters $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function addExternalCallFiltersByHolidayExtension(\Oasis\Model\Raw\ExternalCallFilters $data)
    {
        $this->_ExternalCallFiltersByHolidayExtension[] = $data;
        $this->_setLoaded('ExternalCallFiltersIbfk5');
        return $this;
    }

    /**
     * Gets dependent ExternalCallFilters_ibfk_5
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Oasis\Model\Raw\ExternalCallFilters
     */
    public function getExternalCallFiltersByHolidayExtension($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'ExternalCallFiltersIbfk5';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_ExternalCallFiltersByHolidayExtension = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_ExternalCallFiltersByHolidayExtension;
    }

    /**
     * Sets dependent relations ExternalCallFilters_ibfk_6
     *
     * @param array $data An array of \Oasis\Model\Raw\ExternalCallFilters
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setExternalCallFiltersByOutOfScheduleExtension(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_ExternalCallFiltersByOutOfScheduleExtension === null) {

                $this->getExternalCallFiltersByOutOfScheduleExtension();
            }

            $oldRelations = $this->_ExternalCallFiltersByOutOfScheduleExtension;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    $pk = $newItem->getPrimaryKey();
                    if (!empty($pk)) {
                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_ExternalCallFiltersByOutOfScheduleExtension = array();

        foreach ($data as $object) {
            $this->addExternalCallFiltersByOutOfScheduleExtension($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations ExternalCallFilters_ibfk_6
     *
     * @param \Oasis\Model\Raw\ExternalCallFilters $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function addExternalCallFiltersByOutOfScheduleExtension(\Oasis\Model\Raw\ExternalCallFilters $data)
    {
        $this->_ExternalCallFiltersByOutOfScheduleExtension[] = $data;
        $this->_setLoaded('ExternalCallFiltersIbfk6');
        return $this;
    }

    /**
     * Gets dependent ExternalCallFilters_ibfk_6
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Oasis\Model\Raw\ExternalCallFilters
     */
    public function getExternalCallFiltersByOutOfScheduleExtension($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'ExternalCallFiltersIbfk6';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_ExternalCallFiltersByOutOfScheduleExtension = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_ExternalCallFiltersByOutOfScheduleExtension;
    }

    /**
     * Sets dependent relations HuntGroupCallForwardSettings_ibfk_2
     *
     * @param array $data An array of \Oasis\Model\Raw\HuntGroupCallForwardSettings
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setHuntGroupCallForwardSettings(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_HuntGroupCallForwardSettings === null) {

                $this->getHuntGroupCallForwardSettings();
            }

            $oldRelations = $this->_HuntGroupCallForwardSettings;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    $pk = $newItem->getPrimaryKey();
                    if (!empty($pk)) {
                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_HuntGroupCallForwardSettings = array();

        foreach ($data as $object) {
            $this->addHuntGroupCallForwardSettings($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations HuntGroupCallForwardSettings_ibfk_2
     *
     * @param \Oasis\Model\Raw\HuntGroupCallForwardSettings $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function addHuntGroupCallForwardSettings(\Oasis\Model\Raw\HuntGroupCallForwardSettings $data)
    {
        $this->_HuntGroupCallForwardSettings[] = $data;
        $this->_setLoaded('HuntGroupCallForwardSettingsIbfk2');
        return $this;
    }

    /**
     * Gets dependent HuntGroupCallForwardSettings_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Oasis\Model\Raw\HuntGroupCallForwardSettings
     */
    public function getHuntGroupCallForwardSettings($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'HuntGroupCallForwardSettingsIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_HuntGroupCallForwardSettings = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_HuntGroupCallForwardSettings;
    }

    /**
     * Sets dependent relations IVRCommon_ibfk_6
     *
     * @param array $data An array of \Oasis\Model\Raw\IVRCommon
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setIVRCommonByTimeoutExtension(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_IVRCommonByTimeoutExtension === null) {

                $this->getIVRCommonByTimeoutExtension();
            }

            $oldRelations = $this->_IVRCommonByTimeoutExtension;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    $pk = $newItem->getPrimaryKey();
                    if (!empty($pk)) {
                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_IVRCommonByTimeoutExtension = array();

        foreach ($data as $object) {
            $this->addIVRCommonByTimeoutExtension($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations IVRCommon_ibfk_6
     *
     * @param \Oasis\Model\Raw\IVRCommon $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function addIVRCommonByTimeoutExtension(\Oasis\Model\Raw\IVRCommon $data)
    {
        $this->_IVRCommonByTimeoutExtension[] = $data;
        $this->_setLoaded('IVRCommonIbfk6');
        return $this;
    }

    /**
     * Gets dependent IVRCommon_ibfk_6
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Oasis\Model\Raw\IVRCommon
     */
    public function getIVRCommonByTimeoutExtension($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IVRCommonIbfk6';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_IVRCommonByTimeoutExtension = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_IVRCommonByTimeoutExtension;
    }

    /**
     * Sets dependent relations IVRCommon_ibfk_7
     *
     * @param array $data An array of \Oasis\Model\Raw\IVRCommon
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setIVRCommonByErrorExtension(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_IVRCommonByErrorExtension === null) {

                $this->getIVRCommonByErrorExtension();
            }

            $oldRelations = $this->_IVRCommonByErrorExtension;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    $pk = $newItem->getPrimaryKey();
                    if (!empty($pk)) {
                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_IVRCommonByErrorExtension = array();

        foreach ($data as $object) {
            $this->addIVRCommonByErrorExtension($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations IVRCommon_ibfk_7
     *
     * @param \Oasis\Model\Raw\IVRCommon $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function addIVRCommonByErrorExtension(\Oasis\Model\Raw\IVRCommon $data)
    {
        $this->_IVRCommonByErrorExtension[] = $data;
        $this->_setLoaded('IVRCommonIbfk7');
        return $this;
    }

    /**
     * Gets dependent IVRCommon_ibfk_7
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Oasis\Model\Raw\IVRCommon
     */
    public function getIVRCommonByErrorExtension($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IVRCommonIbfk7';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_IVRCommonByErrorExtension = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_IVRCommonByErrorExtension;
    }

    /**
     * Sets dependent relations IVRCustom_ibfk_6
     *
     * @param array $data An array of \Oasis\Model\Raw\IVRCustom
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setIVRCustomByTimeoutExtension(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_IVRCustomByTimeoutExtension === null) {

                $this->getIVRCustomByTimeoutExtension();
            }

            $oldRelations = $this->_IVRCustomByTimeoutExtension;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    $pk = $newItem->getPrimaryKey();
                    if (!empty($pk)) {
                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_IVRCustomByTimeoutExtension = array();

        foreach ($data as $object) {
            $this->addIVRCustomByTimeoutExtension($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations IVRCustom_ibfk_6
     *
     * @param \Oasis\Model\Raw\IVRCustom $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function addIVRCustomByTimeoutExtension(\Oasis\Model\Raw\IVRCustom $data)
    {
        $this->_IVRCustomByTimeoutExtension[] = $data;
        $this->_setLoaded('IVRCustomIbfk6');
        return $this;
    }

    /**
     * Gets dependent IVRCustom_ibfk_6
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Oasis\Model\Raw\IVRCustom
     */
    public function getIVRCustomByTimeoutExtension($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IVRCustomIbfk6';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_IVRCustomByTimeoutExtension = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_IVRCustomByTimeoutExtension;
    }

    /**
     * Sets dependent relations IVRCustom_ibfk_7
     *
     * @param array $data An array of \Oasis\Model\Raw\IVRCustom
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setIVRCustomByErrorExtension(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_IVRCustomByErrorExtension === null) {

                $this->getIVRCustomByErrorExtension();
            }

            $oldRelations = $this->_IVRCustomByErrorExtension;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    $pk = $newItem->getPrimaryKey();
                    if (!empty($pk)) {
                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_IVRCustomByErrorExtension = array();

        foreach ($data as $object) {
            $this->addIVRCustomByErrorExtension($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations IVRCustom_ibfk_7
     *
     * @param \Oasis\Model\Raw\IVRCustom $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function addIVRCustomByErrorExtension(\Oasis\Model\Raw\IVRCustom $data)
    {
        $this->_IVRCustomByErrorExtension[] = $data;
        $this->_setLoaded('IVRCustomIbfk7');
        return $this;
    }

    /**
     * Gets dependent IVRCustom_ibfk_7
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Oasis\Model\Raw\IVRCustom
     */
    public function getIVRCustomByErrorExtension($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IVRCustomIbfk7';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_IVRCustomByErrorExtension = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_IVRCustomByErrorExtension;
    }

    /**
     * Sets dependent relations IVRCustomEntries_ibfk_3
     *
     * @param array $data An array of \Oasis\Model\Raw\IVRCustomEntries
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setIVRCustomEntries(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_IVRCustomEntries === null) {

                $this->getIVRCustomEntries();
            }

            $oldRelations = $this->_IVRCustomEntries;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    $pk = $newItem->getPrimaryKey();
                    if (!empty($pk)) {
                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_IVRCustomEntries = array();

        foreach ($data as $object) {
            $this->addIVRCustomEntries($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations IVRCustomEntries_ibfk_3
     *
     * @param \Oasis\Model\Raw\IVRCustomEntries $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function addIVRCustomEntries(\Oasis\Model\Raw\IVRCustomEntries $data)
    {
        $this->_IVRCustomEntries[] = $data;
        $this->_setLoaded('IVRCustomEntriesIbfk3');
        return $this;
    }

    /**
     * Gets dependent IVRCustomEntries_ibfk_3
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Oasis\Model\Raw\IVRCustomEntries
     */
    public function getIVRCustomEntries($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IVRCustomEntriesIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_IVRCustomEntries = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_IVRCustomEntries;
    }

    /**
     * Sets dependent relations Users_ibfk_7
     *
     * @param array $data An array of \Oasis\Model\Raw\Users
     * @return \Oasis\Model\Raw\Extensions
     */
    public function setUsers(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Users === null) {

                $this->getUsers();
            }

            $oldRelations = $this->_Users;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    $pk = $newItem->getPrimaryKey();
                    if (!empty($pk)) {
                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_Users = array();

        foreach ($data as $object) {
            $this->addUsers($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Users_ibfk_7
     *
     * @param \Oasis\Model\Raw\Users $data
     * @return \Oasis\Model\Raw\Extensions
     */
    public function addUsers(\Oasis\Model\Raw\Users $data)
    {
        $this->_Users[] = $data;
        $this->_setLoaded('UsersIbfk7');
        return $this;
    }

    /**
     * Gets dependent Users_ibfk_7
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Oasis\Model\Raw\Users
     */
    public function getUsers($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'UsersIbfk7';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Users = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Users;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Oasis\Mapper\Sql\Extensions
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Oasis\Mapper\Sql\Extensions')) {

                $this->setMapper(new \Oasis\Mapper\Sql\Extensions);

            } else {

                 new \Exception("Not a valid mapper class found");
            }

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(false);
        }

        return $this->_mapper;
    }

    /**
     * Returns the validator class for this model
     *
     * @return null | \Oasis\Model\Validator\Extensions
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Oasis\\Validator\Extensions')) {

                $this->setValidator(new \Oasis\Validator\Extensions);
            }
        }

        return $this->_validator;
    }

    public function setFromArray($data)
    {
        return $this->getMapper()->loadModel($data, $this);
    }

    /**
     * Deletes current row by deleting the row that matches the primary key
     *
     * @see \Mapper\Sql\Extensions::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getId() === null) {
            $this->_logger->log('The value for Id cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'id = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getId())
        );
    }

    public function mustUpdateEtag()
    {
        return true;
    }

}