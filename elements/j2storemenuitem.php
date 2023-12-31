<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2023 Sasi varna kumar / J2Store.org
 * @license GNU GPL v3 or later
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.form.formfield');
class JFormFieldJ2StoreMenuItem extends JFormField
{

	protected $type = 'J2storemenuitem';
	/**
	 * Method to get the field input markup.
	 *
	 * @return  string	The field input markup.
	 * @since   1.6
	 */
	protected function getInput()
	{
        $platform = J2Store::platform();
		$app = $platform->application();
		$options = array();
		$module_id = $app->input->getInt('id');
		$menus =JMenu::getInstance('site');
		$menu_id = null;
		$menuItems = array();
		$options[''] = JText::_('J2STORE_OPTION_SELECT');
		foreach($menus->getMenu() as $item)
		{
			if($item->type== 'component'){
				if(isset($item->query['option']) && $item->query['option'] == 'com_j2store' ){
					if(isset($item->query['catid'])){
						$options[$item->id] = $item->title;
					}
				}
			}
		}
	 return JHTML::_('select.genericlist', $options, $this->name, array('class'=>"input"), 'value', 'text', $this->value);
	}

}

