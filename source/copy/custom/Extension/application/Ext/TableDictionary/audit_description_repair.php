<?php
/**
 * Заполняем dictionary таблицами аудита, чтобы repairDatabase их тоже восстанавливал.
 */
if(!empty($beanFiles) && !empty($GLOBALS['log'])) { //рано еще, если нет log'а
    $dictionary_audit1 = isset($dictionary['audit']) ? $dictionary['audit'] : null;
    var_dump( $dictionary_audit1 );
    require('metadata/audit_templateMetaData.php');
    $dictionary['audit']['indices'] = array();
    foreach ($beanFiles as $bean => $file){
        if(file_exists($file)) {
            require_once($file);
            $focus = new $bean();
            if ($focus instanceOf SugarBean && $focus->is_AuditEnabled()) {
                $audit_table_name = $focus->get_audit_table_name();
                if ($focus->db->tableExists($audit_table_name)) {
                    $dictionary[$audit_table_name] = $dictionary['audit'];
                    $dictionary[$audit_table_name]['table'] = $audit_table_name;
                }
            }
        }
    }
    $dictionary['audit'] = $dictionary_audit1;
}
