<?php
	if( $_POST['advice-input'] ){ $message = "Someone submitted this to the advice form: " . $_POST['advice-input']; }

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) { mail('advice@ubyssey.ca', 'New advice submission', $message );
	}

	header('Location: http://ubyssey.ca/advice-form-submitted/');

	//test