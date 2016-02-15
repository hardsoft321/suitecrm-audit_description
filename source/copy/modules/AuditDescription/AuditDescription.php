<?php
/**
 * @license http://hardsoft321.org/license/ GPLv3
 * @author Evgeny Pervushin <pea@lab321.ru>
 * @package audit_description
 */
class AuditDescription extends SugarBean
{
    public $object_name = 'AuditDescription';
    public $module_dir = 'AuditDescription';

    public $audit_description;

    public $additional_meta_fields = array( //против Notice в EditView2.php
        'id' => array (
            'name' => 'id',
            'vname' => 'LBL_ID',
            'type' => 'id',
            'source'=>'non-db',
            'value' => '',
        ),
    );

    function ACLAccess($view,$is_owner='not_set')
    {
        return $GLOBALS['current_user']->isAdmin();
    }

    public function loadFromSession()
    {
        $this->audit_description = isset($_SESSION['audit_description']) ? $_SESSION['audit_description'] : '';
    }

    public function saveToSession()
    {
        $_SESSION['audit_description'] = $this->audit_description;
    }

    public function loadFromPost()
    {
        $fields = $this->getFieldDefinitions();
        if(!empty($_POST['audit_description'])) {
            $val = $_POST['audit_description'];
            $fieldDef = $fields['audit_description'];
            if(!empty($val) && !empty($fieldDef['len']) && strlen($val) > $fieldDef['len']) {
                $val = $this->db->truncate($val, $fieldDef['len']);
            }
        }
        else {
            $val = '';
        }
        $this->audit_description = $val;
    }
}
