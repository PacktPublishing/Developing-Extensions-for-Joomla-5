<?php

namespace Piedpiper\Plugin\Console\Spm\CliCommand;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Joomla\Console\Command\AbstractCommand;
use Joomla\CMS\Language\Text;
use Symfony\Component\Console\Input\InputOption;
use Joomla\CMS\Factory;

class SpmTaskDeadlineCommand extends AbstractCommand
{
    protected static $defaultName = 'spm:task:deadline';

    private $cliInput;

    protected function configure(): void
    {
        $this->setDescription(Text::_('PLG_CONSOLE_SPM_TASK_DEADLINE_DESCRIPTION'));
        $this->setHelp(Text::_('PLG_CONSOLE_SPM_TASK_DEADLINE_HELP'));

        $this->addOptions();
    }

    protected function addOptions()
    {
        $description = Text::_('PLG_CONSOLE_SPM_TASK_DEADLINE_OPTION_DAYS_DESCRIPTION');
        $this->addOption('days', 'd', InputOption::VALUE_OPTIONAL, $description, 7);

        return;
    }

    protected function getDatabase()
    {
        $db = Factory::getDbo();

         return $db;
    }

    protected function getDeadlines($options) : array
    {
        $deadlines = [];

        $days = (int)$options['days'];

        if ($days <= 0) {
            $days = 7;
        }

        $db = $this->getDatabase();
        $query = $db->getQuery(true);
        $query->select('*')
            ->from('#__spm_tasks');

        $query->where('deadline BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL ' . $days . ' DAY)');

        $query->setQuery($query);

        $deadlines = $db->loadAssocList('id');

        return $deadlines;
    }

    protected function getOptions() : array
    {
        $options = [];

        $options = $this->cliInput->getOptions();

        return $options;
    }

    protected function doExecute(InputInterface $input, OutputInterface $output):  int
    {
        $this->cliInput = $input;

        $outputStyle = new SymfonyStyle($input, $output);
        $outputStyle->title(Text::_('PLG_CONSOLE_SPM_TASK_DEADLINE_TITLE'));

        $options = $this->getOptions();

        $deadlines = $this->getDeadlines($options);

        if (empty($deadlines)) {
            $outputStyle->note(Text::_('PLG_CONSOLE_SPM_TASK_DEADLINE_NO_DEADLINE'));
        } else {
            $outputStyle->table([Text::_('PLG_CONSOLE_SPM_TASK_DEADLINE_DEADLINE_HEADER'), 'Project', 'Task'], $deadlines);
        }

        return Command::SUCCESS;
    }
}
