<?php

namespace Piedpiper\Plugin\Console\Spm\CliCommand;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Joomla\Console\Command\AbstractCommand;
use Joomla\CMS\Language\Text;

class SpmTaskDeadlineCommand extends AbstractCommand
{
    protected static $defaultName = 'spm:task:deadline';

    protected function configure(): void
    {
        $this->setDescription(Text::_('PLG_CONSOLE_SPM_TASK_DEADLINE_DESCRIPTION'));
        $this->setHelp(Text::_('PLG_CONSOLE_SPM_TASK_DEADLINE_HELP'));
    }

}

protected function getDeadlines() : array
{
    $deadlines = [];

    $days = 7;

    $db = $this->getDatabase();
    $query = $db->getQuery(true);
    $query->select('*')
        ->from('#__spm_tasks');

    $query->where('deadline BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL ' . $days .' DAY)');

    $query->setQuery($query);

    $deadlines = $db->loadAssocList('id');

    return $deadlines;
}

protected function doExecute(InputInterface $input, OutputInterface $output):  int
{
    $outputStyle = new SymfonyStyle($input, $output);
    $outputStyle->title(Text::_('PLG_CONSOLE_SPM_TASK_DEADLINE_TITLE'));

    $deadlines = $this->getDeadlines();

    if (empty($deadlines)) {
        $outputStyle->note(Text::_('PLG_CONSOLE_SPM_TASK_DEADLINE_NO_DEADLINE'));
    } else {
        $outputStyle->table([Text::_('PLG_CONSOLE_SPM_TASK_DEADLINE_DEADLINE_HEADER'), 'Project', 'Task'], $deadlines);
    }


    return Command::SUCCESS;
}
}
