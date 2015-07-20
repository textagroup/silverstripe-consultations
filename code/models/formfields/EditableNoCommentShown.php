<?php
/**
 * EditableNoCommentShown
 *
 * A checkbox to be used for specifying if your comment is to be displayed on the site
 * 
 * @package consultations
 */


class EditableNoCommentShown extends EditableCheckbox {
	private static $singular_name = 'Display Comment';
	
	private static $plural_name = 'Display Comments';

	public function getIcon() {
		// need to amend image at a later point maybe use fa-comment-o
		// icon from font awesome
		return USERFORMS_DIR . '/images/editablecheckbox.png';
	}
}
