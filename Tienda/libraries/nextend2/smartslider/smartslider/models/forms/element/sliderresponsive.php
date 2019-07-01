<?php
/**
* @author    Roland Soos
* @copyright (C) 2015 Nextendweb.com
* @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die('Restricted access');
?><?php
N2Loader::import('libraries.form.element.subformImage');

class N2ElementSliderResponsive extends N2ElementSubformImage
{

    var $_list = null;

    function getOptions() {
        if ($this->_list == null) {
            $this->loadList();
        }
        $list = array_keys($this->_list);
        return $list;
    }

    function getSubFormFolder($value) {
        if ($this->_list == null) {
            $this->loadList();
        }
        if (!isset($this->_list[$value])) list($value) = array_keys($this->_list);
        return $this->_list[$value];
    }

    function loadList() {
        $_list = array();
        N2Plugin::callPlugin('ssresponsive', 'onResponsiveList', array(
            &$_list,
            &$this->labels
        ));

        $this->_list = array();

        $this->_list += $_list;
    }

}