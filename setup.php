<?php
/**
 * Post install script for Intraface Webshop
 *
 * @package    Webshop
 * @author     Lars Olesen <lars@legestue.net>
 * @since      0.1.0
 * @version    @package-version@
 */

require_once 'Config.php';

class setup_postinstall
{

    /**
     * PEAR_Config object
     *
     * @var object(PEAR_Config)
     * @access protected
     */
    private $_config;

    /**
     * PEAR_Installer_Ui
     *
     * @var object(PEAR_Installer_Ui)
     * @access protected
     */
    private $_ui;

    /**
     * Directory of PHP files.
     *
     * @var string
     * @access protected
     */
    private $_phpDir;

    /**
     * Initialize this module.
     * Initialize PEAR environment objects. This method is called first from the Installer,
     * before the real post install process takes place. We do some initialization here.
     *
     * @param object(PEAR_Config) $config The PEAR configuration object, you can get and set
     *                                    all PEAR Installer configuration values using this.
     * @link http://pear.php.net/package/PEAR/docs/1.4.4/PEAR/PEAR_Config.html
     *
     * @param object(PEAR_PackageFile_v2) $self The parsed package.xml object, you can use
     *                                          this one to access the values defined in your
     *                                          package.xml.
     * @link http://pear.php.net/package/PEAR/docs/1.4.4/PEAR/PEAR_PackageFile_v2.html
     *
     * @param string $lastInstalledVersion The version number of your package, which is currently
     *                                     installed on the target system, or null, if this is the
     *                                     first time, your application is installed. We don't care
     *                                     about that in this example
     * @access public
     * @return bool True if initialized successfully, otherwise false.
     */
    function init(&$config, $self, $lastInstalledVersion = null)
    {
       $this->_config = &$config;

       // One should utilized the Ui of the Installer in preference of "echo" or similar,
       // because the Installer can also use different frontends, like
       $this->_ui = PEAR_Frontend::singleton();

       $this->_phpDir = '@php_dir@' . DIRECTORY_SEPARATOR . 'Intraface' . DIRECTORY_SEPARATOR . 'Webshop';

       return true;
    }

    /**
     * Run the post installation process.
     * This method is called by the PEAR Installer each time, it has requested a set of data from the user,
     * meaning, after each <paramgroup> defined in the package.xml. On error, the PEAR Installer
     * calls this metod with "_undoOnError" as the $paramGroup value and has all information submitted so far
     * available in the $infoArray variable. In every other case the $paramGroup contains the name of the
     * performed <paramgroup> section and $infoArray contains the values selected from there.
     *
     * @param array $infoArray The values entered by the user.
     * @param string $paramGroup The name of the parameter group we currently work on.
     * @access public
     * @return bool True if process went well, otherwise false to indicate that the process has to be repeated.
     */
    function run($infoArray, $paramGroup)
    {
        // Choose, which <paramgroup> is processed now
        switch ($paramGroup) {
        case '_undoOnError':
            // We just give a message, usually you should try to revert the changes
            // you already made in this place.
            $this->_ui->outputData('An error occured during installation.');
            return false;
        case 'setup':
            // The config paramgroup is processed.
            return $this->setupIntrafaceWebshop($infoArray);
            break;
        default:
            echo 'ERROR: Unknown parameter group <'.$paramGroup.'>.';
            return false;
        }
    }

    /**
     * Insert configuration into database.
     * This method takes the configuration provided by the user and inserts it
     * into the Serendipity database.
     *
     * @param array $infoArray The $infoArray passed over from the run() method.
     * @return void
     * @return bool True on success, otherwise false.
     */
    function setupIntrafaceWebshop($infoArray)
    {
        $webroot = $infoArray['webroot'];

        // Check / create webroot
        if (!is_dir($webroot)) {
            if (!mkdir($webroot)) {
                $this->_ui->outputData('Specified webroot diretory does not exist and could not be created.');
                return false;
            }
        }

        $webroot = realpath($webroot);

        if (
            copy(
                $this->_phpDir .  DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'index.php',
                $webroot .  DIRECTORY_SEPARATOR. 'index.php'
                ) === false
            ) {
            $this->_ui->outputData('Could not copy file to specified output directory.' . $webroot . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR. 'index.php');
            return false;
        }

		// denne skal sådan set kigge efter om der findes nogen
		// config på forhånd - hvis der gør skal den helst hente
		// oplysninger herfra og ind i ui - eller springe det over

		// ift at ændre templates - så er det smarteste nok at man
		// bare kan angive sit eget bibliotek?

		// men hvad gør vi med menuerne, som også bør være lette at
		// redigere på ens eget site?

		// + der skal være et tjek af om det er en gyldig halløjsa

        $config = new Config();
    	$root = $config->getRoot();
    	$root->createItem('directive', 'intraface_public_key', $infoArray['intraface']);
    	$error_check = $config->writeConfig($webroot .  DIRECTORY_SEPARATOR. 'config.php', 'phpconstants', array('name' => 'config'));
    	if (PEAR::isError($error_check)) {
    		$this->_ui->outputData($error_check->getMessage());
    		return false;
    	}

        // Indicate success for this param group
        return true;

    }

}

?>
