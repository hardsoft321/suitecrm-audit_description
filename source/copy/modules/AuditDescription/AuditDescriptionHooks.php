<?php
/**
 * @license http://hardsoft321.org/license/ GPLv3
 * @author Evgeny Pervushin <pea@lab321.ru>
 * @package audit_description
 */
class AuditDescriptionHooks
{
    public function afterRelationshipSave($bean, $event, $arguments)
    {
        if($bean->is_AuditEnabled()) {
            $mod_strings = return_module_language($GLOBALS['curent_language'], 'AuditDescription');
            $msg = '';
            if($event == 'after_relationship_add') {
                $msg .= $mod_strings['MSG_AUDIT_REL_ADD'];
            }
            else if($event == 'after_relationship_delete') {
                $msg .= $mod_strings['MSG_AUDIT_REL_DELETE'];
            }
            $msg = str_replace('%1', $arguments['related_module'], $msg);
            $msg = str_replace('%2', !empty($arguments['related_bean']) ? $arguments['related_bean']->get_summary_text() : '' , $msg);
            $change = array(
                'field_name' => $arguments['link'],
                'data_type' => 'text',
                'before' => '',
                'after' => $msg,
            );
            $bean->db->save_audit_records($bean, $change);
        }
    }

    public function beforeSave($bean, $event)
    {
        $bean->fetched_row_id = $bean->fetched_row['id'];
    }

    public function afterSave($bean, $event)
    {
        if(!$bean->is_AuditEnabled()) {
            return;
        }
        if(empty($bean->fetched_row_id)) {
            $change = array(
                'field_name' => 'id',
                'data_type' => 'id',
                'before' => '',
                'after' => $bean->id,
            );
            $bean->db->save_audit_records($bean, $change);
        }
        if(!empty($_POST['action']) && $_POST['action'] == 'SaveMerge') {
            $mod_strings = return_module_language($GLOBALS['curent_language'], 'AuditDescription');
            $change = array(
                'field_name' => 'Merge',
                'data_type' => 'text',
                'before' => '',
                'after' => $mod_strings['MSG_AUDIT_MERGE'].' '.implode(', ', $_POST['merged_ids']),
            );
            $bean->db->save_audit_records($bean, $change);
        }
    }

    public function afterDelete($bean, $event)
    {
        if(!$bean->is_AuditEnabled()) {
            return;
        }
        $change = array(
            'field_name' => 'id',
            'data_type' => 'id',
            'before' => $bean->id,
            'after' => '',
        );
        $bean->db->save_audit_records($bean, $change);
    }
}
