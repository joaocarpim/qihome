<?php
public function store (Request, request) {
    $request->validate([
	    'g-recaptcha-response' => 'required|captcha'
    ]);    
}
?>