<?php
/**
 * Post install script for Frisbeebutik
 *
 * @package    Frisbeebutik
 * @author     Lars Olesen <lars@legestue.net>
 * @since      0.1.0
 * @version    @package-version@
 * @see        http://cvs.php.net/viewvc.cgi/pearweb/pearweb.php?revision=1.9&view=markup
 */

require_once 'Config.php';
require_once 'PEAR/Frontend.php';
require_once 'PEAR/Config.php';

class frisbeebutik_postinstall {

    /**
     * @var object PEAR_Config
     */
    private $_config;

    /**
     * @var object PEAR_Installer_Ui
     */
    private $_ui;

    /**
     * @var string realpath to the written config file
     */
    private $_config_file;

    /**
     * @var string path to web_dir
     */
    private $_web_dir;

    /**
     * @var array with the settings which needs to be set
     */
    private $settings = array(
        0 => 'path_root',
        1 => 'path_xmlrpc',
        3 => 'intraface_private_key'
    );

    /**
     * Initialize this module
     *
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
     * @return bool True if initialized successfully, otherwise false.
     */
    public function init($config, $self = null, $lastInstalledVersion = null) {
        $this->_config = $config;
        $this->setUI();
        $this->_web_dir = '@web-dir@' . DIRECTORY_SEPARATOR;
        $this->_config_file = $this->_web_dir . 'config.local.php';

        return true;
    }

    function setUI($ui = null)
    {
        if (!$ui)
            $this->_ui = PEAR_Frontend::singleton();
        else
            $this->_ui = $ui;

    }

    /**
     * Run the post installation process
     *
     * This method is called by the PEAR Installer each time, it has requested a set of data from the user,
     * meaning, after each <paramgroup> defined in the package.xml. On error, the PEAR Installer
     * calls this metod with "_undoOnError" as the $paramGroup value and has all information submitted so far
     * available in the $infoArray variable. In every other case the $paramGroup contains the name of the
     * performed <paramgroup> section and $infoArray contains the values selected from there.
     *
     * @param array  $answers The values entered by the user.
     * @param string $section The name of the parameter group we currently work on.
     *
     * @return bool  True if process went well, otherwise false to indicate that the process has to be repeated.
     */
    public function run($answers, $section) {
        // Choose, which <paramgroup> is processed now
        switch ($section) {
            case '_undoOnError':
                // We just give a message, usually you should try to revert the changes
                // you already made in this place.
                $this->_ui->outputData('An error occured during installation.');
                return false;
            case 'setup':
                $success = $this->setupEnvironment($answers);
                return true;
                break;
            default:
                echo 'ERROR: Unknown parameter group <'.$section.'>.';
                return false;
        }
    }

    /**
     * Process prompts before they are shown
     *
     * This method is called by the PEAR Installer before each prompt is shown. Use the method
     * to alter the text in the prompts.
     *
     * @param array  $prompts
     * @param string $section
     *
     * @return boolean
     */
    function postProcessPrompts($prompts, $section)
    {
        switch ($section) {
            case 'setup':
                if (file_exists($this->_config_file)) {
                    $this->_ui->outputData($this->_config_file);
                    require_once $this->_config_file;

                    foreach ($this->settings AS $key => $setting) {
                        $prompts[$key]['default'] = constant(strtoupper($setting));
                    }
                }
                break;
        }
        return $prompts;
    }

    /**
     * Creating the config file
     *
     * @param array $answers The $answers passed over from the run() method.
     *
     * @return bool True on success, otherwise false.
     */
    function setupEnvironment($answers)
    {
        $this->_ui->outputData('Writing config file');

        $config = new Config();
        $root = $config->getRoot();
        $root->createItem('directive', strtoupper('path_include'), '@php-dir@');

        foreach ($this->settings AS $setting) {
            $root->createItem('directive', strtoupper($setting), $answers[$setting]);
        }

        $error_check = $config->writeConfig($this->_config_file, 'phpconstants', array('name' => 'config'));
        if (PEAR::isError($error_check)) {
            $this->_ui->outputData($error_check->getMessage());
            return false;
        }

        $this->_ui->outputData('Config file written: ' . $this->_config_file);

        return true;

    }
}
?>