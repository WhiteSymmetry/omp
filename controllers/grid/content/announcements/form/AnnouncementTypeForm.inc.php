<?php
/**
 * @file controllers/grid/content/announcements/form/AnnouncementTypeForm.inc.php
 *
 * Copyright (c) 2003-2012 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class AnnouncementTypeForm
 * @ingroup controllers_grid_content_announcements_form
 *
 * @brief Form for to read/create/edit announcement types.
 */


import('lib.pkp.classes.manager.form.PKPAnnouncementTypeForm');

class AnnouncementTypeForm extends PKPAnnouncementTypeForm {
	/** @var $pressId int */
	var $pressId;

	/**
	 * Constructor
	 * @param $pressId int
	 * @param $announcementTypeId int leave as default for new announcement
	 */
	function AnnouncementTypeForm($pressId, $announcementTypeId = null) {
		parent::PKPAnnouncementTypeForm($announcementTypeId);
		$this->pressId = $pressId;
	}


	//
	// Extended methods from Form
	//
	/**
	 * @see Form::fetch()
	 */
	function fetch($request) {
		$templateMgr =& TemplateManager::getManager();
		$templateMgr->assign('typeId', $this->typeId);
		return parent::fetch($request, 'controllers/grid/content/announcements/form/announcementTypeForm.tpl');
	}

	//
	// Private helper methdos.
	//
	/**
	 * Helper function to assign the AssocType and the AssocId
	 * @param AnnouncementType the announcement type to be modified
	 */
	function _setAnnouncementTypeAssocId(&$announcementType) {
		$pressId = $this->pressId;
		$announcementType->setAssocType(ASSOC_TYPE_PRESS);
		$announcementType->setAssocId($pressId);
	}
}

?>