<?php
use Joomla\CMS\Form\FormRule;

class NotzeroRule extends FormRule
{
    protected $regex = '[0-9]{1,}(\.[0-9]{1,2})?';
}

