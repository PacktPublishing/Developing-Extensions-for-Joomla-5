<?php

class FirstCest
{
    public function projectsViewWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/index.php/spm');
        $I->see('#project-id');
    }
}
