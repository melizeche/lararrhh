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
    
    
    
    class public_familiares_x_perfilPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."familiares_x_perfil"');
            $field = new IntegerField('familiar');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('enlace_uno');
            $this->dataset->AddField($field, false);
            $field = new StringField('nombre_paren');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('enlace_dos');
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('enlace_uno', 'public.perfiles', new IntegerField('perfil'), new StringField('estado', 'enlace_uno_estado', 'enlace_uno_estado_public_perfiles'), 'enlace_uno_estado_public_perfiles');
            $this->dataset->AddLookupField('enlace_dos', 'public.perfiles', new IntegerField('perfil'), new StringField('estado', 'enlace_dos_estado', 'enlace_dos_estado_public_perfiles'), 'enlace_dos_estado_public_perfiles');
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
            $grid->SearchControl = new SimpleSearch('public_familiares_x_perfilssearch', $this->dataset,
                array('familiar', 'enlace_uno_estado', 'nombre_paren', 'enlace_dos_estado'),
                array($this->RenderText('Familiar'), $this->RenderText('Enlace Uno'), $this->RenderText('Nombre Paren'), $this->RenderText('Enlace Dos')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('public_familiares_x_perfilasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->setTimerInterval(1000);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('familiar', $this->RenderText('Familiar')));
            
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."perfiles"');
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('estado');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('nombre');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('tipo_documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('nivel_academico');
            $lookupDataset->AddField($field, false);
            $field = new StringField('especialidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento_comprobante');
            $lookupDataset->AddField($field, false);
            $field = new StringField('direccion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('telefono');
            $lookupDataset->AddField($field, false);
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_civil');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('edad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_F');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('parentesco');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_de_nac');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('evaluacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idioma');
            $lookupDataset->AddField($field, false);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('enlace_uno', $this->RenderText('Enlace Uno'), $lookupDataset, 'perfil', 'estado', false));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('nombre_paren', $this->RenderText('Nombre Paren')));
            
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."perfiles"');
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('estado');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('nombre');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('tipo_documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('nivel_academico');
            $lookupDataset->AddField($field, false);
            $field = new StringField('especialidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento_comprobante');
            $lookupDataset->AddField($field, false);
            $field = new StringField('direccion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('telefono');
            $lookupDataset->AddField($field, false);
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_civil');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('edad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_F');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('parentesco');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_de_nac');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('evaluacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idioma');
            $lookupDataset->AddField($field, false);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('enlace_dos', $this->RenderText('Enlace Dos'), $lookupDataset, 'perfil', 'estado', false));
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
            // View column for familiar field
            //
            $column = new TextViewColumn('familiar', 'Familiar', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for familiar field
            //
            $editor = new TextEdit('familiar_edit');
            $editColumn = new CustomEditColumn('Familiar', 'familiar', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for familiar field
            //
            $editor = new TextEdit('familiar_edit');
            $editColumn = new CustomEditColumn('Familiar', 'familiar', $editor, $this->dataset);
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
            // View column for estado field
            //
            $column = new TextViewColumn('enlace_uno_estado', 'Enlace Uno', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for enlace_uno field
            //
            $editor = new ComboBox('enlace_uno_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."perfiles"');
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('estado');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('nombre');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('tipo_documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('nivel_academico');
            $lookupDataset->AddField($field, false);
            $field = new StringField('especialidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento_comprobante');
            $lookupDataset->AddField($field, false);
            $field = new StringField('direccion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('telefono');
            $lookupDataset->AddField($field, false);
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_civil');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('edad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_F');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('parentesco');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_de_nac');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('evaluacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idioma');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('estado', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Enlace Uno', 
                'enlace_uno', 
                $editor, 
                $this->dataset, 'perfil', 'estado', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for enlace_uno field
            //
            $editor = new ComboBox('enlace_uno_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."perfiles"');
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('estado');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('nombre');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('tipo_documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('nivel_academico');
            $lookupDataset->AddField($field, false);
            $field = new StringField('especialidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento_comprobante');
            $lookupDataset->AddField($field, false);
            $field = new StringField('direccion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('telefono');
            $lookupDataset->AddField($field, false);
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_civil');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('edad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_F');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('parentesco');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_de_nac');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('evaluacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idioma');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('estado', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Enlace Uno', 
                'enlace_uno', 
                $editor, 
                $this->dataset, 'perfil', 'estado', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for nombre_paren field
            //
            $column = new TextViewColumn('nombre_paren', 'Nombre Paren', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('nombre_paren_handler');
            
            /* <inline edit column> */
            //
            // Edit column for nombre_paren field
            //
            $editor = new TextAreaEdit('nombre_paren_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nombre Paren', 'nombre_paren', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for nombre_paren field
            //
            $editor = new TextAreaEdit('nombre_paren_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nombre Paren', 'nombre_paren', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for estado field
            //
            $column = new TextViewColumn('enlace_dos_estado', 'Enlace Dos', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for enlace_dos field
            //
            $editor = new ComboBox('enlace_dos_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."perfiles"');
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('estado');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('nombre');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('tipo_documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('nivel_academico');
            $lookupDataset->AddField($field, false);
            $field = new StringField('especialidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento_comprobante');
            $lookupDataset->AddField($field, false);
            $field = new StringField('direccion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('telefono');
            $lookupDataset->AddField($field, false);
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_civil');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('edad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_F');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('parentesco');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_de_nac');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('evaluacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idioma');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('estado', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Enlace Dos', 
                'enlace_dos', 
                $editor, 
                $this->dataset, 'perfil', 'estado', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for enlace_dos field
            //
            $editor = new ComboBox('enlace_dos_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."perfiles"');
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('estado');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('nombre');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('tipo_documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('nivel_academico');
            $lookupDataset->AddField($field, false);
            $field = new StringField('especialidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento_comprobante');
            $lookupDataset->AddField($field, false);
            $field = new StringField('direccion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('telefono');
            $lookupDataset->AddField($field, false);
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_civil');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('edad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_F');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('parentesco');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_de_nac');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('evaluacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idioma');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('estado', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Enlace Dos', 
                'enlace_dos', 
                $editor, 
                $this->dataset, 'perfil', 'estado', $lookupDataset);
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
            // View column for familiar field
            //
            $column = new TextViewColumn('familiar', 'Familiar', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for estado field
            //
            $column = new TextViewColumn('enlace_uno_estado', 'Enlace Uno', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for nombre_paren field
            //
            $column = new TextViewColumn('nombre_paren', 'Nombre Paren', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('nombre_paren_handler');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for estado field
            //
            $column = new TextViewColumn('enlace_dos_estado', 'Enlace Dos', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for familiar field
            //
            $editor = new TextEdit('familiar_edit');
            $editColumn = new CustomEditColumn('Familiar', 'familiar', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for enlace_uno field
            //
            $editor = new ComboBox('enlace_uno_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."perfiles"');
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('estado');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('nombre');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('tipo_documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('nivel_academico');
            $lookupDataset->AddField($field, false);
            $field = new StringField('especialidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento_comprobante');
            $lookupDataset->AddField($field, false);
            $field = new StringField('direccion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('telefono');
            $lookupDataset->AddField($field, false);
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_civil');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('edad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_F');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('parentesco');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_de_nac');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('evaluacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idioma');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('estado', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Enlace Uno', 
                'enlace_uno', 
                $editor, 
                $this->dataset, 'perfil', 'estado', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for nombre_paren field
            //
            $editor = new TextAreaEdit('nombre_paren_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nombre Paren', 'nombre_paren', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for enlace_dos field
            //
            $editor = new ComboBox('enlace_dos_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."perfiles"');
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('estado');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('nombre');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('tipo_documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('nivel_academico');
            $lookupDataset->AddField($field, false);
            $field = new StringField('especialidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento_comprobante');
            $lookupDataset->AddField($field, false);
            $field = new StringField('direccion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('telefono');
            $lookupDataset->AddField($field, false);
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_civil');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('edad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_F');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('parentesco');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_de_nac');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('evaluacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idioma');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('estado', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Enlace Dos', 
                'enlace_dos', 
                $editor, 
                $this->dataset, 'perfil', 'estado', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for familiar field
            //
            $editor = new TextEdit('familiar_edit');
            $editColumn = new CustomEditColumn('Familiar', 'familiar', $editor, $this->dataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for enlace_uno field
            //
            $editor = new ComboBox('enlace_uno_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."perfiles"');
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('estado');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('nombre');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('tipo_documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('nivel_academico');
            $lookupDataset->AddField($field, false);
            $field = new StringField('especialidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento_comprobante');
            $lookupDataset->AddField($field, false);
            $field = new StringField('direccion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('telefono');
            $lookupDataset->AddField($field, false);
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_civil');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('edad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_F');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('parentesco');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_de_nac');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('evaluacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idioma');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('estado', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Enlace Uno', 
                'enlace_uno', 
                $editor, 
                $this->dataset, 'perfil', 'estado', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for nombre_paren field
            //
            $editor = new TextAreaEdit('nombre_paren_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nombre Paren', 'nombre_paren', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for enlace_dos field
            //
            $editor = new ComboBox('enlace_dos_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."perfiles"');
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('estado');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('nombre');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('tipo_documento');
            $lookupDataset->AddField($field, false);
            $field = new StringField('nivel_academico');
            $lookupDataset->AddField($field, false);
            $field = new StringField('especialidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('documento_comprobante');
            $lookupDataset->AddField($field, false);
            $field = new StringField('direccion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('telefono');
            $lookupDataset->AddField($field, false);
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_civil');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('edad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado_F');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('parentesco');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_de_nac');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('evaluacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idioma');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('estado', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Enlace Dos', 
                'enlace_dos', 
                $editor, 
                $this->dataset, 'perfil', 'estado', $lookupDataset);
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
            // View column for familiar field
            //
            $column = new TextViewColumn('familiar', 'Familiar', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for estado field
            //
            $column = new TextViewColumn('enlace_uno_estado', 'Enlace Uno', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for nombre_paren field
            //
            $column = new TextViewColumn('nombre_paren', 'Nombre Paren', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for estado field
            //
            $column = new TextViewColumn('enlace_dos_estado', 'Enlace Dos', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for familiar field
            //
            $column = new TextViewColumn('familiar', 'Familiar', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for estado field
            //
            $column = new TextViewColumn('enlace_uno_estado', 'Enlace Uno', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for nombre_paren field
            //
            $column = new TextViewColumn('nombre_paren', 'Nombre Paren', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for estado field
            //
            $column = new TextViewColumn('enlace_dos_estado', 'Enlace Dos', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'public_familiares_x_perfil_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'public_familiares_x_perfilGrid');
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
            // View column for nombre_paren field
            //
            $column = new TextViewColumn('nombre_paren', 'Nombre Paren', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for nombre_paren field
            //
            $editor = new TextAreaEdit('nombre_paren_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nombre Paren', 'nombre_paren', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for nombre_paren field
            //
            $editor = new TextAreaEdit('nombre_paren_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nombre Paren', 'nombre_paren', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'nombre_paren_handler', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for nombre_paren field
            //
            $column = new TextViewColumn('nombre_paren', 'Nombre Paren', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'nombre_paren_handler', $column);
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
        $Page = new public_familiares_x_perfilPage("public.familiares_x_perfil.php", "public_familiares_x_perfil", GetCurrentUserGrantForDataSource("public.familiares_x_perfil"), 'UTF-8');
        $Page->SetShortCaption('Public.Familiares X Perfil');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('Public.Familiares X Perfil');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("public.familiares_x_perfil"));
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
	
