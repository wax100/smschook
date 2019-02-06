<?php
/**
 * Build the setup options form.
 */
$exists = $chunks = false;
$output = null;
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
	case xPDOTransport::ACTION_INSTALL:
		break;

	case xPDOTransport::ACTION_UPGRADE:
		break;

	case xPDOTransport::ACTION_UNINSTALL: break;
}

$output = '';

return $output;