<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php 
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */


    include_once dirname(__FILE__) . '/' . 'components/utils/check_utils.php';
    CheckPHPVersion();
    CheckTemplatesCacheFolderIsExistsAndWritable();


    include_once dirname(__FILE__) . '/' . 'phpgen_settings.php';
    include_once dirname(__FILE__) . '/' . 'database_engine/pgsql_engine.php';
    include_once dirname(__FILE__) . '/' . 'components/page.php';


    function GetConnectionOptions()
    {
        $result = GetGlobalConnectionOptions();
        $result['client_encoding'] = 'utf8';
        GetApplication()->GetUserAuthorizationStrategy()->ApplyIdentityToConnectionOptions($result);
        return $result;
    }

    
    
    // OnBeforePageExecute event handler
    
    
    
    class public_cursos_disponiblesPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."cursos_disponibles"');
            $field = new IntegerField('cod_curso');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('titulo');
            $this->dataset->AddField($field, false);
            $field = new StringField('contenido');
            $this->dataset->AddField($field, false);
            $field = new DateField('fecha_inicio');
            $this->dataset->AddField($field, false);
            $field = new DateField('fecha_fin');
            $this->dataset->AddField($field, false);
            $field = new StringField('lugar');
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $this->dataset->AddField($field, false);
            $field = new StringField('costo');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('tipo');
            $this->dataset->AddField($field, false);
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(20);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        public function GetPageList()
        {
            $currentPageCaption = $this->GetShortCaption();
            $result = new PageList($this);
            if (GetCurrentUserGrantForDataSource('public.administradores')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Administradores'), 'public.administradores.php', $this->RenderText('Public.Administradores'), $currentPageCaption == $this->RenderText('Public.Administradores')));
            if (GetCurrentUserGrantForDataSource('public.archivo_x_perfiles')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Archivo X Perfiles'), 'public.archivo_x_perfiles.php', $this->RenderText('Public.Archivo X Perfiles'), $currentPageCaption == $this->RenderText('Public.Archivo X Perfiles')));
            if (GetCurrentUserGrantForDataSource('public.archivos')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Archivos'), 'public.archivos.php', $this->RenderText('Public.Archivos'), $currentPageCaption == $this->RenderText('Public.Archivos')));
            if (GetCurrentUserGrantForDataSource('public.carreras_adm')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Carreras Adm'), 'public.carreras_adm.php', $this->RenderText('Public.Carreras Adm'), $currentPageCaption == $this->RenderText('Public.Carreras Adm')));
            if (GetCurrentUserGrantForDataSource('public.carreras_x_perfiles')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Carreras X Perfiles'), 'public.carreras_x_perfiles.php', $this->RenderText('Public.Carreras X Perfiles'), $currentPageCaption == $this->RenderText('Public.Carreras X Perfiles')));
            if (GetCurrentUserGrantForDataSource('public.cursosC_x_perfiles')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.CursosC X Perfiles'), 'public.cursosC_x_perfiles.php', $this->RenderText('Public.CursosC X Perfiles'), $currentPageCaption == $this->RenderText('Public.CursosC X Perfiles')));
            if (GetCurrentUserGrantForDataSource('public.cursos_culminados')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Cursos Culminados'), 'public.cursos_culminados.php', $this->RenderText('Public.Cursos Culminados'), $currentPageCaption == $this->RenderText('Public.Cursos Culminados')));
            if (GetCurrentUserGrantForDataSource('public.cursos_disponibles')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Cursos Disponibles'), 'public.cursos_disponibles.php', $this->RenderText('Public.Cursos Disponibles'), $currentPageCaption == $this->RenderText('Public.Cursos Disponibles')));
            if (GetCurrentUserGrantForDataSource('public.cursos_x_perfiles')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Cursos X Perfiles'), 'public.cursos_x_perfiles.php', $this->RenderText('Public.Cursos X Perfiles'), $currentPageCaption == $this->RenderText('Public.Cursos X Perfiles')));
            if (GetCurrentUserGrantForDataSource('public.evaluacion')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Evaluacion'), 'public.evaluacion.php', $this->RenderText('Public.Evaluacion'), $currentPageCaption == $this->RenderText('Public.Evaluacion')));
            if (GetCurrentUserGrantForDataSource('public.familiares_x_perfil')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Familiares X Perfil'), 'public.familiares_x_perfil.php', $this->RenderText('Public.Familiares X Perfil'), $currentPageCaption == $this->RenderText('Public.Familiares X Perfil')));
            if (GetCurrentUserGrantForDataSource('public.idiomas')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Idiomas'), 'public.idiomas.php', $this->RenderText('Public.Idiomas'), $currentPageCaption == $this->RenderText('Public.Idiomas')));
            if (GetCurrentUserGrantForDataSource('public.idiomas_x_perfil')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Idiomas X Perfil'), 'public.idiomas_x_perfil.php', $this->RenderText('Public.Idiomas X Perfil'), $currentPageCaption == $this->RenderText('Public.Idiomas X Perfil')));
            if (GetCurrentUserGrantForDataSource('public.perfiles')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Perfiles'), 'public.perfiles.php', $this->RenderText('Public.Perfiles'), $currentPageCaption == $this->RenderText('Public.Perfiles')));
            if (GetCurrentUserGrantForDataSource('public.requerimientos')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Requerimientos'), 'public.requerimientos.php', $this->RenderText('Public.Requerimientos'), $currentPageCaption == $this->RenderText('Public.Requerimientos')));
            if (GetCurrentUserGrantForDataSource('public.requerimientos_x_cursos_disponibles')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Requerimientos X Cursos Disponibles'), 'public.requerimientos_x_cursos_disponibles.php', $this->RenderText('Public.Requerimientos X Cursos Disponibles'), $currentPageCaption == $this->RenderText('Public.Requerimientos X Cursos Disponibles')));
            if (GetCurrentUserGrantForDataSource('public.users')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Public.Users'), 'public.users.php', $this->RenderText('Public.Users'), $currentPageCaption == $this->RenderText('Public.Users')));
            
            if ( HasAdminPage() && GetApplication()->HasAdminGrantForCurrentUser() )
              $result->AddPage(new PageLink($this->GetLocalizerCaptions()->GetMessageString('AdminPage'), 'phpgen_admin.php', $this->GetLocalizerCaptions()->GetMessageString('AdminPage'), false, true));
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function CreateGridSearchControl(Grid $grid)
        {
            $grid->UseFilter = true;
            $grid->SearchControl = new SimpleSearch('public_cursos_disponiblesssearch', $this->dataset,
                array('cod_curso', 'titulo', 'contenido', 'fecha_inicio', 'fecha_fin', 'lugar', 'fecha_creacion', 'fecha_modificacion', 'costo', 'requerimiento', 'tipo'),
                array($this->RenderText('Cod Curso'), $this->RenderText('Titulo'), $this->RenderText('Contenido'), $this->RenderText('Fecha Inicio'), $this->RenderText('Fecha Fin'), $this->RenderText('Lugar'), $this->RenderText('Fecha Creacion'), $this->RenderText('Fecha Modificacion'), $this->RenderText('Costo'), $this->RenderText('Requerimiento'), $this->RenderText('Tipo')),
                array(
                    '=' => $this->GetLocalizerCaptions()->GetMessageString('equals'),
                    '<>' => $this->GetLocalizerCaptions()->GetMessageString('doesNotEquals'),
                    '<' => $this->GetLocalizerCaptions()->GetMessageString('isLessThan'),
                    '<=' => $this->GetLocalizerCaptions()->GetMessageString('isLessThanOrEqualsTo'),
                    '>' => $this->GetLocalizerCaptions()->GetMessageString('isGreaterThan'),
                    '>=' => $this->GetLocalizerCaptions()->GetMessageString('isGreaterThanOrEqualsTo'),
                    'ILIKE' => $this->GetLocalizerCaptions()->GetMessageString('Like'),
                    'STARTS' => $this->GetLocalizerCaptions()->GetMessageString('StartsWith'),
                    'ENDS' => $this->GetLocalizerCaptions()->GetMessageString('EndsWith'),
                    'CONTAINS' => $this->GetLocalizerCaptions()->GetMessageString('Contains')
                    ), $this->GetLocalizerCaptions(), $this, 'CONTAINS'
                );
        }
    
        protected function CreateGridAdvancedSearchControl(Grid $grid)
        {
            $this->AdvancedSearchControl = new AdvancedSearchControl('public_cursos_disponiblesasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->setTimerInterval(1000);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('cod_curso', $this->RenderText('Cod Curso')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('titulo', $this->RenderText('Titulo')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('contenido', $this->RenderText('Contenido')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('fecha_inicio', $this->RenderText('Fecha Inicio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('fecha_fin', $this->RenderText('Fecha Fin')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('lugar', $this->RenderText('Lugar')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('fecha_creacion', $this->RenderText('Fecha Creacion')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('fecha_modificacion', $this->RenderText('Fecha Modificacion')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('costo', $this->RenderText('Costo')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('requerimiento', $this->RenderText('Requerimiento')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('tipo', $this->RenderText('Tipo')));
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actionsBandName = 'actions';
            $grid->AddBandToBegin($actionsBandName, $this->GetLocalizerCaptions()->GetMessageString('Actions'), true);
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
            }
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
                $column->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
                $column->OnShow->AddListener('ShowDeleteButtonHandler', $this);
            $column->SetAdditionalAttribute("data-modal-delete", "true");
            $column->SetAdditionalAttribute("data-delete-handler-name", $this->GetModalGridDeleteHandler());
            }
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
            }
        }
    
        protected function AddFieldColumns(Grid $grid)
        {
            //
            // View column for cod_curso field
            //
            $column = new TextViewColumn('cod_curso', 'Cod Curso', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for cod_curso field
            //
            $editor = new TextEdit('cod_curso_edit');
            $editColumn = new CustomEditColumn('Cod Curso', 'cod_curso', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for cod_curso field
            //
            $editor = new TextEdit('cod_curso_edit');
            $editColumn = new CustomEditColumn('Cod Curso', 'cod_curso', $editor, $this->dataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('titulo_handler');
            
            /* <inline edit column> */
            //
            // Edit column for titulo field
            //
            $editor = new TextAreaEdit('titulo_edit', 50, 8);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for titulo field
            //
            $editor = new TextAreaEdit('titulo_edit', 50, 8);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for contenido field
            //
            $column = new TextViewColumn('contenido', 'Contenido', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('contenido_handler');
            
            /* <inline edit column> */
            //
            // Edit column for contenido field
            //
            $editor = new TextAreaEdit('contenido_edit', 50, 8);
            $editColumn = new CustomEditColumn('Contenido', 'contenido', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for contenido field
            //
            $editor = new TextAreaEdit('contenido_edit', 50, 8);
            $editColumn = new CustomEditColumn('Contenido', 'contenido', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for fecha_inicio field
            //
            $column = new DateTimeViewColumn('fecha_inicio', 'Fecha Inicio', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for fecha_inicio field
            //
            $editor = new DateTimeEdit('fecha_inicio_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Inicio', 'fecha_inicio', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for fecha_inicio field
            //
            $editor = new DateTimeEdit('fecha_inicio_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Inicio', 'fecha_inicio', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for fecha_fin field
            //
            $column = new DateTimeViewColumn('fecha_fin', 'Fecha Fin', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for fecha_fin field
            //
            $editor = new DateTimeEdit('fecha_fin_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Fin', 'fecha_fin', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for fecha_fin field
            //
            $editor = new DateTimeEdit('fecha_fin_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Fin', 'fecha_fin', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for lugar field
            //
            $column = new TextViewColumn('lugar', 'Lugar', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for lugar field
            //
            $editor = new TextEdit('lugar_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Lugar', 'lugar', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for lugar field
            //
            $editor = new TextEdit('lugar_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Lugar', 'lugar', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for fecha_creacion field
            //
            $column = new DateTimeViewColumn('fecha_creacion', 'Fecha Creacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for fecha_creacion field
            //
            $editor = new DateTimeEdit('fecha_creacion_edit', true, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Creacion', 'fecha_creacion', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for fecha_creacion field
            //
            $editor = new DateTimeEdit('fecha_creacion_edit', true, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Creacion', 'fecha_creacion', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $editColumn->SetAllowSetToDefault(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for fecha_modificacion field
            //
            $column = new DateTimeViewColumn('fecha_modificacion', 'Fecha Modificacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for fecha_modificacion field
            //
            $editor = new DateTimeEdit('fecha_modificacion_edit', true, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Modificacion', 'fecha_modificacion', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for fecha_modificacion field
            //
            $editor = new DateTimeEdit('fecha_modificacion_edit', true, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Modificacion', 'fecha_modificacion', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for costo field
            //
            $column = new TextViewColumn('costo', 'Costo', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for costo field
            //
            $editor = new TextEdit('costo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Costo', 'costo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for costo field
            //
            $editor = new TextEdit('costo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Costo', 'costo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for requerimiento field
            //
            $column = new TextViewColumn('requerimiento', 'Requerimiento', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for requerimiento field
            //
            $editor = new TextEdit('requerimiento_edit');
            $editColumn = new CustomEditColumn('Requerimiento', 'requerimiento', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for requerimiento field
            //
            $editor = new TextEdit('requerimiento_edit');
            $editColumn = new CustomEditColumn('Requerimiento', 'requerimiento', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for tipo field
            //
            $column = new TextViewColumn('tipo', 'Tipo', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for tipo field
            //
            $editor = new TextEdit('tipo_edit');
            $editor->SetSize(2);
            $editor->SetMaxLength(2);
            $editColumn = new CustomEditColumn('Tipo', 'tipo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for tipo field
            //
            $editor = new TextEdit('tipo_edit');
            $editor->SetSize(2);
            $editor->SetMaxLength(2);
            $editColumn = new CustomEditColumn('Tipo', 'tipo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for cod_curso field
            //
            $column = new TextViewColumn('cod_curso', 'Cod Curso', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('titulo_handler');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for contenido field
            //
            $column = new TextViewColumn('contenido', 'Contenido', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('contenido_handler');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for fecha_inicio field
            //
            $column = new DateTimeViewColumn('fecha_inicio', 'Fecha Inicio', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for fecha_fin field
            //
            $column = new DateTimeViewColumn('fecha_fin', 'Fecha Fin', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lugar field
            //
            $column = new TextViewColumn('lugar', 'Lugar', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for fecha_creacion field
            //
            $column = new DateTimeViewColumn('fecha_creacion', 'Fecha Creacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for fecha_modificacion field
            //
            $column = new DateTimeViewColumn('fecha_modificacion', 'Fecha Modificacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for costo field
            //
            $column = new TextViewColumn('costo', 'Costo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for requerimiento field
            //
            $column = new TextViewColumn('requerimiento', 'Requerimiento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for tipo field
            //
            $column = new TextViewColumn('tipo', 'Tipo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for cod_curso field
            //
            $editor = new TextEdit('cod_curso_edit');
            $editColumn = new CustomEditColumn('Cod Curso', 'cod_curso', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for titulo field
            //
            $editor = new TextAreaEdit('titulo_edit', 50, 8);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for contenido field
            //
            $editor = new TextAreaEdit('contenido_edit', 50, 8);
            $editColumn = new CustomEditColumn('Contenido', 'contenido', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for fecha_inicio field
            //
            $editor = new DateTimeEdit('fecha_inicio_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Inicio', 'fecha_inicio', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for fecha_fin field
            //
            $editor = new DateTimeEdit('fecha_fin_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Fin', 'fecha_fin', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lugar field
            //
            $editor = new TextEdit('lugar_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Lugar', 'lugar', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for fecha_creacion field
            //
            $editor = new DateTimeEdit('fecha_creacion_edit', true, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Creacion', 'fecha_creacion', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for fecha_modificacion field
            //
            $editor = new DateTimeEdit('fecha_modificacion_edit', true, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Modificacion', 'fecha_modificacion', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for costo field
            //
            $editor = new TextEdit('costo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Costo', 'costo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for requerimiento field
            //
            $editor = new TextEdit('requerimiento_edit');
            $editColumn = new CustomEditColumn('Requerimiento', 'requerimiento', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for tipo field
            //
            $editor = new TextEdit('tipo_edit');
            $editor->SetSize(2);
            $editor->SetMaxLength(2);
            $editColumn = new CustomEditColumn('Tipo', 'tipo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for cod_curso field
            //
            $editor = new TextEdit('cod_curso_edit');
            $editColumn = new CustomEditColumn('Cod Curso', 'cod_curso', $editor, $this->dataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for titulo field
            //
            $editor = new TextAreaEdit('titulo_edit', 50, 8);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for contenido field
            //
            $editor = new TextAreaEdit('contenido_edit', 50, 8);
            $editColumn = new CustomEditColumn('Contenido', 'contenido', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for fecha_inicio field
            //
            $editor = new DateTimeEdit('fecha_inicio_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Inicio', 'fecha_inicio', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for fecha_fin field
            //
            $editor = new DateTimeEdit('fecha_fin_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Fin', 'fecha_fin', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lugar field
            //
            $editor = new TextEdit('lugar_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Lugar', 'lugar', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for fecha_creacion field
            //
            $editor = new DateTimeEdit('fecha_creacion_edit', true, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Creacion', 'fecha_creacion', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $editColumn->SetAllowSetToDefault(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for fecha_modificacion field
            //
            $editor = new DateTimeEdit('fecha_modificacion_edit', true, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Fecha Modificacion', 'fecha_modificacion', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for costo field
            //
            $editor = new TextEdit('costo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Costo', 'costo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for requerimiento field
            //
            $editor = new TextEdit('requerimiento_edit');
            $editColumn = new CustomEditColumn('Requerimiento', 'requerimiento', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for tipo field
            //
            $editor = new TextEdit('tipo_edit');
            $editor->SetSize(2);
            $editor->SetMaxLength(2);
            $editColumn = new CustomEditColumn('Tipo', 'tipo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $grid->SetShowAddButton(true);
                $grid->SetShowInlineAddButton(false);
            }
            else
            {
                $grid->SetShowInlineAddButton(false);
                $grid->SetShowAddButton(false);
            }
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for cod_curso field
            //
            $column = new TextViewColumn('cod_curso', 'Cod Curso', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for contenido field
            //
            $column = new TextViewColumn('contenido', 'Contenido', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for fecha_inicio field
            //
            $column = new DateTimeViewColumn('fecha_inicio', 'Fecha Inicio', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for fecha_fin field
            //
            $column = new DateTimeViewColumn('fecha_fin', 'Fecha Fin', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lugar field
            //
            $column = new TextViewColumn('lugar', 'Lugar', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for fecha_creacion field
            //
            $column = new DateTimeViewColumn('fecha_creacion', 'Fecha Creacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for fecha_modificacion field
            //
            $column = new DateTimeViewColumn('fecha_modificacion', 'Fecha Modificacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for costo field
            //
            $column = new TextViewColumn('costo', 'Costo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for requerimiento field
            //
            $column = new TextViewColumn('requerimiento', 'Requerimiento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for tipo field
            //
            $column = new TextViewColumn('tipo', 'Tipo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for cod_curso field
            //
            $column = new TextViewColumn('cod_curso', 'Cod Curso', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for contenido field
            //
            $column = new TextViewColumn('contenido', 'Contenido', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for fecha_inicio field
            //
            $column = new DateTimeViewColumn('fecha_inicio', 'Fecha Inicio', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for fecha_fin field
            //
            $column = new DateTimeViewColumn('fecha_fin', 'Fecha Fin', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for lugar field
            //
            $column = new TextViewColumn('lugar', 'Lugar', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for fecha_creacion field
            //
            $column = new DateTimeViewColumn('fecha_creacion', 'Fecha Creacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for fecha_modificacion field
            //
            $column = new DateTimeViewColumn('fecha_modificacion', 'Fecha Modificacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for costo field
            //
            $column = new TextViewColumn('costo', 'Costo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for requerimiento field
            //
            $column = new TextViewColumn('requerimiento', 'Requerimiento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for tipo field
            //
            $column = new TextViewColumn('tipo', 'Tipo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetShowSetToNullCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        public function ShowEditButtonHandler(&$show)
        {
            if ($this->GetRecordPermission() != null)
                $show = $this->GetRecordPermission()->HasEditGrant($this->GetDataset());
        }
        public function ShowDeleteButtonHandler(&$show)
        {
            if ($this->GetRecordPermission() != null)
                $show = $this->GetRecordPermission()->HasDeleteGrant($this->GetDataset());
        }
        
        public function GetModalGridDeleteHandler() { return 'public_cursos_disponibles_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'public_cursos_disponiblesGrid');
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(false);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(false);
            $result->SetUseFixedHeader(false);
            
            $result->SetShowLineNumbers(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->CreateGridSearchControl($result);
            $this->CreateGridAdvancedSearchControl($result);
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
    
            $this->SetShowPageList(true);
            $this->SetHidePageListByDefault(false);
            $this->SetExportToExcelAvailable(false);
            $this->SetExportToWordAvailable(false);
            $this->SetExportToXmlAvailable(false);
            $this->SetExportToCsvAvailable(false);
            $this->SetExportToPdfAvailable(false);
            $this->SetPrinterFriendlyAvailable(false);
            $this->SetSimpleSearchAvailable(true);
            $this->SetAdvancedSearchAvailable(false);
            $this->SetFilterRowAvailable(false);
            $this->SetVisualEffectsEnabled(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
    
            //
            // Http Handlers
            //
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for titulo field
            //
            $editor = new TextAreaEdit('titulo_edit', 50, 8);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for titulo field
            //
            $editor = new TextAreaEdit('titulo_edit', 50, 8);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'titulo_handler', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for contenido field
            //
            $column = new TextViewColumn('contenido', 'Contenido', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for contenido field
            //
            $editor = new TextAreaEdit('contenido_edit', 50, 8);
            $editColumn = new CustomEditColumn('Contenido', 'contenido', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for contenido field
            //
            $editor = new TextAreaEdit('contenido_edit', 50, 8);
            $editColumn = new CustomEditColumn('Contenido', 'contenido', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'contenido_handler', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'titulo_handler', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for contenido field
            //
            $column = new TextViewColumn('contenido', 'Contenido', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'contenido_handler', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            return $result;
        }
        
        public function OpenAdvancedSearchByDefault()
        {
            return false;
        }
    
        protected function DoGetGridHeader()
        {
            return '';
        }
    }



    try
    {
        $Page = new public_cursos_disponiblesPage("public.cursos_disponibles.php", "public_cursos_disponibles", GetCurrentUserGrantForDataSource("public.cursos_disponibles"), 'UTF-8');
        $Page->SetShortCaption('Public.Cursos Disponibles');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('Public.Cursos Disponibles');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("public.cursos_disponibles"));
        GetApplication()->SetEnableLessRunTimeCompile(GetEnableLessFilesRunTimeCompilation());
        GetApplication()->SetCanUserChangeOwnPassword(
            !function_exists('CanUserChangeOwnPassword') || CanUserChangeOwnPassword());
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e->getMessage());
    }
	
