<?php
/**
 * @license http://hardsoft321.org/license/ GPLv3
 * @author Evgeny Pervushin <pea@lab321.ru>
 * @package audit_description
 */
require_once('include/MVC/View/views/view.edit.php');

class AuditDescriptionViewEdit extends ViewEdit
{
    function preDisplay()
    {
        require_once 'modules/AuditDescription/AuditDescription.php';
        $this->bean = new AuditDescription();
        $this->bean->loadFromSession();
        parent::preDisplay();
        $this->ev->showSectionPanelsTitles = false;
    }

    protected function _getModuleTitleParams($browserTitle = false)
    {
        global $mod_strings;
        $params = array();
        $params[] = $mod_strings['LBL_AUDIT_DESCRIPTION_TITLE'];
        return $params;
    }

    function display()
    {
        parent::display();
        if(!empty($_SESSION['flash_message'])) {
            echo '<script>ajaxStatus.flashStatus(',json_encode($_SESSION['flash_message']),', 3000);</script>';
            unset($_SESSION['flash_message']);
        }
    }
}
