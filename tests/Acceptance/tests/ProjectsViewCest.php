<?php

class ProjectsViewCest
{
    public function projectsViewWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/index.php/spm');
        $I->seeElement('.card h2');
    }
}
