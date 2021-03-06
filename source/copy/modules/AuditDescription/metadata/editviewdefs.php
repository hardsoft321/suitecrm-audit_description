<?php
/**
 * @license http://hardsoft321.org/license/ GPLv3
 * @author Evgeny Pervushin <pea@lab321.ru>
 * @package audit_description
 */
$viewdefs ['AuditDescription'] = array (
    'EditView' => array (
        'templateMeta' => array (
            'form' => array (
                'buttons' => array (
                    0 => 'SAVE',
                    1 => 'CANCEL',
                ),
            ),
            'maxColumns' => '2',
            'widths' => array (
                0 => array (
                    'label' => '10',
                    'field' => '30',
                ),
                1 => array (
                    'label' => '10',
                    'field' => '30',
                ),
            ),
            'useTabs' => false,
        ),
        'panels' => array (
            'LBL_AUDIT_DESCRIPTION' => array(
                array(
                    'name' => 'audit_description',
                ),
            ),
        ),
    ),
);
