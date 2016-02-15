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
    'version' => '1.0.0',
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
    ),
    'linkdefs' => array(
        array(
            'from'=>'<basepath>/source/linkdefs/audit_description.php',
        ),
    ),
);
