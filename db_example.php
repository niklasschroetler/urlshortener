<?php
    $DB_NAME = 'Your database name';
    $DB_USERNAME = 'Your username';
    $DB_PASSWORD = 'Your password';
    $DB_PREFIX = 'Prefix to database names';
    $DB_SERVER = 'Database URL';

    $EMPTY_TARGET = 'Your 404';							// Will be directed to, if no slug is supplied
    $CONNECTION_UNSUCCESSFUL_TARGET = 'Your 500';		// Will be directed to, if database connection is unsuccessful
    $LOOKUP_UNSUCCESSFUL_TARGET = 'Your 404';			// Will be directed to, if looked up slug returns no result
    $INTERNAL_ERROR_TARGET = 'Your 500';				// Will be directed to, if an error occurs while lookup
    $TEMPDISABLED_TARGET = 'Your 503';					// Will be directed to, if slug is temporarily disabled
    $REMOVED_TARGET = 'Your 410';						// Will be directed to, if slug was deleted

    $debug = true;
?>