<?php if(!function_exists('startedIndexPhp')) { header("location:../index.php"); exit;}

/**
* misc settingss and configuration-variables
*
* Do not edit this file to customize!
* - most db-settings are overwritten by .settings/db_settings.inc
* - use "customize.inc.php" in streber's root to overwrite any of this settings
*/


/**
* assoc. array holding initial configuration variables
*/
global $g_config;
$g_config= array(

	'STREBER_VERSION'       => '0.0793',
	'STREBER_VERSION_DATE'  => '2007-02-07',

    'APP_NAME'              => 'streber',
    'APP_PAGE_URL'          => 'http://www.streber-pm.org',
	'PHP_VERSION_REQUIRED'	=>	'5.0.0',
	'INCLUDE_PATH'		    => ".",
	'DIR_STREBER'           => "./",
	'DIR_TEMP'              => "./_tmp/",
	'DIR_FILES'             => "./_files/",
    'DIR_SETTINGS'          => "./_settings/",
	'FILE_DB_SETTINGS'      => 'db_settings.php',


    /**
    * default-language
    * - this is directy mapped to "/lang/??.inc.php"
    * - be sure it's lowercase
    */
    'DEFAULT_LANGUAGE'      => 'en',


    /**
    * if you plan to use notification mails, set this to url of your streber installation
    * - they are automatically initialized further down below in this file
    */
    'SELF_URL'              => '',
    'SELF_DOMAIN'           => '',
    'SELF_PROTOCOL'         => '',

    /**
    * title diplay in header
    */
	'APP_TITLE_HEADER'      => "streber<span class=extend>PM</span>",

    /**
    * - the database version is stored in the db-table inside the row with updated=NULL
    * - this version is checked on installation and before logging in (if no cookie provided)
    *
    * - additionally the current db-version is set by DB_VERSION in _settings/db_settings.inc
    */
	'DB_VERSION_REQUIRED'   => '0.0793',


    /**
    * url to online-help
    */
	'STREBER_WIKI_URL'      => 'http://www.streber-pm.org/index.php?go=search&search_query=',

    /**
    * version of databases created by installation
	*
	* this fields are overwritten by settings/db_settings.inc which is
	* been created by "install/install.php"
	*
    */
    'DB_TYPE'               => 'mysql',     # mysql is default
    'DB_TYPES'              => array(),     # init defined database-types in db_types.inc
    'HOSTNAME'              => 'localhost',
	'DB_CREATE_VERSION'     => '0.0793',     # sql-dump loaded from /_install/-directory at installation
	'DB_CREATE_STREBER_VERSION_REQUIRED' => '0.0793',

    'DB_USERNAME'           =>'',
    'DB_PASSWORD'           =>'',
    'DB_NAME'               =>'',
    'DB_TABLE_PREFIX'       =>'',
    'DB_VERSION'            =>'',           # current version (set to DB_CREATE_VERSION at install) / validated at startup to complain for upgrade

    /**
    * if not null, is set on startup. Suggested setting for development with mysql5 is
    *
    * "STRICT_ALL_TABLES,STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"
    */
    'SQL_MODE'              =>NULL,
    /**
    * in some situations (when upgrading with mysql4) you might have to disable this options
    * to avoid invalid display of characters
    */
    'DB_USE_UTF8_ENCODING'  =>true,

	/**
	* minium required length/complexity of entered password
	*
	* numbers and special-chars weight more than normal chars, so values above 8 are ok
	*/
	'CHECK_PASSWORD_LEVEL'  => 8,
	'PERSON_PROFILE_DEFAULT'=> PROFILE_DEVELOPER,

	/**
	* this will measure the microtimes for some rendering and db-processes.
	* For those you explicitly have to add measure_start(id) and measure_stop(id)
	* functions.
	*
	* see std/profile.inc
	*/
	'USE_PROFILER'          =>false,

    /**
    * Display error-output, which would have been written to error.log as html.
    * This might corrupt the html-structure and reveal internal information to user,
    * should only be used for development.
    */
    'DISPLAY_ERROR_FULL'    =>false,

    /**
    * List occured errors in footer to non-admin-users. Details are always written to 'errors.log'
    *
    * - NONE    - don't output anything
    * - LIST    - list messages only (default)
    * - DETAILS - also show file / line-number
    */
    'DISPLAY_ERROR_LIST'    =>'LIST',

    /**
    * add log-messages to errors.log
    *
    * combine with '|':
    *
    * - LOG_MESSAGE_LOGIN_FAILURE
    * - LOG_MESSAGE_LOGIN_SUCCESS
    * - LOG_MESSAGE_LOGOUT
    * - LOG_MESSAGE_DEBUG       (will lead to *really* big log-files and shoud only be used for bug-hunting)
    */
    'LOG_LEVEL'     => LOG_MESSAGE_LOGIN_FAILURE|LOG_MESSAGE_LOGIN_SUCCESS|LOG_MESSAGE_LOGOUT|LOG_MESSAGE_HACKING_ALERT|LOG_MESSAGE_MISSING_FILES,

	/**
	* list undefined language-keys in the page-footer
	* - this is just for nagging. Better use lang/scan_language.pl
	*/
	'LIST_UNDEFINED_LANG_KEYS'=>false,

    /**
    * NUMBER in theme-list
    */
	'THEME_DEFAULT'         =>0,

    /**
    * change this to override the automatic selection of the locale based on the current language
    * value must be a comma-delimited list of locale names, see function setLang() for details
    * use value 'C' to disable locales entirely, useful if your system doesn't have proper locale support
    */
    'FORCE_LOCALE'          =>'',


    /**
    * additional message displayed at login-page
    * useful for display public accounts
    */
	'LOGIN_MESSAGE'         =>"",

    /**
    * size short names are truncated to
    */
    'STRING_LENGTH_SHORT'  =>14,


    /**
    * showing efforts in task list slows down rendering...
    */
    'TASK_LIST_EFFORT_COLUMN'=>false,

    'LINK_REPORT_BUGS'=> " Please help us by  <a href='http://www.streber-pm.org/2717'>reporting a bug</a>",

    /**
    * text displayed if streber can't start-up (db offline, wrong php-version, etc)
    * - it's a good habit to give the e-mail adresse of an administrator.
    */
    'MESSAGE_OFFLINE'=>"<h1>Congratulations!</h1>
                    You are one of the few people witnessing this installation of <br>
                    <a href='http://www.streber-pm.org'>streber</a> being offline. <br>Use your chance and contact
                    the <a href='mailto:admin @ is undefined com'>administrator</a> to get your special price immediately.<br><br>Problem: <b>",


    'MESSAGE_WELCOME_HOME'=>
                        "<b>Welcome</b> to streber.",

    'MESSAGE_WELCOME_ONEPROJECT'=>
                        "Hello <b>%s</b>. Welcome to project <b>%s</b> ",

    'EMAIL_ADMINISTRATOR'=>'',

    /**
    * list-color-settings (depend on javascript) overwritten by themes/XXX/theme_config.inc (included at render_page.inc)
    */
    'LIST_COLOR_ODD'        =>'#ffffff',
    'LIST_COLOR_EVEN'       =>'#f8f8f8',
    'LIST_COLOR_SELECTED'   =>'#d0ffd0',
    'LIST_COLOR_HOVER'      =>'#ffff80',


    'PROJECT_DEFAULT_LABELS' => 'Bug,Feature,Enhancement,Refactor,Idea,Research,Organize,Wiki,Docu',
    'PROJECT_DEFAULT_SETTINGS'=> PROJECT_SETTING_ALL,


    /**
    * comments on project possible (not attached to task)
    */
    'PROJECT_COMMENTS'=> false,

    /**
    * linking print-stylesheet sometimes slows down pageload for 10%-15% percent
    * turn off for maximal performance
    */
    'LINK_STYLE_PRINT'      => true,

    /**
    * use syntax highlighting for codeblocks
    */
    'LINK_STAR_LIGHT'   => false,

    /**
    * filter task-list in home
    */
    'SHOW_TASKS_AT_HOME_DEFAULT'=> SHOW_ASSIGNED_ONLY,


    /**
    * Maxium filesize for uploads (in bytes)
    * NOTE: you also have to adjust your php.ini settings for 'post_max_size' and 'upload_max_filesize'
    *
    */
    'FILE_UPLOAD_SIZE_MAX'  => 8000000,

    /**
    * Maxium size of referred variables (Text-fields like description, etc.) measured in bytes.
    */
    'STRING_SIZE_MAX'  => 256000,

    /**
    * filter html-tags
    * - to prevent from cross site scripting and code intrusion,
    *   all intered variables are by default cleared from html-tags
    *
    * 'ALLOW_HTML' - leave entered strings alone... Allows Html-formatting and code-injection(!) This option is dangerous
    * 'STRIP_TAGS' - remove all html-tags (can modify code examples!)
    * 'HTML_ENTITIES' - (default) leaves texts unchanged but renders htmlSpecials chars are html-code (converts '>' into '&gt;' '>')
    */
    'CLEAN_REFERRED_VARS'=> 'HTML_ENTITIES',

    /**
    * If server is not running in GMT your need to adjust this option
    *  e.g for GMT+1 set it to 3600   (1h * 60min * 60s)
    */
    'SERVER_TIME_OFFSET'=> 0,   # in seconds!

    /**
    * If user has autodetection of time zone enabled (is default)
    * the difference between is Javascript local time and server time
    * is rounded to full hours.
    *
    *  This helps with booking round times on efforts.
    */
    'ROUND_AUTO_DETECTED_TIME_OFFSET'=> true,

    /**
    * cookie-lifetime (in seconds)
    */
    'COOKIE_LIFETIME'=> 60*60*24*30,

    /**
    * check IP-Address (if checked, cookie is depreciated on new computers)
    */
    'CHECK_IP_ADDRESS' => true,

    /**
    * Allow anonymous browsing for one user
    *  To make project pages accessible for external users (e.g. as documentation wiki)
    *  you can make one of your people an anonymous user. If this user exists projects this
    *  user is assigned to, can be viewed without logging in.
    *
    */
    'ANONYMOUS_USER'    => false,

    'REGISTER_NEW_USERS'=> false,


    'SMTP'              =>'',
    'WORKHOURS_PER_DAY' =>10,
    'WORKDAYS_PER_WEEK' =>5,

    /**
    * How daygraph of efforts will be drawn.
    *  DAYGRAPH_START_HOUR - from which hour daygreph will be drawn 0-24
    *  DAYGRAPH_END_HOUR - till which hour daygreph will be drawn 0-24
    *  DAYGRAPH_WIDTH - width of daygraph in pixels
    */
    'DAYGRAPH_START_HOUR' =>8,
    'DAYGRAPH_END_HOUR'   =>22,
    'DAYGRAPH_WIDTH'      =>200,

    /**
    * automatically insert ids of to links in wiki texts
    *  e.g. [[blabla]] -> [[item:23|blabla]]
    */
    'WIKI_AUTO_INSERT_IDS'      =>true,

    /**
    * use mod_rewrite clean urls
    */
    'USE_MOD_REWRITE'=>false,

    /**
    * posts by anonymous users are rejected, if they contain any of these keys.
    * The value is an indicator for spam probability.
    */
	'SPAM_WORDS'=>array('viagra'=>10, 'cialis'=>10, 'porn'=>10, 'sex'=>2, 'free'=>1, 'href'=>2, 'online'=>1, 'casino'=>3, 'buy'=>1,'order'=>2,'levitra'=>5,'softtabs'=>5, 'spam'=>1, 'site'=>2),

    /**
    * if not 0 try to match SPAM_WORDS on comments and descriptions.
    * - it calculates a probability depending on size and number of matches:
    *   0.001  - strict
    *   0.01   - friendly
    *   0.1    - loose
    */
    'REJECT_SPAM_CONTENT' => 0.1,
);



/**
* try to figure out url installation for links from notification mails
*/
if(isset($_SERVER['SCRIPT_NAME']) && $_SERVER['HTTP_HOST'] && preg_match("/\/index\.php/",$_SERVER['SCRIPT_NAME'])) {

    $url= asCleanString($_SERVER['HTTP_HOST'] .$_SERVER['SCRIPT_NAME']);

    confChange('SELF_URL', $url);
}

/**
* adjust url-prefix if https
* NOTE:
* - for installations at https, the urls in notifications-mails has to start with
*   https://www.somedome.com/
*/
if(!confGet('SELF_PROTOCOL')) {
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        confChange('SELF_PROTOCOL','https');
    }
    else {
        confChange('SELF_PROTOCOL','http');
    }
}


/**
* get domain for email-address
*/
if(!confGet('SELF_DOMAIN') && isset($_SERVER["HTTP_HOST"])) {
	confChange('SELF_DOMAIN', $_SERVER["HTTP_HOST"]);
}

/**
* set administrator-address (this should be set in customize.inc)
* - this address is used in errors, etc.
*/
if(!confGet('EMAIL_ADMINISTRATOR') && isset($_SERVER["HTTP_HOST"])) {
    confChange('EMAIL_ADMINISTRATOR','admin@'. confGet('SELF_DOMAIN'));
}


/**
* maps directory name => Title in person profile
*/
$g_themes=array(
	'clean'         => 'Clean',
	'webbplatsen'   => 'webbplatsen',
    'custom'        => 'Custom',
	'webbplatsen_dark'=> 'webbplatsen_dark',
#    'default'=>'Default',
#    'forclients' =>'Client Theme',
#    'classic' =>'Classic Theme',

);
$g_theme_names=array_keys($g_themes);



/**
* default role when added to projects
*
* Don't get confuse about User-rights, user-profile and project-rights.
* Profiles are some kind of template to quickly INITIALIZE user-rights
* and project-roles. These values are COPIED into the "person.user_rights"
* and the "projectperson.*_level".
*
* Don't be affraid to add new profiles here, but keep up the order of
* already assigned profiles.
*
* @@@ mental-note on g_user_profiles:
* - we could use this to customize the views for different people
*   (not styling with themes, but hiding complete blocks, functions, etc.)
*
* get profile like this:
*
* $profile=$g_user_profiles[ $g_user_profile_names[$person->profile] ];
*
* when initializing projectPersons, all defined (and useful) settings of
* the profile are copied. To avoid reinitiating, comment the lines.
*/




$g_user_profiles=array(
    PROFILE_USER=>array(
        'default_user_rights'   => RIGHT_PERSON_EDIT_SELF,
        'level_create'          => PUB_LEVEL_OPEN,
        'level_edit'            => PUB_LEVEL_OPEN,
        'level_view'            => PUB_LEVEL_OPEN,
        'level_delete'          => PUB_LEVEL_PRIVATE,
        'level_reduce'          => PUB_LEVEL_OPEN,
    ),
    PROFILE_ADMIN=>array(
        'default_user_rights'   =>RIGHT_ALL,
        'level_view'            => PUB_LEVEL_SUGGESTED,
        'level_create'          => PUB_LEVEL_CLIENTEDIT,
        'level_edit'            => PUB_LEVEL_SUGGESTED,
        'level_delete'          => PUB_LEVEL_SUGGESTED,
        'level_reduce'          => PUB_LEVEL_PRIVATE,
    ),
    PROFILE_PM=>array(
        'default_user_rights'   => RIGHT_ALL & (~RIGHT_PERSON_EDIT_RIGHTS) ,
        'level_view'            => PUB_LEVEL_SUGGESTED,
        'level_create'          => PUB_LEVEL_CLIENTEDIT,
        'level_edit'            => PUB_LEVEL_SUGGESTED,
        'level_delete'          => PUB_LEVEL_SUGGESTED,
        'level_reduce'          => PUB_LEVEL_PRIVATE,
    ),
    PROFILE_DEVELOPER=>array(
        'default_user_rights'   => RIGHT_PERSON_EDIT_SELF,
        'level_create'          => PUB_LEVEL_OPEN,
        'level_edit'            => PUB_LEVEL_OPEN,
        'level_view'            => PUB_LEVEL_OPEN,
        'level_delete'          => PUB_LEVEL_PRIVATE,
        'level_reduce'          => PUB_LEVEL_OPEN,
    ),
    PROFILE_ARTIST=>array(
        'default_user_rights'   =>RIGHT_PERSON_EDIT_SELF,
        'level_create'          => PUB_LEVEL_OPEN,
        'level_edit'            => PUB_LEVEL_OPEN,
        'level_view'            => PUB_LEVEL_OPEN,
        'level_delete'          => PUB_LEVEL_PRIVATE,
        'level_reduce'          => PUB_LEVEL_OPEN,
    ),
    PROFILE_TESTER=>array(
        'default_user_rights'   =>RIGHT_PERSON_EDIT_SELF,
        'level_create'          => PUB_LEVEL_OPEN,
        'level_edit'            => PUB_LEVEL_OPEN,
        'level_view'            => PUB_LEVEL_OPEN,
        'level_delete'          => PUB_LEVEL_PRIVATE,
        'level_reduce'          => PUB_LEVEL_OPEN,
    ),
    PROFILE_CLIENT=>array(
        'default_user_rights'   => RIGHT_PERSON_EDIT_SELF,
        'level_create'          => PUB_LEVEL_SUGGESTED,
        'level_edit'            => PUB_LEVEL_CLIENTEDIT,
        'level_view'            => PUB_LEVEL_CLIENT,
        'level_delete'          => PUB_LEVEL_NOTHING,
        'level_reduce'          => PUB_LEVEL_NOTHING,
    ),
    PROFILE_CLIENT_TRUSTED=>array(
        'default_user_rights'   => RIGHT_PERSON_EDIT_SELF,
        'level_create'          => PUB_LEVEL_SUGGESTED,
        'level_edit'            => PUB_LEVEL_CLIENTEDIT,
        'level_view'            => PUB_LEVEL_OPEN,
        'level_delete'          => PUB_LEVEL_CLIENTEDIT,
        'level_reduce'          => PUB_LEVEL_NOTHING,
    ),
    PROFILE_GUEST=>array(
        'default_user_rights'   => RIGHT_NONE,
        'level_create'          => PUB_LEVEL_SUGGESTED,
        'level_edit'            => PUB_LEVEL_NOTHING,
        'level_view'            => PUB_LEVEL_CLIENT,
        'level_delete'          => PUB_LEVEL_NOTHING,
        'level_reduce'          => PUB_LEVEL_NOTHING,
    ),
);


$g_languages=array(
    'en'=>'English',
    'de'=>'German',
    'fr'=>'French',
    'pl'=>'Polish',
    'pt-br'=>'Portugese',
    'sk'=>'Slovak',
    'no'=>'Norwegian',
    'sv'=>'Swedish',
    'it'=>'Italian',
    'es'=>'Spanish',
    'fi'=>'Finish',
);
$g_language_names= array_keys($g_languages);


/**
* get an configuration-variable. Complain if not defined.
*
* @@@put this function somewhere else
*/
function confGet($var) {
	global $g_config;
	if(isset($g_config[$var]) || @$g_config[$var] === NULL) {
		return $g_config[$var];
	}
	else {
	    trigger_error("requesting undefined config variable '$var'",E_USER_NOTICE);
	}
	return NULL;
}


/**
* changes a configuration-variable, but complains if not defined
*
* @@@put this function somewhere else
*/
function confChange($var,$value) {
	global $g_config;
	if(!isset($g_config[$var]) && !is_null($g_config[$var])) {
	    trigger_error("confChange set undefined variable '$var' to '$value'",E_USER_NOTICE);

	}
    $g_config[$var]= $value;
    return true;
}


/**
* appends to a configuration-variable
* complains if...
* - variable is not defined
* - variable is not an array (it will be converted into array with two elements)
*/
function confAppendToValue($var,$value) {
	global $g_config;
	if(!isset($g_config[$var]) && !is_null($g_config[$var])) {
	    trigger_error("confChange set undefined variable '$var' to array('$value')",E_USER_NOTICE);
	    $g_config[$var]= array($value);
	    return true;
	}
	else if(!is_array($g_config[$var])) {
	    trigger_error("confChange converting '$var' to array('$value')",E_USER_NOTICE);
	    $g_config[$var]=array($g_config[$var], $value);
	    return true;
	}
	else {
        $g_config[$var][]= $value;
    }
    return true;
}



/**
* return a valid link to streber's wiki documentation...
*
* @@@put this function somewhere else
*/
function getStreberWikiLink($pagename=NULL,$displayname=NULL) {
    if(!$pagename) {
	    trigger_error("getStreberWikiLink() requires pagename",E_USER_NOTICE);

    }
    if(!$displayname) {
        $displayname= $pagename;
    }
    return "<a href=\"". confGet('STREBER_WIKI_URL')."$pagename\">$displayname</a>";
}

?>
