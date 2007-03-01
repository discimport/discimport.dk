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
$pfm = &PEAR_PackageFileManager2::importOptions('package2.xml',
    array(
        // set a subdirectory everything is installed into
        'baseinstalldir' => 'Intraface/Webshop',
        // location of files to package
        'packagedirectory' => dirname(__FILE__),
        // what method is used to glob files? cvs, svn, perforce
        // and file are options
        'filelistgenerator' => 'file',
        // what is the package filename?
        'packagefile' => 'package2.xml',
        // don't distribute this script
        'ignore' => array('package.php', 'package2.xml', 'package.xml', '*.tgz'),
        // make the output human-friendly
        'simpleoutput' => true,
        ));

$pfm->setPackage('Webshop');
//$pfm->addRole('xml', 'php');
$pfm->setUri('http://localhost/pear test/');
$pfm->setLicense('BSD license', 'http://www.opensource.org/licenses/bsd-license.php');
$pfm->setSummary('Provides necessary files for the Intraface Webshop');
$pfm->setDescription('Needs to be filled in');
// initial release version should be 0.1.0
$pfm->setAPIVersion('0.1.0');
$pfm->setReleaseVersion('0.1.0');
// our API is reasonably stable, but may need tweaking
$pfm->setAPIStability('beta');
// the code is very new, and may change dramatically
$pfm->setReleaseStability('beta');
// release notes
$pfm->setNotes('Needs to be filled in');
// this is a PHP script, not a PECL extension source/binary or a bundle package
$pfm->setPackageType('php');
$pfm->addRelease();

// start over with dependencies
$pfm->clearDeps();
$pfm->setPhpDep('5.1.0');
$pfm->setPearinstallerDep('1.5.0');
$pfm->addPackageDepWithChannel('required', 'Savant3', 'savant.pearified.com', '3.0.0');
$pfm->addPackageDepWithChannel('required', 'HTML_QuickForm', 'pear.php.net', '3.2.7');
$pfm->addPackageDepWithChannel('required', 'XML_RPC2', 'pear.php.net', '1.0.0');
$pfm->addPackageDepWithChannel('required', 'Config', 'pear.php.net', '1.10.9');
$pfm->addPackageDepWithChannel('required', 'Cache_Lite', 'pear.php.net', '1.7.2');
$pfm->addExtensionDep('required', 'curl');


// create the <contents> tag
$pfm->generateContents();

// display the package.xml by default to allow "debugging" by eye, and then
// create it if explicitly asked to
if (isset($_GET['make']) || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')) {
 //   $pfm1->writePackageFile();
    $pfm->writePackageFile();
} else {
  //  $pfm1->debugPackageFile();
    $pfm->debugPackageFile();
}
?>