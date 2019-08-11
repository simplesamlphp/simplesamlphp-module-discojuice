<?php

if (empty($_REQUEST['entityID'])) {
    throw new \Exception('Missing parameter [entityID]');
} elseif (empty($_REQUEST['return'])) {
    throw new \Exception('Missing parameter [return]');
}

$djconfig = \SimpleSAML\Configuration::getOptionalConfig('discojuice.php');
$config = \SimpleSAML\Configuration::getInstance();

// EntityID
$entityid = $_REQUEST['entityID'];

// Return to...
$returnidparam = !empty($_REQUEST['returnIDParam']) ? $_REQUEST['returnIDParam'] : 'entityID';
$href = \SimpleSAML\Utils\HTTP::addURLParameters(
    $_REQUEST['return'],
    [$returnidparam => '']
);

$hostedConfig = [
    // Name of service
    $djconfig->getString('name', 'Service'),

    $entityid,
	
    // Url to response
    \SimpleSAML\Module::getModuleURL('discojuice/response.html'),
	
    // Set of feeds to subscribe to.
    $djconfig->getArray('feeds', ['edugain']), 
	
    $href
];

/*
    "a.signin", "Teest Demooo",
    "https://example.org/saml2/entityid",
    "' . \SimpleSAML\Module::getModuleURL('discojuice/discojuice/discojuiceDiscoveryResponse.html') . '", ["kalmar"], "http://example.org/login?idp="
*/

$t = new \SimpleSAML\XHTML\Template($config, 'discojuice:central.tpl.php');
$t->data['hostedConfig'] = $hostedConfig;
$t->data['enableCentralStorage'] = $djconfig->getBoolean('enableCentralStorage', true);
$t->data['additionalFeeds'] = $djconfig->getArray('additionalFeeds', null);
$t->show();



