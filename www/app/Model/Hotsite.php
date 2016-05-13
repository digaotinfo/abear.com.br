<?
class Hotsite extends AppModel{
	var $useTable = 'tb_hotsites';

	var $order = array('Hotsite.id' => 'DESC');


	public function beforeSave($options = array()) {
		if (!empty($this->data['Hotsite']['premio_de_jornalismo_abear'])) {

			//if (strpos($this->data['Hotsite']['premio_de_jornalismo_abear'],'http://') <= 0) {
			if (!preg_match('/http/',$this->data['Hotsite']['premio_de_jornalismo_abear'])) {
			    $correcao1 = 'http://'.$this->data['Hotsite']['premio_de_jornalismo_abear'];
			    $this->data['Hotsite']['premio_de_jornalismo_abear'] = $correcao1;
			}
		}

		if (!empty($this->data['Hotsite']['agencia_abear'])) {

			//if (strpos($this->data['Hotsite']['agencia_abear'],'http://') <= 0) {
			if (!preg_match('/http/',$this->data['Hotsite']['agencia_abear'])) {
			    $correcao2 = 'http://'.$this->data['Hotsite']['agencia_abear'];
			    $this->data['Hotsite']['agencia_abear'] = $correcao2;
			}
		}

		if (!empty($this->data['Hotsite']['clube_abear'])) {

			//if (strpos($this->data['Hotsite']['clube_abear'],'http://') <= 0) {
			if (!preg_match('/http/',$this->data['Hotsite']['clube_abear'])) {
			    $correcao3 = 'http://'.$this->data['Hotsite']['clube_abear'];
			    $this->data['Hotsite']['clube_abear'] = $correcao3;
			}
		}

		if (!empty($this->data['Hotsite']['tudo_para_voar_melhor'])) {

			//if (strpos($this->data['Hotsite']['tudo_para_voar_melhor'],'http://') <= 0) {
			if (!preg_match('/http/',$this->data['Hotsite']['tudo_para_voar_melhor'])) {
			    $correcao4 = 'http://'.$this->data['Hotsite']['tudo_para_voar_melhor'];
			    $this->data['Hotsite']['tudo_para_voar_melhor'] = $correcao4;
			}
		}

		if (!empty($this->data['Hotsite']['transporte_de_orgaos'])) {

			//if (strpos($this->data['Hotsite']['tudo_para_voar_melhor'],'http://') <= 0) {
			if (!preg_match('/http/',$this->data['Hotsite']['transporte_de_orgaos'])) {
			    $correcao5 = 'http://'.$this->data['Hotsite']['transporte_de_orgaos'];
			    $this->data['Hotsite']['transporte_de_orgaos'] = $correcao5;
			}
		}

		return true;
	}
		
}