<?php

class GaugeReport extends ConsultationReportType {

	protected $name = 'Gauge';
	protected $template = 'GaugeReport';
	protected $requiresColours = true;

	public function render(Controller $controller, ArrayData $data) {
		// Require js library
		Requirements::javascript(CONSULTATION_MODULE_DIR . '/js/gauge.min.js');
		// Customise data
		$graphData = $this->graphData($data);
		$data->setField('gaugeSet', $graphData['set']);
		$data->setField('maxValue', $graphData['total']);
		// Perform rendering
		return $controller->customise($data)->renderWith($this->template);
	}

	public function graphData($data) {
		$options = $data->getField('Options')->toArray();
		$results = array();
		$total = 0;
		$returnData = array();
		foreach($options as $option) {
			$total += $option['Value'];
			$results[$option['Label']] = $option['Value'];
		}
		$returnData['set'] = max($results);
		$returnData['total'] = $total;

		return $returnData;
	}	

}
