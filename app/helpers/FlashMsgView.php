<?php
/*
	Example of use
	FlashMsgView::add(MsgType::Error, "Nombre de usuario o password incorrecto");
	FlashMsgView::add(MsgType::Error, "Errorazo 2");
	FlashMsgView::add(MsgType::Warning, "Cuidadoo que");
	FlashMsgView::add(MsgType::Warning, "Cuidadoo que2");
	FlashMsgView::display(MsgType::Error);
*/
class FlashMsgView extends FlashMsg {

	static function displayAsList($type) {
		$msjs = self::get($type);
		$class = self::getCssClass($type);
		$content = "";
		foreach ($msjs as $msj) {
			$content .= "<li><p class='".$class."'>".$msj."</p></li>"; 	
		}
		$content = "<ul>$content</ul>";
		echo $content;
	}

	static function display($type) {
		$msjs = self::get($type);
		$class = self::getCssClass($type);
		$content = "";
		foreach ($msjs as $msj) {
			$content .= '<div class="alert '.$class.'"><button class="close" data-dismiss="alert"></button>'.$msj.'</div>'; 	
		}
		$content = "<div>$content</div>";
		echo $content;
	}

	static function displayAll() {
		self::display(MsgType::Error);
		self::display(MsgType::Warning);
		self::display(MsgType::Successful);
	}

	static function getCssClass($type) {
		switch ($type) {
			case MsgType::Error:
				return 'alert-error';
				break;
			case MsgType::Warning:
				return 'alert-warning';
				break;
			case MsgType::Successful:
				return 'alert-success';
				break;
		}
		return "";
	}

}

?>