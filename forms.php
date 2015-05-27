<?php
require_once(dirname(__FILE__) . '/../../config.php');
require_once("$CFG->libdir/formslib.php");


class form extends moodleform{
	public function definition(){
		
		global $PAGE, $CFG, $OUTPUT, $DB;
		
		$mform =& $this->_form;
		$selectData = $DB->get_records('local_omegasync');
		
		$uAcademica = array('Todas');
		$pAcademico = array('');
		$facultad = array('');
		
		foreach($selectData as $data){
			$uAcademica = $uAcademica + array($data->unidad_academica => $data->unidad_academica);
			$pAcademico = $pAcademico + array($data->id => $data->periodo_academico);
			$facultad = $facultad + array($data->facultad => $data->facultad);
		}
		
		$mform->addElement('select', 'uAcademica', 'Unidad Academica:', $uAcademica);
		$mform->setType('uAcademica', PARAM_TEXT);
		$mform->addElement('select', 'pAcademico', 'Periodo Academico:', $pAcademico);
		$mform->addElement('select', 'facultad', 'Facultad:', $facultad);
		$mform->addElement('select', 'estado', 'Activo:', array('Activar', 'Desactivar'));
		
		$buttonarray=array();
			$buttonarray[] = &$mform->createElement('submit', 'submitbutton', 'Crear');
			$buttonarray[] = &$mform->createElement('cancel');
			$mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
			$mform->closeHeaderBefore('buttonar');
		
		//$PAGE->requires->js_init_call('autocomplete', array('uacademica'=>$uAcademica,'pacademico'=>$pAcademico,'facultad'=>$facultad));
		
		
	}
}		
?>





