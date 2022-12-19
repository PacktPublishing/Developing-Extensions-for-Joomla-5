<?php

/**
 * @package		Joomla.Administrator
 * @subpackage	com_spm
 * @copyright
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Log\Log;

/**
 * Installation script
 *
 * @since 1.0.0
 */
class Com_SpmInstallerScript
{
    /**
     * Minimum Joomla version to check
     *
     * @var     string
     * @since   1.0.0
     */
    private $minimumJoomlaVersion = '4.0';

    /**
     * Minimum PHP version to check
     *
     * @var     string
     * @since   1.0.0
     */
    private $minimumPHPVersion = JOOMLA_MINIMUM_PHP;

    /**
     * Method to install the extension
     *
     * @param   InstallerAdapter    $parent
}

