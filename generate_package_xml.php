<?php
/**
 * package.xml generation script for Intraface Webshop package
 * @package Intraface Webshop
 * @author  Lars Olesen <lars@legestue.net>
 * @since   0.1.0
 * @version 0.1.0
 */

$version = '0.1.0';
$stability = 'alpha';
$notes = '* initial release as PEAR package';
$web_dir = 'web';

function getFilelist($dir) {

    global $rFiles;

    $files = glob($dir.'/*');

    foreach($files as $f) {

        if(is_dir($f)) { getFileList($f); continue; }

        $rFiles[] = $f;

    }

}

getFilelist($web_dir);

$web_files = $rFiles;

$ignore = array(
            'generate_package_xml.php',
            '*.tgz',
            'config.local.php'
            );

require_once 'PEAR/PackageFileManager2.php';

PEAR::setErrorHandling(PEAR_ERROR_DIE);
$pfm = new PEAR_PackageFileManager2();
$pfm->setOptions(
    array(
        'baseinstalldir'    => '/',
        'packagedirectory'  => dirname(__FILE__),
        'filelistgenerator' => 'file',
        'packagefile'       => 'package.xml',
        'ignore'            => $ignore,
        'exceptions'        => array(),
        'simpleoutput'      => true,
        'dir_roles' => array('web' => 'web')
    )
);

$pfm->setPackage('Frisbeebutik');
$pfm->setSummary('Provides necessary files for the Intraface Webshop');
$pfm->setDescription('Needs to be filled in');
$pfm->setUri('http://localhost');
$pfm->setLicense('BSD license', 'http://www.opensource.org/licenses/bsd-license.php');
$pfm->addMaintainer('lead', 'lars', 'Lars Olesen', 'lars@legestue.net');

$pfm->setPackageType('php');

$pfm->setAPIVersion($version);
$pfm->setReleaseVersion($version);
$pfm->setAPIStability($stability);
$pfm->setReleaseStability($stability);
$pfm->setNotes($notes);
$pfm->addRelease();


$pfm->resetUsesRole();
$pfm->addUsesRole('web', 'Role_Web', 'pearified.com');
$pfm->addPackageDepWithChannel('required', 'Role_Web', 'pearified.com', '1.1.1');


$pfm->addGlobalReplacement('package-info', '@package-version@', 'version');
$pfm->addReplacement('frisbeebutik.php', 'pear-config', '@web-dir@', 'web_dir');
$pfm->addReplacement('frisbeebutik.php', 'pear-config', '@php-dir@', 'php_dir');

$pfm->clearDeps();
$pfm->setPhpDep('5.1.0');
$pfm->setPearinstallerDep('1.5.0');
$pfm->addPackageDepWithChannel('required', 'Savant3', 'savant.pearified.com', '3.0.0');
$pfm->addPackageDepWithChannel('required', 'HTML_QuickForm', 'pear.php.net', '3.2.7');
$pfm->addPackageDepWithChannel('required', 'XML_RPC2', 'pear.php.net', '1.0.0');
$pfm->addPackageDepWithChannel('required', 'Config', 'pear.php.net', '1.10.9');
$pfm->addPackageDepWithChannel('required', 'Cache_Lite', 'pear.php.net', '1.7.2');
$pfm->addPackageDepWithUri('required', 'IntrafacePublic_Shop_Client', 'http://svn.intraface.dk/intrafacepublic/IntrafacePublic/IntrafacePublic/Shop/XMLRPC/IntrafacePublic_Shop_XMLRPC-0.1.1');
$pfm->addExtensionDep('required', 'curl');


$post_install_script = $pfm->initPostinstallScript('frisbeebutik.php');
$post_install_script->addParamGroup('setup', array(
          $post_install_script->getParam('path_root', 'Root path', 'string', '/home/frisbeebutik/'),
          $post_install_script->getParam('path_xmlrpc', 'Path to the xmlrpc-server', 'string', 'http://www.intraface.dk/xmlrpc/'),
          $post_install_script->getParam('intraface_private_key', 'Private key to intraface', 'string', '')

    ),
    '');

$pfm->addPostInstallTask($post_install_script, 'frisbeebutik.php');

foreach ($web_files AS $file) {
    $formatted_file = substr($file, strlen($web_dir . '/'));
    if (in_array($formatted_file, $ignore)) continue;
    $pfm->addInstallAs($file, $formatted_file);
}

$pfm->generateContents();

if (isset($_GET['make']) || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')) {
    if ($pfm->writePackageFile()) {
        exit('package file written');
    }
} else {
    $pfm->debugPackageFile();
}
?>