<?php
/**
* @author    Roland Soos
* @copyright (C) 2015 Nextendweb.com
* @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die('Restricted access');
?><?php
N2Loader::import('libraries.form.element.onoff');

class N2ElementMirror extends N2ElementOnOff
{

    function fetchElement() {
        N2JS::addInline('new NextendElementMirror("' . $this->_id . '");');
        return parent::fetchElement();
    }
}
