<?php

namespace App\Http\Controllers\Installer\Helpers;

class RequirementsChecker
{

    /**
     * Minimum PHP Version Supported (Override is in installer.php config file).
     *
     * @var _minPhpVersion
     */
    private $_minPhpVersion = '7.2.0';

    /**
     * Check for the server requirements.
     *
     * @param array $requirements
     * @return array
     */
    public function check(array $requirements)
    {
        $results = [];

        foreach($requirements as $type => $requirement)
        {
            switch ($type) {
                // check php requirements
                case 'php':
                    foreach($requirements[$type] as $requirement)
                    {
                        $results['requirements'][$type][$requirement] = true;

                        if(!extension_loaded($requirement))
                        {
                            $results['requirements'][$type][$requirement] = false;

                            $results['errors'] = true;
                        }

                    }
                    break;
                // check apache requirements
                case 'apache':
                    foreach ($requirements[$type] as $requirement) {
                        // if function doesn't exist we can't check apache modules
                        if(function_exists('apache_get_modules'))
                        {
                            $results['requirements'][$type][$requirement] = true;

                            if(!in_array($requirement,apache_get_modules()))
                            {
                                $results['requirements'][$type][$requirement] = false;

                                $results['errors'] = true;
                            }
                        }
                    }
                    break;
            }
        }

        return $results;
    }

    /**
     * Check PHP version requirement.
     *
     * @return array
     */
    public function checkPHPversion(string $minPhpVersion = null, string $maxPhpVersion = null)
    {
        // $minVersionPhp = $minPhpVersion;
        $currentPhpVersion = $this->getPhpVersionInfo();
        $supported = false;

        if ($minPhpVersion == null) {
            $minPhpVersion = $this->getMinPhpVersion();
        }

        if ($maxPhpVersion == null) {
            $maxPhpVersion = $currentPhpVersion['version'];
        }
        // echo "<pre>"; print_r(version_compare($currentPhpVersion['version'], $maxPhpVersion, '>')); echo "<pre>"; exit('end!');
        if (
            version_compare($currentPhpVersion['version'], $minPhpVersion, '>=') &&
            version_compare($currentPhpVersion['version'], $maxPhpVersion, '<=')
            // version_compare($currentPhpVersion['version'], $maxPhpVersion) <= 0
        ) {
            $supported = true;
        }

        $phpStatus = [
            'full' => $currentPhpVersion['full'],
            'current' => $currentPhpVersion['version'],
            'minimum' => $minPhpVersion,
            'maximum' => $maxPhpVersion,
            'supported' => $supported
        ];

        return $phpStatus;
    }

    /**
     * Get current Php version information
     *
     * @return array
     */
    private static function getPhpVersionInfo()
    {
        $currentVersionFull = PHP_VERSION;
        preg_match("#^\d+(\.\d+)*#", $currentVersionFull, $filtered);
        $currentVersion = $filtered[0];

        return [
            'full' => $currentVersionFull,
            'version' => $currentVersion
        ];
    }

    /**
     * Get minimum PHP version ID.
     *
     * @return string _minPhpVersion
     */
    protected function getMinPhpVersion()
    {
        return $this->_minPhpVersion;
    }

}