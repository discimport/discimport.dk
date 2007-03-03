<?php
/**
 * package.xml generation script for Intraface Webshop package
 * @package Intraface Webshop
 * @author  Lars Olesen <lars@legestue.net>
 * @since   0.1.0
 * @version 0.1.0
 */

require_once 'PEAR/PackageFileManager2.php';

PEAR::setErrorHandling(PEAR_ERROR_DIE);
$pfm = new PEAR_PackageFileManager2();
$pfm->setOptions(
    array(
        'baseinstalldir'    => 'Intraface/Webshop',
        'packagedirectory'  => dirname(__FILE__),
        'filelistgenerator' => 'file',
        'packagefile'       => 'package.xml',
        'ignore'            => array(
			'generate_package_xml.php',
			'package.xml',
			'*.tgz'
			),
		'exceptions'        => array(),
        'simpleoutput'      => true,
	)
);

$pfm->setPackage('Webshop');
$pfm->setSummary('Provides necessary files for the Intraface Webshop');
$pfm->setDescription('Needs to be filled in');
$pfm->setChannel('pear.intraface.dk');
$pfm->setLicense('BSD license', 'http://www.opensource.org/licenses/bsd-license.php');
$pfm->addMaintainer('lead', 'lars', 'Lars Olesen', 'lars@legestue.net');

$pfm->setPackageType('php');

$pfm->addReplacement('setup.php', 'pear-config', '@php_dir@', 'php_dir');

$pfm->setAPIVersion('0.3.1');
$pfm->setReleaseVersion('0.3.1');
$pfm->setAPIStability('beta');
$pfm->setReleaseStability('beta');
$pfm->setNotes('Needs to be filled in');
$pfm->addRelease();

$pfm->addGlobalReplacement('package-info', '@package-version@', 'version');

$pfm->clearDeps();
$pfm->setPhpDep('5.1.0');
$pfm->setPearinstallerDep('1.5.0');
$pfm->addPackageDepWithChannel('required', 'Savant3', 'savant.pearified.com', '3.0.0');
$pfm->addPackageDepWithChannel('required', 'HTML_QuickForm', 'pear.php.net', '3.2.7');
$pfm->addPackageDepWithChannel('required', 'XML_RPC2', 'pear.php.net', '1.0.0');
$pfm->addPackageDepWithChannel('required', 'Config', 'pear.php.net', '1.10.9');
$pfm->addPackageDepWithChannel('required', 'Cache_Lite', 'pear.php.net', '1.7.2');
$pfm->addExtensionDep('required', 'curl');

$postInstall = $pfm->initPostinstallScript('setup.php');
$postInstall->addParamGroup(
	'setup',
	array(
		$postInstall->getParam('webroot', 'Webroot'),
		$postInstall->getParam('intraface', 'Private Key'),

    ),
    'Settings'
);

$pfm->addPostInstallTask($postInstall, 'setup.php');

$pfm->generateContents();

if (isset($_GET['make']) || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')) {
	echo 'write package file';
    $pfm->writePackageFile();
} else {
	echo 'debug package file';
    $pfm->debugPackageFile();
}
?>