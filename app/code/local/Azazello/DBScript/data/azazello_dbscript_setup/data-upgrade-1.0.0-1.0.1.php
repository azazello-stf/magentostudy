<?php

$tickets = Mage::getModel('azazello_dbscript/ticket')
    ->getCollection();

foreach ($tickets as $ticket) {
    $ticket->setCreatedAt(strftime('%Y-%m-%d %H:%M:%S', time() - 3600))
        ->save();
}