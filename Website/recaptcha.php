<?php

if (isset($_POST['submit'])) {
  $secret = "6LfWFDgmAAAAAJ8bgjDvoMBpABAqMT4Cr-40B4Aa";
  $response = $_POST['g-recaptcha-response'];
  $remoteip = $_SERVER['REMOTE_ADDR'];
  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
  $data = file_get_contents($url);
  $row = json_decode($data, true);
}
