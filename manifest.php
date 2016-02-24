<?php
global $sugar_config;
$sugarVersion = isset($sugar_config['suitecrm_version']) ? 'Suite'.$sugar_config['suitecrm_version'] : $sugar_config['sugar_version'];
$manifest = array(
    'name' => 'audit_description',
    'acceptable_sugar_versions' => array(),
    'acceptable_sugar_flavors' => array('CE'),
    'author' => 'hardsoft321',
    'description' => 'Режим примечания',
    'is_uninstallable' => true,
    'published_date' => '2016-02-12',
    'type' => 'module',
    'version' => '1.0.2',
);
$installdefs = array(
    'id' => 'audit_description',
    'beans' => array(
        array (
            'module' => 'AuditDescription',
            'class' => 'AuditDescription',
            'path' => 'modules/AuditDescription/AuditDescription.php',
            'tab' => false,
        ),
    ),
    'copy' => array(
        array(
            'from' => '<basepath>/source/copy',
            'to' => '.'
        ),
        array (
           'from' => "<basepath>/source/notupgradesafe/{$sugarVersion}/",
           'to' => '.',
        ),
    ),
    'language' => array(
        array (
            'from' => '<basepath>/source/language/application/ru_ru.lang.php',
            'to_module' => 'application',
            'language' => 'ru_ru',
        ),
        array (
            'from' => '<basepath>/source/language/application/en_us.lang.php',
            'to_module' => 'application',
            'language' => 'en_us',
        ),
        array (
            'from' => '<basepath>/source/language/Audit/ru_ru.audit_description.php',
            'to_module' => 'Audit',
            'language' => 'ru_ru',
        ),
        array (
            'from' => '<basepath>/source/language/Audit/en_us.audit_description.php',
            'to_module' => 'Audit',
            'language' => 'en_us',
        ),
    ),
    'linkdefs' => array(
        array(
            'from'=>'<basepath>/source/linkdefs/audit_description.php',
        ),
    ),
    'logic_hooks' => array(
        array(
            'module' => 'Users',
            'hook' => 'after_relationship_add',
            'order' => 100,
            'description' => 'Audit relationship adding',
            'file' => 'modules/AuditDescription/AuditDescriptionHooks.php',
            'class' => 'AuditDescriptionHooks',
            'function' => 'afterRelationshipSave',
        ),
        array(
            'module' => 'Users',
            'hook' => 'after_relationship_delete',
            'order' => 100,
            'description' => 'Audit relationship deletion',
            'file' => 'modules/AuditDescription/AuditDescriptionHooks.php',
            'class' => 'AuditDescriptionHooks',
            'function' => 'afterRelationshipSave',
        ),
        array(
            'module' => '',
            'hook' => 'before_save',
            'order' => 100,
            'description' => 'Audit description before save',
            'file' => 'modules/AuditDescription/AuditDescriptionHooks.php',
            'class' => 'AuditDescriptionHooks',
            'function' => 'beforeSave',
        ),
        array(
            'module' => '',
            'hook' => 'after_save',
            'order' => 100,
            'description' => 'Audit description after save',
            'file' => 'modules/AuditDescription/AuditDescriptionHooks.php',
            'class' => 'AuditDescriptionHooks',
            'function' => 'afterSave',
        ),
        array(
            'module' => '',
            'hook' => 'after_delete',
            'order' => 100,
            'description' => 'Audit description after delete',
            'file' => 'modules/AuditDescription/AuditDescriptionHooks.php',
            'class' => 'AuditDescriptionHooks',
            'function' => 'afterDelete',
        ),
    ),
);
