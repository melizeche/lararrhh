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
    $result[] = array('caption' => 'Public.Administradores', 'short_caption' => 'Public.Administradores', 'filename' => 'public.administradores.php', 'name' => 'public.administradores');
    $result[] = array('caption' => 'Public.Archivo X Perfiles', 'short_caption' => 'Public.Archivo X Perfiles', 'filename' => 'public.archivo_x_perfiles.php', 'name' => 'public.archivo_x_perfiles');
    $result[] = array('caption' => 'Public.Archivos', 'short_caption' => 'Public.Archivos', 'filename' => 'public.archivos.php', 'name' => 'public.archivos');
    $result[] = array('caption' => 'Public.Carreras Adm', 'short_caption' => 'Public.Carreras Adm', 'filename' => 'public.carreras_adm.php', 'name' => 'public.carreras_adm');
    $result[] = array('caption' => 'Public.Carreras X Perfiles', 'short_caption' => 'Public.Carreras X Perfiles', 'filename' => 'public.carreras_x_perfiles.php', 'name' => 'public.carreras_x_perfiles');
    $result[] = array('caption' => 'Public.CursosC X Perfiles', 'short_caption' => 'Public.CursosC X Perfiles', 'filename' => 'public.cursosC_x_perfiles.php', 'name' => 'public.cursosC_x_perfiles');
    $result[] = array('caption' => 'Public.Cursos Culminados', 'short_caption' => 'Public.Cursos Culminados', 'filename' => 'public.cursos_culminados.php', 'name' => 'public.cursos_culminados');
    $result[] = array('caption' => 'Public.Cursos Disponibles', 'short_caption' => 'Public.Cursos Disponibles', 'filename' => 'public.cursos_disponibles.php', 'name' => 'public.cursos_disponibles');
    $result[] = array('caption' => 'Public.Cursos X Perfiles', 'short_caption' => 'Public.Cursos X Perfiles', 'filename' => 'public.cursos_x_perfiles.php', 'name' => 'public.cursos_x_perfiles');
    $result[] = array('caption' => 'Public.Evaluacion', 'short_caption' => 'Public.Evaluacion', 'filename' => 'public.evaluacion.php', 'name' => 'public.evaluacion');
    $result[] = array('caption' => 'Public.Familiares X Perfil', 'short_caption' => 'Public.Familiares X Perfil', 'filename' => 'public.familiares_x_perfil.php', 'name' => 'public.familiares_x_perfil');
    $result[] = array('caption' => 'Public.Idiomas', 'short_caption' => 'Public.Idiomas', 'filename' => 'public.idiomas.php', 'name' => 'public.idiomas');
    $result[] = array('caption' => 'Public.Idiomas X Perfil', 'short_caption' => 'Public.Idiomas X Perfil', 'filename' => 'public.idiomas_x_perfil.php', 'name' => 'public.idiomas_x_perfil');
    $result[] = array('caption' => 'Public.Perfiles', 'short_caption' => 'Public.Perfiles', 'filename' => 'public.perfiles.php', 'name' => 'public.perfiles');
    $result[] = array('caption' => 'Public.Requerimientos', 'short_caption' => 'Public.Requerimientos', 'filename' => 'public.requerimientos.php', 'name' => 'public.requerimientos');
    $result[] = array('caption' => 'Public.Requerimientos X Cursos Disponibles', 'short_caption' => 'Public.Requerimientos X Cursos Disponibles', 'filename' => 'public.requerimientos_x_cursos_disponibles.php', 'name' => 'public.requerimientos_x_cursos_disponibles');
    $result[] = array('caption' => 'Public.Users', 'short_caption' => 'Public.Users', 'filename' => 'public.users.php', 'name' => 'public.users');
    return $result;
}

function GetPagesHeader()
{
    return
    '';
}

function GetPagesFooter()
{
    #$aaa =  URL::to('logout');
    return   "<a href='../logout'>Logout</a>";
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