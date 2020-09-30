<?php

class LeavCentral
{

  public static $COMMENT_LINE_REGEX = "/^\s*(#|\/\/)/";
  public static $DEA_SERVICE_FILE_RELATIVE_PATH = 'data/disposable_email_service_provider_list.txt';
  public static $DEBUG = false;
  public static $DOMAIN_LIST_FIELDS = array( 'user_defined_domain_whitelist_string', 'user_defined_domain_blacklist_string' );
  public static $DOMAIN_REGEX = "/^[0-9a-z]([-\._]*[0-9a-z])*[0-9a-z]\.[a-z]{2,18}$/i";
  public static $DOMAIN_INTERNAL_REGEX = "/^[0-9a-z\*]([-\._]*[0-9a-z\*])*[0-9a-z\*]\.([a-z]{1,18}|\*)$/i";
  public static $EMAIL_ADDRESS_REGEX = "/^[0-9a-z_]([-_\.]*[0-9a-z])*\+?[0-9a-z]*([-_\.]*[0-9a-z])*@[0-9a-z]([-\.]*[0-9a-z])*[0-9a-z]\.[a-z]{2,18}$/i";
  public static $EMAIL_ADDRESS_WILDCARD_REGEX = "/^[0-9a-z_\?\*]([-_\.]*[0-9a-z\?\*])*\+?[0-9a-z\?\*]*([-_\.]*[0-9a-z\?\*])*@[0-9a-z\*]([-\._]*[0-9a-z\*])*[0-9a-z\*]\.([a-z]{1,18}|\*)$/i";
  public static $EMAIL_FIELD_NAME_REGEX = "/^.*e[^a-zA-Z0-9]{0,2}mail.*$/i";
  public static $EMAIL_LIST_FIELDS = array( 'user_defined_email_whitelist_string', 'user_defined_email_blacklist_string' );
  public static $EMPTY_LINE_REGEX = "/^\s*[\r\n]+$/";
  public static $FREE_EMAIL_ADDRESS_PROVIDER_DOMAIN_LIST_FILE = 'data/free_email_address_provider_domain_list.txt';
  public static $INTEGER_GEZ_FIELDS = array( 'main_menu_position', 'settings_menu_position' );
  public static $INTEGER_GEZ_REGEX = "/^(0|[1-9]\d*)$/";
  public static $IP_ADDRESS_REGEX = "/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/";
  public static $MENU_INLINE_ICON = 'data:image/svg+xml;base64,PHN2ZyAgd2lkdGg9IjIwIiBoZWlnaHQ9IjIwIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzNTEuNDUgMjA3Ljc4Ij48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6bm9uZTtzdHJva2U6IzIzMWYyMDtzdHJva2UtbWl0ZXJsaW1pdDoxMDtzdHJva2Utd2lkdGg6MjZweDt9PC9zdHlsZT48L2RlZnM+PGcgaWQ9IkxheWVyXzIiIGRhdGEtbmFtZT0iTGF5ZXIgMiI+PGcgaWQ9IkxFQVZfTG9nbyIgZGF0YS1uYW1lPSJMRUFWIExvZ28iPjxwYXRoIGZpbGw9ImJsYWNrIiBjbGFzcz0iY2xzLTEiIGQ9Ik0xNi4zNCwyMDUuNDFjLTE2LjA2LTg2LjUsMjQtMTg5LjksMTU5LjM5LTE5Mi4zMiIvPjxwYXRoIGZpbGw9ImJsYWNrIiBjbGFzcz0iY2xzLTEiIGQ9Ik00LjA3LDE5NC42M2MxMzIuNzEsMCwxNzguODYtNTguODQsMTU4LjMyLTE5Mi42NiIvPjxwYXRoIGZpbGw9ImJsYWNrIiBjbGFzcz0iY2xzLTEiIGQ9Ik0zMzUuMTEsMjA1LjQxYzE2LjA3LTg2LjUtMjQtMTg5LjktMTU5LjM4LTE5Mi4zMiIvPjxwYXRoIGZpbGw9ImJsYWNrIiBjbGFzcz0iY2xzLTEiIGQ9Ik0zNDcuMzgsMTk0LjYzQzIxNC42NywxOTQuNjUsMTY4LjUzLDEzNS43OSwxODkuMDYsMiIvPjwvZz48L2c+PC9zdmc+';
  public static $OPTIONS;
  public static $OPTIONS_NAME = 'leav_options';
  public static $PLACEHOLDER_EMAIL_DOMAIN = 'your-domain.com';
  public static $PLUGIN_BUGREPORTS_WEBSITE = 'https://smings.com/last-email-address-validator/';
  public static $PLUGIN_CONTACT_EMAIL = 'leav@smings.com';
  public static $PLUGIN_DISPLAY_NAME_FULL = 'LEAV - Last Email Address Validator';
  public static $PLUGIN_DISPLAY_NAME_LONG = 'Last Email Address Validator';
  public static $PLUGIN_DISPLAY_NAME_SHORT = 'LEAV';
  public static $PLUGIN_DOCUMENTATION_WEBSITE = 'https://smings.com/last-email-address-validator/';
  public static $PLUGIN_FEATURE_REQUEST_EMAIL = 'leav@smings.com';
  public static $PLUGIN_MENU_NAME = "LEAV - Last Email Address Validator";
  public static $PLUGIN_MENU_NAME_SHORT = 'LEAV';
  public static $PLUGIN_ONETIME_DONATION_LINK = 'https://paypal.me/DirkTornow';
  public static $PLUGIN_PATREON_LINK = 'https://www.patreon.com/smings';
  public static $PLUGIN_SETTING_PAGE = '/wp-admin/options-general.php?page=leav-settings-page.inc';
  public static $PLUGIN_VERSION = '1.4.99';
  public static $PLUGIN_WEBSITE = 'https://smings.com/last-email-address-validator/';
  public static $RADIO_BUTTON_FIELDS = array(
    'allow_catch_all_domains',
    'accept_pingbacks', 
    'accept_trackbacks',
    'allow_recipient_name_catch_all_email_addresses', 
    'block_disposable_email_address_services', 
    'simulate_email_sending',
    'use_free_email_address_provider_domain_blacklist',
    'use_main_menu',
    'use_role_based_recipient_name_blacklist',
    'use_user_defined_domain_blacklist', 
    'use_user_defined_domain_whitelist', 
    'use_user_defined_email_blacklist', 
    'use_user_defined_email_whitelist', 
    'use_user_defined_recipient_name_blacklist',
    'use_user_defined_recipient_name_whitelist',
    'validate_cf7_email_fields', 
    'validate_formidable_forms_email_fields',
    'validate_mc4wp_email_fields',
    'validate_ninja_forms_email_fields', 
    'validate_woocommerce_email_fields', 
    'validate_wp_comment_user_email_addresses', 
    'validate_wp_standard_user_registration_email_addresses', 
    'validate_wpforms_email_fields'
  );
  public static $RADIO_BUTTON_VALUES = array( 'yes', 'no' );
  public static $RECIPIENT_NAME_CATCH_ALL_REGEX = "/^[0-9a-z_]([-_\.]*[0-9a-z])*\+[^@]+@/";
  public static $RECIPIENT_NAME_FIELDS = array( 'user_defined_recipient_name_whitelist_string', 'user_defined_recipient_name_blacklist_string' );
  public static $RECIPIENT_NAME_REGEX = "/^[0-9a-z_\*]([-_\.]*[0-9a-z\*])*\+?[0-9a-z\*]*([-_\.]*[0-9a-z\*])*$/i";
  public static $RECIPIENT_NAME_INTERNAL_REGEX = "/^[a-z\*]*$/i";
  public static $RECIPIENT_NAME_BLACKLIST_WILDCARD_REPLACEMENT = "[a-z]*";
  public static $RECIPIENT_NAME_WHITELIST_WILDCARD_REPLACEMENT = ".*";
  public static $ROLE_BASED_RECIPIENT_NAME_FILE_RELATIVE_PATH = 'data/role_based_recipient_names.txt';
  public static $SANITIZE_DOMAIN_INTERNAL_REGEX = "/[^0-9a-zA-Z-\.\*]/";
  public static $SANITIZE_DOMAIN_REGEX = "/[^0-9a-zA-Z-\.]/";
  public static $SANITIZE_IP_REGEX = "/[^0-9\.]/";
  public static $SANITIZE_RECIPIENT_NAME_INTERNAL_REGEX = "/[^a-z\*]/";
  public static $SANITIZE_RECIPIENT_NAME_REGEX = "/[^a-z]/";
  public static $SETTINGS_PAGE_LOGO_URL = 'assets/icon-128x128.png';
  public static $TEXT_FIELDS = array(
    'cem_email_address_is_blacklisted',
    'cem_email_address_syntax_error',
    'cem_email_domain_has_no_mx_record',
    'cem_email_domain_is_blacklisted',
    'cem_email_domain_on_dea_blacklist',
    'cem_email_from_catch_all_domain',
    'cem_general_email_validation_error',
    'cem_simulated_sending_of_email_failed',
  );
  public static $VALIDATION_ERROR_LIST = array();
  public static $VALIDATION_ERROR_LIST_DEFAULTS = array();
  public static $WILDCARD_REGEX = "/[\*]/";


  // ---------------------------------------------------------------------------


  public function __construct()
  {
    $this->init_error_messages();
  }


  private function init_error_messages() : void
  {
    $this::$VALIDATION_ERROR_LIST_DEFAULTS = 
    array
    (
          'email_address_syntax_error'        => __( 'The entered email address syntax is invalid.', 'leav'),
          'recipient_name_catch_all_email_address_error' => __( 'We don\'t allow recipient names with an inline catch-all syntax using a "+" sign. Please remove the "+" sign and everything after it.', 'leav' ),
          'email_domain_is_blacklisted'       => __( 'The entered email address\'s domain is blacklisted.', 'leav'),
          'email_domain_is_on_free_email_address_provider_list'     => __( 'We don\'t accept email addresses from free email address providers. Please use a business email address.', 'leav'),
          'email_address_is_blacklisted'      => __( 'The entered email address is blacklisted.', 'leav'),
          'recipient_name_is_blacklisted'     => __( 'The recipient name (the part before the "@" sign) is blacklisted. Please use another recipient name.', 'leav'),
          'recipient_name_is_role_based'      => __( 'We don\'t allow role-based / generic recipient names in email addresses. Please use a personalized email address.'),
          'email_domain_has_no_mx_record'     => __( 'The entered email address\'s domain doesn\'t have any mail servers.', 'leav'),
          'email_domain_on_dea_blacklist'     => __( 'We don\'t accept email addresses from disposable email address services (DEA). Please use a regular email address.', 'leav'),
          'email_from_catch_all_domain'       => __( 'We don\'t accept email addresses from catch-all domains. Your email address\'s domain accepts any recipient name. Please use an email address from another domain', 'leav' ),
          'simulated_sending_of_email_failed' => __( 'The entered email address got rejected while trying to send an email to it.', 'leav'),
          'general_email_validation_error'    => __( 'The entered email address is invalid.', 'leav'),
    );    
    $this::$VALIDATION_ERROR_LIST = $this::$VALIDATION_ERROR_LIST_DEFAULTS;
  }

}

?>