<?php

namespace MailPoetVendor\Sabberworm\CSS\Value;

class RuleValueList extends \MailPoetVendor\Sabberworm\CSS\Value\ValueList
{
    public function __construct($sSeparator = ',', $iLineNo = 0)
    {
        parent::__construct(array(), $sSeparator, $iLineNo);
    }
}
