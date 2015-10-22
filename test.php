<?php
header("Content-Type: text/html; charset=utf-8");
require_once ('./includes/initialize.php');

$smarty->display('test.tpl');

//  $(document).ready(
//                  function() { 
//                        var h = $("#panel1").height(); 
//                        $("#panel2").height(h);
//                                }
//                            );