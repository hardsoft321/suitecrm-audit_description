<?php
if(is_admin($GLOBALS['current_user'])) {
    $label = $GLOBALS['app_strings']['LBL_AUDIT_DESCRIPTION_TITLE'];
    if(!empty($_SESSION['audit_description'])) {
        $label .= " <span style=\"color:red\">({$_SESSION['audit_description']})</span>";
    }
    $global_control_links['audit_description'] = array(
        'linkinfo' => array(
            $label => 'index.php?module=AuditDescription&action=EditView',
        ),
        'submenu' => '',
    );
}
