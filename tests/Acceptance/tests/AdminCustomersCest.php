<?php

class AdminCustomersCest
{
    public function customersTableExists(AcceptanceTester $I)
    {
        $I->amOnPage('/administrator/index.php');
        $I->fillField('Username', 'tester');
        $I->fillField('Password', 'testerPassword12345#');
        $I->click('Log in');
        $I->amOnPage('/administrator/index.php?option=com_spm&view=customers');
        $I->seeElement('table');
    }
}
