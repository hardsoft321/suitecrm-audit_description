<?php
/**
 * @license http://hardsoft321.org/license/ GPLv3
 * @author Evgeny Pervushin <pea@lab321.ru>
 * @package audit_description
 */
require_once('include/MVC/Controller/SugarController.php');

class AuditDescriptionController extends SugarController
{
    public function pre_save()
    {
    }

    public function action_save()
    {
        require_once 'modules/AuditDescription/AuditDescription.php';
        $this->bean = new AuditDescription();
        $this->bean->loadFromPost();
        $this->bean->saveToSession();
    }

    protected function post_save()
    {
        $_SESSION['flash_message'] = $GLOBALS['app_strings']['LBL_SAVED'];
        $url = "index.php?module=AuditDescription&action=EditView";
        $this->set_redirect($url);
    }
}
