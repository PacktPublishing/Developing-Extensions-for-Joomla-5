<?php

namespace Piedpiper\Plugin\Console\Spm\CliCommand;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Joomla\Console\Command\AbstractCommand;

class SpmTaskDeadlineCommand extends AbstractCommand
{
    protected static $defaultName = 'spm:task:deadline';

    protected function configure(): void
    {
        $this->setDescription('List upcoming task deadlines');
        $this->setHelp(
            'The <info>$command.name%</info> command lists all the tasks with upcoming deadlines. <info>php
%command.full_name%</info>'
        );
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
        $outputStyle->title('Simple Project Manager Upcoming Deadlines');

        $deadlines = $this->getDeadlines();

        if (empty($deadlines)) {
            $this->outputStyle->note('There is no upcoming deadlines');
        } else {
            $this->outputStyle->table(['Deadline', 'Project', 'Task'], $deadlines);
        }


        return Command::SUCCESS;
    }
}
