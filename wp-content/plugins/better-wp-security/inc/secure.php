<?php

if ( ! class_exists( 'bwps_secure' ) ) {

	class bwps_secure extends bit51_bwps {
	
		/**
		 * Constructor for each and every page load
		 *
		 **/		 
		function __construct() {
			
			global $bwpsoptions;
			
			//Don't redirect any SSL if SSL is turned off.
			if ( $bwpsoptions['ssl_frontend']  >= 1 ) {
				add_action( 'template_redirect', array( &$this, 'sslredirect' ) );
			}
			
			//execute default checks
			add_action( 'init', array( &$this, 'siteinit' ) );
			add_action( 'wp_head', array( &$this,'check404' ) );
			
			//remove wp-generator meta tag
			if ( $bwpsoptions['st_generator'] == 1 ) { 
				remove_action( 'wp_head', 'wp_generator' );
			}
			
			//remove login error messages if turned on
			if ( $bwpsoptions['st_loginerror'] == 1 ) {
				add_filter( 'login_errors', create_function( '$a', 'return null;' ) );
			}
			
			//remove wlmanifest link if turned on
			if ( $bwpsoptions['st_manifest'] == 1 ) {
				remove_action( 'wp_head', 'wlwmanifest_link' );
			}
			
			//remove rsd link from header if turned on
			if ( $bwpsoptions['st_edituri'] == 1 ) {
				remove_action( 'wp_head', 'rsd_link' );
			}
			
			//ban extra-long urls if turned on
			if ( $bwpsoptions['st_longurl'] == 1 && ! is_admin() ) {
			
				if ( strlen( $_SERVER['REQUEST_URI'] ) > 255 ||
				
					strpos( $_SERVER['REQUEST_URI'], "eval(" ) ||
					strpos( $_SERVER['REQUEST_URI'], "CONCAT" ) ||
					strpos( $_SERVER['REQUEST_URI'], "UNION+SELECT" ) ||
					strpos( $_SERVER['REQUEST_URI'], "base64" ) ) {
					@header( "HTTP/1.1 414 Request-URI Too Long" );
					@header( "Status: 414 Request-URI Too Long" );
					@header( "Connection: Close" );
					@exit;
					
				}
				
			}
			
			//require strong passwords if turned on
			if ( $bwpsoptions['st_enablepassword'] == 1 ) {
				add_action( 'user_profile_update_errors',  array( &$this, 'strongpass' ), 0, 3 );
				
				if ( isset( $_GET['action'] ) && ( $_GET['action'] == 'rp' || $_GET['action'] == 'resetpass' ) && isset( $_GET['login'] ) ) {
					add_action( 'login_head', array( &$this, 'passwordreset' ) );
				}

			}
			
			//display random number for wordpress version if turned on
			if ( $bwpsoptions['st_randomversion'] == 1 ) {
				add_action( 'init', array( &$this, 'randomVersion' ) );
			}
			
			//remove theme update notifications if turned on
			if ( $bwpsoptions['st_themenot'] == 1 ) {
				add_action( 'init', array( &$this, 'themeupdates' ) );
			}
			
			//remove plugin update notifications if turned on
			if ( $bwpsoptions['st_pluginnot'] == 1 ) {
				add_action( 'init', array( &$this, 'pluginupdates' ) );
			}
			
			//remove core update notifications if turned on
			if ( $bwpsoptions['st_corenot'] == 1 ) {
				add_action( 'init', array( &$this, 'coreupdates' ) );
			}
			
			add_action( 'init', array( &$this, 'backup' ) );
			
			add_action( 'init', array( &$this, 'filecheck' ) );
		
		}
		
		/**
		 * Creates backup object for processing
		 *
		 **/
		function backup() {
		
			if ( ! is_404() ) {
			
				global $bwps_backup; //allow backup object to be accessed elsewhere
		
				//execute backups
				require_once( plugin_dir_path( __FILE__ ) . 'backup.php' );
				$bwps_backup = new bwps_backup();
			
			}
			
		}
		
		/**
		 * Check if page is 404
		 *
		 * Checks if current resource is a 404 and logs accordingly
		 *
		 **/
		function check404() {
		
			global $wpdb;
			
			if ( is_404() ) { //if we're on a 404 page
				$this->logevent( 2 );
			}
			
		}
		
		/**
		 * Check if away mode restrictions are active
		 *
		 * Checks if away mode is on and if the current time is in restrictions
		 *
		 * @return bool true if current time is restricted, false if not
		 *
		 **/
		function checkaway() {
		
			global $bwpsoptions;
			
			$cTime = strtotime( get_date_from_gmt( date( 'Y-m-d H:i:s', time() ) ) );
			
			$offsettime = time() + ( get_option( 'gmt_offset' ) * 60 * 60 );
			
			if ( $bwpsoptions['am_type'] == 1 ) { //set up for daily
			
				if ( $bwpsoptions['am_starttime'] < $bwpsoptions['am_endtime'] ) { //starts and ends on same calendar day
				
					$start = strtotime( date( 'n/j/y', $offsettime ) . ' ' . date( 'g:i a', $bwpsoptions['am_starttime'] ) );
					$end = strtotime( date( 'n/j/y', $offsettime ) . ' ' . date( 'g:i a', $bwpsoptions['am_endtime'] ) );
					
				} else {
				
					if ( strtotime( date( 'n/j/y', $offsettime ) . ' ' . date( 'g:i a', $bwpsoptions['am_starttime'] ) ) <= $cTime ) { 
				
						$start = strtotime( date( 'n/j/y', $offsettime ) . ' ' . date( 'g:i a', $bwpsoptions['am_starttime'] ) );
						$end = strtotime( date( 'n/j/y', ( $offsettime + 86400 ) ) . ' ' . date( 'g:i a', $bwpsoptions['am_endtime'] ) );
						
					} else {
					
						$start = strtotime( date( 'n/j/y', $offsettime - 86400 ) . ' ' . date( 'g:i a', $bwpsoptions['am_starttime'] ) );
						$end = strtotime( date( 'n/j/y', ( $offsettime ) ) . ' ' . date( 'g:i a', $bwpsoptions['am_endtime'] ) );
					
					}
					
				}
				
			} else { //one time settings
			
				$start = strtotime( date( 'n/j/y', $bwpsoptions['am_startdate'] ) . ' ' . date( 'g:i a', $bwpsoptions['am_starttime'] ) );
				$end = strtotime( date( 'n/j/y', $bwpsoptions['am_enddate'] ) . ' ' . date( 'g:i a', $bwpsoptions['am_endtime'] ) );
			
			}
				
			if ( $bwpsoptions['am_enabled'] == 1 && $start <= $cTime && $end >= $cTime ) { //if away mode is enabled continue

				return true; //time restriction is current
				
			}
			
			return false; //they are allowed to log in
			
		}
		
		/**
		 * Check if IP is in list
		 *
		 * Checks a given ip against a list to see if it is present
		 *
		 * @param string $list List of IPs to check against delimited by \n
		 * @param string $rawhost[optional] Hostname to check in the list or use current host
		 * @return bool true if IP is in list, false if not
		 *
		 **/
		function checklist( $list, $rawhost = '' ) {
		
			global $wpdb;
			
			//convert list to array
			$values = explode( "\n", $list );
			
			//use current host if host is not provided
			if ( $rawhost == '' ) {
				$rawhost = $wpdb->escape( $_SERVER['REMOTE_ADDR'] );
			}
			
			$host = ip2long( $rawhost );
			
			foreach ( $values as $item ) { //loop through each line of input
			
				$ipParts = explode( '.',$item );
				$i = 0;
				$ipa = '';
				$ipb = '';
					
				foreach ( $ipParts as $part ) {
					
					if ( strstr( $part, '*' ) ) { //is there are wildcard
						
						$ipa .= '0';
						$ipb .= '255';
							
					} else {
						
						$ipa .= $part;
						$ipb .= $part;
							
					}
						
					if ( $i < 3 ) {
						
						$ipa .= '.';
						$ipb .= '.';
					}
						
					$i++;
						
				}
					
				if ( strcmp( $ipa, $ipb ) != 0 ) { //see if we have another range
					
					if( $host >= ip2long( trim( $ipa ) ) && $host <= ip2long( trim( $ipb ) ) ) { //if host is in range
						return true;
					}
						
				} else {
					
					if ( trim( $rawhost ) == trim( $item ) ) { //if it matches directly
						return true;
					} 
						
				}
				
			}
			
			return false;
			
		}
		
		/**
		 * Check for lockout
		 *
		 * Checks to see if specified user or current host are locked out
		 *
		 * @param string $username[optional] Username to check
		 * @return bool True if locked out false if not
		 *
		 **/
		function checklock( $username = '' ) {
		
			global $wpdb;
			
			$userCheck = false;
			
			if ( strlen( $username ) > 0 ) { //if a username was entered check to see if it's locked out
			
				$username = sanitize_user( $username );
				$user = get_user_by( 'login', $username );
		
				if ( $user ) {
					$userCheck = $wpdb->get_var( "SELECT `user` FROM `" . $wpdb->base_prefix . "bwps_lockouts` WHERE `exptime` > " . time(). " AND `user` = " . $user->ID . " AND `active` = 1;" );
				}
				
			} else { //no username to be locked out
			
				$userCheck = false;
				
			}
					
			//see if the host is locked out
			$hostCheck = $wpdb->get_var( "SELECT `host` FROM `" . $wpdb->base_prefix . "bwps_lockouts` WHERE `exptime` > " . time(). " AND `host` = '" . $wpdb->escape( $_SERVER['REMOTE_ADDR'] ) . "' AND `active` = 1;" );
				
			//return false if both the user and the host are not locked out	
			if ( ! $userCheck && ! $hostCheck ) {
			
				return false;
				
			} else {
			
				return true;
				
			}
			
		}
		
		/**
		 * Check for SSL
		 *
		 * Determines whether the current URL is SSL or not
		 *
		 * @return bool true if ssl false if not
		 *
		 **/
		function checkssl() {
			
			if ( $_SERVER['SERVER_PORT'] == '443' ) {
				return true;
			} else {
				return false;
			}
			
		}
		
		/**
		 * Prevent non-admin users from seeing core updates
		 *
		 **/
		function coreupdates() {
		
			if ( ! current_user_can( 'manage_options' ) ) {
			
				remove_action( 'admin_notices', 'update_nag', 3 );
				add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
				wp_clear_scheduled_hook( 'wp_version_check' );
				
			}
			
		}
		
		/**
		 * Creates backup object for processing
		 *
		 **/
		function filecheck() {
		
			if ( ! is_404() ) { //don't execute on 404 errors
			
				global $bwps_filecheck;
		
				//execute backups
				require_once( plugin_dir_path( __FILE__ ) . 'filecheck.php' );
				$bwps_filecheck = new bwps_filecheck();
											
			}
			
		}
		
		/**
		 * Lockout user or host
		 *
		 * Locks out user or host and notifies admin if enabled
		 *
		 * @param int $type Type of event to log 1 for bad login, 2 for 404
		 * @param string $username[optional] Username of bad login user (if applicable)
		 *
		 **/
		function lockout( $type, $user = '' ) {
		
			global $wpdb, $bwpsoptions;
					
			$currtime = time(); //current time
					
			if ( $type == 1 ) { //due to too many logins
			
				$exptime = $currtime + ( 60 * $bwpsoptions['ll_banperiod'] );
				
			} else { //due to too many 404s
			
				$exptime = $currtime + ( 60 * $bwpsoptions['id_banperiod'] );
				
			}
			
			//lockout user if needed	
			if ( $type == 1 || ( $type == 2 && ! is_user_logged_in() && $this->checklist( $bwpsoptions['id_whitelist'] ) == false ) ) {
			
				if ( $user != '' ) {
				
					$wpdb->insert(
						$wpdb->base_prefix . 'bwps_lockouts',
						array(
							'type' => $type,
							'active' => 1,
							'starttime' => $currtime,
							'exptime' => $exptime,
							'host' => 0,
							'user' => $user
						)
					);
					
				}
				
				if ( filter_var( $wpdb->escape( $_SERVER['REMOTE_ADDR'] ), FILTER_VALIDATE_IP ) && ( $bwpsoptions['id_blacklistip'] == 1 || $bwpsoptions['ll_blacklistip'] == 1 ) ) {
				
					if ( $bwpsoptions['id_blacklistip'] == 1 && $bwpsoptions['ll_blacklistip'] == 1 ) {
				
						$locklimit = min( $bwpsoptions['ll_blacklistipthreshold'], $bwpsoptions['id_blacklistipthreshold'] );
						$lockcount = $wpdb->get_var( "SELECT COUNT(*) FROM `" . $wpdb->base_prefix . "bwps_lockouts` WHERE host='" . $wpdb->escape( $_SERVER['REMOTE_ADDR'] ) . "';" );
					
					} elseif ( $bwpsoptions['id_blacklistip'] == 1 ) {
						
						$locklimit = $bwpsoptions['id_blacklistipthreshold'];
						$lockcount = $wpdb->get_var( "SELECT COUNT(*) FROM `" . $wpdb->base_prefix . "bwps_lockouts` WHERE type=2 AND host='" . $wpdb->escape( $_SERVER['REMOTE_ADDR'] ) . "';" );
				
					} elseif ( $bwpsoptions['ll_blacklistip'] == 1 ) {
						
						$locklimit = $bwpsoptions['ll_blacklistipthreshold'];
						$lockcount = $wpdb->get_var( "SELECT COUNT(*) FROM `" . $wpdb->base_prefix . "bwps_lockouts` WHERE type =1 AND host='" . $wpdb->escape( $_SERVER['REMOTE_ADDR'] ) . "';" );
				
					} 
					
				} else {
					
					$locklimit = false;
					$lockcount = 0;
					
				}
				
				//die( 'Locklimit = ' . $locklimit . ', lockcount = ' . $lockcount );
				
				if ( $locklimit !== false && $lockcount >= $locklimit ) {
				
					@ini_set( 'auto_detect_line_endings', true );

					$bwpsoptions['bu_enabled'] = 1;
					$banlist = explode( PHP_EOL, $bwpsoptions['bu_banlist'] );
					
					$banlist[] = $wpdb->escape( $_SERVER['REMOTE_ADDR'] );
					
					$bwpsoptions['bu_banlist'] = implode( PHP_EOL, $banlist );
					
					if ( is_multisite() ) {
			
						switch_to_blog( 1 );
			
						update_option( $this->primarysettings, $bwpsoptions );
			
						restore_current_blog();
			
					} else {
			
						update_option( $this->primarysettings, $bwpsoptions );
				
					}
				
				}
				
				if ( $locklimit !== false && $lockcount >= $locklimit && ( strstr( strtolower( $_SERVER['SERVER_SOFTWARE'] ), 'apache' ) || strstr( strtolower( $_SERVER['SERVER_SOFTWARE'] ), 'litespeed' ) ) ) {

					$lockfiles = new bwps_admin_common();
					$lockfiles->writehtaccess();
					unset( $lockfiles );
				
				} else {
				
					//lockout host		
					$wpdb->insert(
						$wpdb->base_prefix . 'bwps_lockouts',
						array(
							'type' => $type,
							'active' => 1,
							'starttime' => $currtime,
							'exptime' => $exptime,
							'host' => $wpdb->escape( $_SERVER['REMOTE_ADDR'] ),
							'user' => ''
						)
					);
				
				}
				
				//contruct and send email if necessary
				if ( ( $type == 1 && $bwpsoptions['ll_emailnotify'] == 1 ) || ( $type == 2 && $bwpsoptions['id_emailnotify'] == 1 ) ) {
				
					//Get the right email address.
					if ( $type == 1 ) {
					
						if ( is_email( $bwpsoptions['ll_emailaddress'] ) ) {
				
							$toaddress = $bwpsoptions['ll_emailaddress'];
			
						} else {
			
							$toaddress = get_site_option( 'admin_email' );
				
						}
					
					} else {
					
						if ( is_email( $bwpsoptions['id_emailaddress'] ) ) {
				
							$toaddress = $bwpsoptions['id_emailaddress'];
			
						} else {
			
							$toaddress = get_site_option( 'admin_email' );
				
						}
						
					}
					
					$toEmail = $toaddress;
					$subEmail = '[' . get_option( 'siteurl' ) . '] ' . __( 'Site Lockout Notification', $this->hook );
					$mailHead = 'From: ' . get_bloginfo( 'name' )  . ' <' . $toEmail . '>' . "\r\n\\";
					
					if ( $type == 1 ) {
					
						$reason = __( 'too many login attempts.', $this->hook );
						
					} else {
					
						$reason = __( 'too many attempts to open a file that does not exist.', $this->hook );
						
					}
					
					if ( $user != '' ) {
					
						$username = get_user_by( 'id', $user );
						$who = __( 'WordPress user', $this->hook ) . ', ' . $username->user_login . ', ' . __( 'at host, ', $this->hook ) . $wpdb->escape( $_SERVER['REMOTE_ADDR'] ) . ', ';
						
					} else {
					
						$who = __( 'host', $this->hook ) . ', ' . $wpdb->escape( $_SERVER['REMOTE_ADDR'] ) . ', ';
						
					}
			
					$mesEmail = __( 'A ', $this->hook ) . $who . __( 'has been locked out of the WordPress site at', $this->hook ) . " " . get_bloginfo( 'url' ) . " " . __( 'until', $this->hook ) . " " . date( "l, F jS, Y \a\\t g:i:s a e", $exptime ) . ' ' . __( 'due to ', $this->hook ) . $reason . __( ' You may login to the site to manually release the lock if necessary.', $this->hook );
				
					$sendMail = wp_mail( $toEmail, $subEmail, $mesEmail, $mailHead );
					
				}
				
			}
			
		}
		
		/**
		 * Logs security related events to the database
		 *
		 * Logs security related events for bad logins or 404s to the database
		 *
		 * @param int $type Type of event to log 1 for bad login, 2 for 404
		 * @param string $username[optional] Username of bad login user (if applicable)
		 *
		 **/
		function logevent( $type, $username='' ) {
		
			global $wpdb, $bwpsoptions;
			
			if ( ( $type == 1 && $bwpsoptions['ll_enabled'] == 0 ) || ( $type == 2 && $bwpsoptions['id_enabled'] == 0 ) ) {
				return;
			}
			
			//get default data
			$host = $wpdb->escape( $_SERVER['REMOTE_ADDR'] );
			$username = sanitize_user( $username );
			$user = get_user_by( 'login', $username );
			
			if ( $type == 2 ) { //get url and referrer if 404
			
				$url = $wpdb->escape( $_SERVER['REQUEST_URI'] );
				
				if ( isset( $_SERVER['HTTP_REFERER']  ) ) {
				
					$referrer = $wpdb->escape( $_SERVER['HTTP_REFERER'] );
				
				} else {
				
					$referrer = '';
				
				}
				
			} else {
			
				$url = '';
				$referrer = '';
				
			}
			
			//log to database
			$wpdb->insert(
				$wpdb->base_prefix . 'bwps_log',
				array(
					'type' => $type,
					'timestamp' => time(),
					'host' => $host,
					'user' => isset( $user->ID ) && absint( $user->ID ) > 0 ? $user->ID : 0,
					'username' => $username,
					'url' => $url,
					'referrer' => $referrer,
					'data' => ''
				)
			);
			
			if ( $type == 1 ) { //check if we should lockout for logins
			
				$period = $bwpsoptions['ll_checkinterval'] * 60;
				
				$hostcount = $wpdb->get_var( "SELECT COUNT(*) FROM `" . $wpdb->base_prefix . "bwps_log` WHERE type=1 AND host='" . $host . "' AND timestamp > " . ( time() - $period ) . ";" );
				
				if ( isset( $user->ID ) && absint( $user->ID ) > 0 ) { //if we're dealing with a user
				
					$usercount = $wpdb->get_var( "SELECT COUNT(*) FROM `" . $wpdb->base_prefix . "bwps_log` WHERE type=1 AND user=" . $user->ID . " AND timestamp > " . ( time() - $period ) . ";" );
				} else {
				
					$usercount = 0;
					
				}
				
				if ( $usercount >= $bwpsoptions['ll_maxattemptsuser'] ) {
				
					$this->lockout( 1, $user->ID ); //lockout user
					
				} elseif  ( $hostcount >= $bwpsoptions['ll_maxattemptshost'] ) {
				
					$this->lockout( 1 ); //lockout host
					
				}
				
			} elseif ( $type == 2 ) { //check if we should lockout for 404s
			
				$period = $bwpsoptions['id_checkinterval'] * 60;
				
				$hostcount = $wpdb->get_var( "SELECT COUNT(*) FROM `" . $wpdb->base_prefix . "bwps_log` WHERE type=2 AND host='" . $host . "' AND timestamp > " . ( time() - $period ) . ";" );
				
				if ( $hostcount >= $bwpsoptions['id_threshold'] ) {
					$this->lockout( 2 );
				}
				
			}	
			
		}
				
		/**
		 * Removes plugin update notification for non-admin users
		 *
		 **/
		function pluginupdates() {
			
			if ( ! current_user_can( 'manage_options' ) ) {
			
				remove_action( 'load-update-core.php', 'wp_update_plugins' );
				add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
				wp_clear_scheduled_hook( 'wp_update_plugins' );
				
			}
			
		}
		
		/**
		 * Calculates password strength
		 *
		 * Calcultes strength of password entered using same algorithm
		 * as WordPress password meter
		 *
		 * @param string $i password to check
		 * @param string $f unknown
		 * @return int numerical strength of the password entered
		 **/
		function pwordstrength( $i, $f ) {  
		
			$h = 1; $e = 2; $b = 3; $a = 4; $d = 0; $g = null; $c = null; 
			 
			if ( strlen( $i ) < 4 )  
				return $h;  
				
			if ( strtolower( $i ) == strtolower( $f ) )  
				return $e;  
				
			if ( preg_match( "/[0-9]/", $i ) )  
				$d += 10;  
				
			if ( preg_match( "/[a-z]/", $i ) )  
				$d += 26;  
				
			if ( preg_match( "/[A-Z]/", $i ) )  
				$d += 26;  
				
			if ( preg_match( "/[^a-zA-Z0-9]/", $i ) )  
				$d += 31;  
				
			$g = log( pow( $d, strlen( $i ) ) );  
			$c = $g / log( 2 );  
			
			if ( $c < 40 )  
				return $e;  
				
			if ( $c < 56 )  
				return $b;  
				
			return $a;  
			
		}	  
		
		/**
		 * Display random WordPress version
		 *
		 * Displays a random version number instead of the actual version to non-admins
		 *
		 **/
		function randomVersion() {
		
			global $wp_version;
		
			$newVersion = rand( 100,500 );
		
			//always show real version to site administrators
			if ( ! current_user_can( 'manage_options' ) ) {
			
				$wp_version = $newVersion;
				add_filter( 'script_loader_src', array( &$this, 'remove_script_version' ), 15, 1 );
				add_filter( 'style_loader_src', array( &$this, 	'remove_script_version' ), 15, 1 );
				
			}
			
		}
		
		/**
		 * removes version number on header scripts
		 *
		 * Removes the WordPress version number on scripts in the front-end header
		 *
		 * @param string $src script source link
		 * @return string script source link without version
		 *
		 **/
		function remove_script_version( $src ){
		
			$parts = explode( '?', $src );
			return $parts[0];
			
		}
		
		/**
		 * Initialize functions
		 *
		 * Executes functions at WordPress init
		 *
		 **/	
		function siteinit() {
		
			global $current_user, $bwps_login_slug, $bwps_register_slug, $bwpsoptions, $bwpsmemlimit;
			
			 $bwpsmemlimit = (int) ini_get( 'memory_limit' ) ;
			
			//if they're locked out or banned die
			if ( ( $bwpsoptions['id_enabled'] == 1 ||$bwpsoptions['ll_enabled'] == 1 ) && $this->checklock( $current_user->user_login ) ) {
			
				wp_clear_auth_cookie();
				@header('HTTP/1.0 418 I\'m a teapot');
				die( __( 'error', $this->hook ) );
				
			}
			
			//if hide backend is enabled filter appropriate login and register links
			if ( $bwpsoptions['hb_enabled'] == 1 ) {
			
				$bwps_login_slug = '/' . $bwpsoptions['hb_login'];
				$bwps_register_slug = '/' . $bwpsoptions['hb_register'];
			
				//update login urls for display
				add_filter( 'site_url',  'wplogin_filter', 10, 3 );
				
				if ( ! function_exists( 'wplogin_filter' ) ) {
				
					/**
					 * Replace login url
					 *
					 * Replaces WordPress login URL with appropriate slug
					 *
					 * @param string $url Url to filter
					 * @return string url to return
					 *
					 **/
					function wplogin_filter( $url ) {
	
						global $bwps_login_slug;
						
						//make sure user is logged in and not already on the login page
					    if ( ! is_user_logged_in() && strpos($url, 'wp-login.php' ) && ! strstr( $_SERVER['REQUEST_URI'], 'wp-login.php' ) && ! strstr( $_SERVER['REQUEST_URI'], 'wp-admin' ) ) {
					    
							$url = get_site_url(1) . $bwps_login_slug; // your url here
														
						} elseif ( strpos($url, 'wp-login.php' ) && isset( $_POST['_wp_http_referer'] ) && strstr( $_POST['_wp_http_referer'], 'user-new.php' ) ) {
						
							$url = get_site_url(1) . $bwps_login_slug; // your url here
						
						}
							
							return $url;
						
					}
					
				}
				
				add_filter( 'site_url', 'change_register_url' );
				
				if ( ! function_exists( 'change_register_url' ) ) {
				
					/**
					 * Replace register url
					 *
					 * Replaces WordPress registration URL with appropriate slug
					 *
					 * @param string $url Url to filter
					 * @return string url to return
					 *
					 **/
					function change_register_url( $url ) {
				
						global $bwps_register_slug;
				
						if( strpos($url, '?action=register' ) ) {
				    
							$url = get_site_url(1) . $bwps_register_slug; // your url here
				        
						}
				        
						return $url;
				    
					}
				
				}
			
			}
			
		}
		
		/**
		 * Redirects to or from SSL where appropriate
		 *
		 * Redirects content that should be ssl to ssl and content that should not be ssl away from ssl.
		 **/
		function sslredirect() {
		
			global $post, $bwpsoptions;
						
			if ( is_singular() && $bwpsoptions['ssl_frontend'] == 1 ) {
				
				$requiressl = get_post_meta( $post->ID, 'bwps_enable_ssl', true );
				
				if ( ( $requiressl == true && ! $this->checkssl() ) || ( $requiressl != true && $this->checkssl() ) ) {
				
					$href = ( $_SERVER['SERVER_PORT'] == '443' ? 'http' : 'https' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
					
					wp_redirect( $href, 301 );
									
				}
				
			} else {
			
				if ( ( $bwpsoptions['ssl_frontend'] == 2 && ! $this->checkssl() ) || ( ( $bwpsoptions['ssl_frontend'] == 0 || $bwpsoptions['ssl_frontend'] == 1 ) && $this->checkssl() ) ) {
				
					$href = ( $_SERVER['SERVER_PORT'] == '443' ? 'http' : 'https' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
					
					wp_redirect( $href, 301 );
				
				}
				
			}
			
		}
		
		/**
		 * Require strong passwords
		 *
		 * Requires new passwords set are strong passwords
		 *
		 * @param object $errors WordPress errors
		 * @return object WordPress error object
		 *
		 **/
		function strongpass( $errors ) {  
			
			global $bwpsoptions;
				
			//determine the minimum role for enforcement
			$minRole = $bwpsoptions['st_passrole'];
			
			//all the standard roles and level equivalents
			$availableRoles = array(
				'administrator'	=> '8',
				'editor' 		=> '5',
				'author' 		=> '2',
				'contributor' 	=> '1',
				'subscriber' 	=> '0'
			);
				
			//roles and subroles
			$rollists = array(
				'administrator'	=> array( 'subscriber', 'author', 'contributor', 'editor' ),
				'editor' 		=> array( 'subscriber', 'author', 'contributor' ),
				'author' 		=> array( 'subscriber', 'contributor' ),
				'contributor' 	=> array( 'subscriber' ),
				'subscriber' 	=> array()
			);
				
			$enforce = true;
			$args = func_get_args();
			$userID = $args[2]->user_login; 
			
			if ( $userID ) {  //if updating an existing user
			
				if ( $userInfo = get_user_by( 'login', $userID ) ) {
				
					foreach ( $userInfo->roles as $capability ) {

						if ( $availableRoles[$capability] < $availableRoles[$minRole] ) {  
							$enforce = false;  
						}
						
					}  
				
				} else {  //a new user
			
					if ( in_array( $_POST["role"],  $rollists[$minRole]) ) {  
						$enforce = false;  
					}  
				
				}
			
			} 
				
			//add to error array if the password does not meet requirements
			if ( $enforce && !$errors->get_error_data( 'pass' ) && $_POST['pass1'] && $this->pwordstrength( $_POST['pass1'], isset( $_POST['user_login'] ) ? $_POST['user_login'] : $userID ) != 4 ) {  
				$errors->add( 'pass', __( '<strong>ERROR</strong>: You MUST Choose a password that rates at least <em>Strong</em> on the meter. Your setting have NOT been saved.' , $this->hook ) );  
			}  

			return $errors;  
		}
		
		/**
		 * Require strong password on password reset screen
		 *
		 * Forces a strong password on the password reset screen (if required)
		 *
		 **/
		function passwordreset() {

			global $bwpsoptions;
				
			//determine the minimum role for enforcement
			$minRole = $bwpsoptions['st_passrole'];
			
			//all the standard roles and level equivalents
			$availableRoles = array(
				"administrator"	=> "8",
				"editor" 		=> "5",
				"author" 		=> "2",
				"contributor" 	=> "1",
				"subscriber" 	=> "0"
			);
				
			//roles and subroles
			$rollists = array(
				"administrator" => array("subscriber", "author", "contributor","editor"),
				"editor" =>  array("subscriber", "author", "contributor"),
				"author" =>  array("subscriber", "contributor"),
				"contributor" =>  array("subscriber"),
				"subscriber" => array()
			);
				
			$enforce = true;
			$args = func_get_args();
			$userID = $_GET['login'];
			
			if ( $userID ) {  //if updating an existing user
			
				if ( $userInfo = get_user_by( 'login', $userID ) ) {
				
					foreach ( $userInfo->roles as $capability => $value ) {
						if ( $availableRoles[$capability] < $availableRoles[$minRole] ) {  
							$enforce = false;  
						}
					}  
				
				} else {  //a new user
			
					if ( in_array( $_POST["role"],  $rollists[$minRole]) ) {  
						$enforce = false;  
					}  
				
				}
			
			} 
			
			if ( $enforce == true ) {
				?>

				<script type="text/javascript">
					jQuery( document ).ready( function( $ ) {
						$( '#resetpassform' ).submit( function() {
							if ( ! $( '#pass-strength-result' ).hasClass( 'strong' ) ) {
								alert( '<?php _e( "Sorry, but you must enter a strong password", $this->hook ); ?>' );
								return false;
							}
						});
					});
				</script>

				<?php 
				}

		}
		
		/**
		 * Remove option to update themes for non admins
		 *
		 **/
		function themeupdates() {
		
			if ( ! current_user_can( 'manage_options' ) ) {
			
				remove_action( 'load-update-core.php', 'wp_update_themes' );
				add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );
				wp_clear_scheduled_hook( 'wp_update_themes' );
				
			}
			
		}	
			
	}
	
}
