<?php
/**
 * @license http://hardsoft321.org/license/ GPLv3
 * @author Evgeny Pervushin <pea@lab321.ru>
 * @package audit_description
 */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$dictionary['AuditDescription'] = array(
    'audited' => false,
    'fields' => array (
        'audit_description' => array(
            'name' => 'audit_description',
            'vname' => 'LBL_AUDIT_DESCRIPTION',
            'type' => 'varchar',
            'len' => 255,
            'source'=>'non-db',
            'required' => false,
            'reportable'=>false,
        ),
    ),
);
