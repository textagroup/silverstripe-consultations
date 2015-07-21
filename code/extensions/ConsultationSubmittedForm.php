<?php
/**
 * @package consultation
 */
class ConsultationSubmittedForm extends DataExtension {

	private static $db = array(
		'IsConsultationSubmission' => 'Boolean',
		'ModerationStatus' => "Enum('Checked, Unchecked, Blocked', 'Unchecked')"
	);

	public function onBeforeWrite() {
		if($parent = $this->owner->Parent()) {
			$this->owner->IsConsultationSubmission = ($parent instanceof Consultation);
		}
	}

	/**
	* Return all fields to include in a comment and their value
	*
	* @return SubmittedFormField
	*/
	public function getCommentFields() {
		$fields = $this->owner->Values()->filterByCallback( function($field) {
			return $field->isCommentField();
		});
		return $fields;
	}

	/**
	* Return all fields that would generate a report
	*
	* @return SubmittedFormField
	*/
	public function getReportFields() {
		$fields = $this->owner->Values()->filterByCallback( function($field) {
			return $field->isReportField();
		});
		return $fields;
	}

	/**
	* Return a boolean false if a no show comment field has been set to yes
	*
	* @return Boolean
	*/
	public function getShowComment() {
		$fields = $this->owner->Values();
		foreach ($fields as $field) {
			if (strpos($field->Name, 'EditableNoCommentShow') !== false) {
				if ($field->Value == 'Yes') {
					return false;
				}
			}
		}
		$config = SiteConfig::current_site_config(); 
		if ($config->ModerateSubmissions) {
			if ($this->owner->ModerationStatus != 'Checked') {
				return false;
			}
		}
		return true;
	}
}
