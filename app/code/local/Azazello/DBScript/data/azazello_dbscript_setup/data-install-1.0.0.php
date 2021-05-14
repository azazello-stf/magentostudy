<?php

$tickets = array(
    array(
        'title' => 'Broken cart',
        'description' => 'lorem Ipsum',
    ),
    array(
        'title' => 'login issues',
        'description' => 'Not working auth form in IE'
    )
);

foreach($tickets as $ticket){
    Mage::getModel('azazello_dbscript/ticket')
        ->setData($ticket)
        ->save();
}