<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace ComcomExtjsModule\Console;

use Zend\Mvc\Controller\AbstractActionController;

use Composer\IO\ConsoleIO;
use Composer\Factory;
use Composer\Config;
use Composer\Package\Package;

use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Helper\HelperSet;

/**
 * @author Marco Pivetta <marco.pivetta@com2-gmbh.de>
 */
class InstallExtjs extends AbstractActionController
{
    public function installAction()
    {
        $inputDefinition = new InputDefinition();
        $verbose = new InputOption('verbose');
        $verbose2 = new InputArgument('verbose');
        $inputDefinition->addOption($verbose);
        $inputDefinition->addArgument($verbose2);
        $input = new ArrayInput(
            array('verbose' => true),
            $inputDefinition
        );
        $output = new ConsoleOutput();
        $io = new ConsoleIO($input, $output, new HelperSet());
        $factory = new Factory();
        $config = new Config();
        $downloadManager = $factory->createDownloadManager($io, $config);

        $package = new Package('comcom/ext-js', '4.1.1a', '4.1.1a');
        $package->setDistReference('4.1.1a');
        $package->setDistUrl('http://cdn.sencha.com/ext-4.1.1a-gpl.zip');
        //$package->setDistUrl('http://localhost/');
        $package->setDistType('zip');
        //$package->setDistSha1Checksum('kdlfhsfdldfslkhnflkdn');
        $downloadManager->download($package, __DIR__ . '/../../../downloads');
        die('lol?');
    }
}
