<?php

use Joomla\CMS\Form\FormRule;

class NotzeroRule extends FormRule
{
    public function test(SimpleXMLElement $element, $value, $group = null, JRegistry $input = null, Form $form = null)
    {
        if ($value > 0) {
            return true;
        }
        return false;
    }
}

