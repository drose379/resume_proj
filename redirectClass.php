<?php

class redirect {

public function redirect($file) {
	header("Location: http://".$file.");
}

}