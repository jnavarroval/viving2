<?php

namespace HealthConsultant\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use HealthConsultant\LaravelInstaller\Events\LaravelInstallerFinished;
use HealthConsultant\LaravelInstaller\Helpers\EnvironmentManager;
use HealthConsultant\LaravelInstaller\Helpers\FinalInstallManager;
use HealthConsultant\LaravelInstaller\Helpers\InstalledFileManager;

class FinalController extends Controller
{
    /**
     * Update installed file and display finished view.
     *
     * @param \HealthConsultant\LaravelInstaller\Helpers\InstalledFileManager $fileManager
     * @param \HealthConsultant\LaravelInstaller\Helpers\FinalInstallManager $finalInstall
     * @param \HealthConsultant\LaravelInstaller\Helpers\EnvironmentManager $environment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish(InstalledFileManager $fileManager, FinalInstallManager $finalInstall, EnvironmentManager $environment)
    {
        $finalMessages = $finalInstall->runFinal();
        $finalStatusMessage = $fileManager->update();
        $finalEnvFile = $environment->getEnvContent();

        event(new LaravelInstallerFinished);

        return view('vendor.installer.finished', compact('finalMessages', 'finalStatusMessage', 'finalEnvFile'));
    }
}
