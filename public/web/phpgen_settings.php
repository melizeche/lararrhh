<?php

//  define('SHOW_VARIABLES', 1);
//  define('DEBUG_LEVEL', 1);

//  error_reporting(E_ALL ^ E_NOTICE);
//  ini_set('display_errors', 'On');

set_include_path('.' . PATH_SEPARATOR . get_include_path());


include_once dirname(__FILE__) . '/' . 'components/utils/system_utils.php';

//  SystemUtils::DisableMagicQuotesRuntime();

SystemUtils::SetTimeZoneIfNeed('America/Halifax');

function GetGlobalConnectionOptions()
{
    return array(
  'server' => 'localhost',
  'port' => '5432',
  'username' => 'postgres',
  'database' => 'sistema'
);
}

function HasAdminPage()
{
    return false;
}

function GetPageInfos()
{
    $result = array();
    $result[] = array('caption' => 'Carreras Adm', 'short_caption' => 'Carreras Adm', 'filename' => 'public.carreras_adm.php', 'name' => 'public.carreras_adm');
    $result[] = array('caption' => 'Public.Perfiles', 'short_caption' => 'Public.Perfiles', 'filename' => 'public.perfiles.php', 'name' => 'public.perfiles');
    $result[] = array('caption' => 'Public.Users', 'short_caption' => 'Public.Users', 'filename' => 'public.users.php', 'name' => 'public.users');
    return $result;
}

function GetPagesHeader()
{
    return
    '<div style="width: 100%; color: red;"><h2 style="color: red;"></h2><h2 style="color: red;">Hola</h2></div>';
}

function GetPagesFooter()
{
    return
        '<div style="width: 100%; text-align: center;" align="center"><div style="text-align: right; padding: 4px; border: 1px solid black;">Texto para poner en el footer, carpincho.</div></div>'; 
    }

function ApplyCommonPageSettings(Page $page, Grid $grid)
{
    $page->SetShowUserAuthBar(false);
    $grid->BeforeUpdateRecord->AddListener('Global_BeforeUpdateHandler');
    $grid->BeforeDeleteRecord->AddListener('Global_BeforeDeleteHandler');
    $grid->BeforeInsertRecord->AddListener('Global_BeforeInsertHandler');
}

/*
  Default code page: 1252
*/
function GetAnsiEncoding() { return 'windows-1252'; }

function Global_BeforeUpdateHandler($page, $rowData, &$cancel, &$message, $tableName)
{

}

function Global_BeforeDeleteHandler($page, $rowData, &$cancel, &$message, $tableName)
{

}

function Global_BeforeInsertHandler($page, $rowData, &$cancel, &$message, $tableName)
{

}

function GetDefaultDateFormat()
{
    return 'Y-m-d';
}

function GetFirstDayOfWeek()
{
    return 0;
}

function GetEnableLessFilesRunTimeCompilation()
{
    return false;
}



?>
