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
    
    
    
    class public_cursosC_x_perfilesPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."cursosC_x_perfiles"');
            $field = new IntegerField('cursoC');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new DateField('fecha_fin');
            $this->dataset->AddField($field, false);
            $field = new StringField('lugar');
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('cursoC', 'public.cursos_culminados', new IntegerField('cod_curso'), new StringField('titulo', 'cursoC_titulo', 'cursoC_titulo_public_cursos_culminados'), 'cursoC_titulo_public_cursos_culminados');
            $this->dataset->AddLookupField('perfil', 'public.perfiles', new IntegerField('perfil'), new StringField('estado', 'perfil_estado', 'perfil_estado_public_perfiles'), 'perfil_estado_public_perfiles');
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
            if (GetCurrentUserGrantForDataSource('public.carreras_adm')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Carreras Adm'), 'public.carreras_adm.php', $this->RenderText('Public.Carreras Adm'), $currentPageCaption == $this->RenderText('Public.Carreras Adm')));
            if (GetCurrentUserGrantForDataSource('public.perfiles')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Perfiles'), 'public.perfiles.php', $this->RenderText('Public.Perfiles'), $currentPageCaption == $this->RenderText('Public.Perfiles')));
            if (GetCurrentUserGrantForDataSource('public.users')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Users'), 'public.users.php', $this->RenderText('Public.Users'), $currentPageCaption == $this->RenderText('Public.Users')));
            if (GetCurrentUserGrantForDataSource('public.administradores')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Administradores'), 'public.administradores.php', $this->RenderText('Public.administradores'), $currentPageCaption == $this->RenderText('Public.administradores')));
            if (GetCurrentUserGrantForDataSource('public.archivos')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Archivos'), 'public.archivos.php', $this->RenderText('Archivos'), $currentPageCaption == $this->RenderText('Archivos')));
            if (GetCurrentUserGrantForDataSource('public.requerimientos')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Requerimientos'), 'public.requerimientos.php', $this->RenderText('Requerimientos'), $currentPageCaption == $this->RenderText('Requerimientos')));
            if (GetCurrentUserGrantForDataSource('public.cursos_culminados')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Cursos Culminados'), 'public.cursos_culminados.php', $this->RenderText('Cursos Culminados'), $currentPageCaption == $this->RenderText('Cursos Culminados')));
            if (GetCurrentUserGrantForDataSource('public.cursos_disponibles')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Cursos Disponibles'), 'public.cursos_disponibles.php', $this->RenderText('Cursos Disponibles'), $currentPageCaption == $this->RenderText('Cursos Disponibles')));
            if (GetCurrentUserGrantForDataSource('public.carreras_x_perfiles')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Carreras x Perfiles'), 'public.carreras_x_perfiles.php', $this->RenderText('Carreras x Perfiles'), $currentPageCaption == $this->RenderText('Carreras x Perfiles')));
            if (GetCurrentUserGrantForDataSource('public.archivo_x_perfiles')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Archivo x Perfiles'), 'public.archivo_x_perfiles.php', $this->RenderText('Archivo x Perfiles'), $currentPageCaption == $this->RenderText('Archivo x Perfiles')));
            if (GetCurrentUserGrantForDataSource('public.cursosC_x_perfiles')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Cursos Culminados x Perfiles'), 'public.cursosC_x_perfiles.php', $this->RenderText('Cursos Culminados x Perfiles'), $currentPageCaption == $this->RenderText('Cursos Culminados x Perfiles')));
            if (GetCurrentUserGrantForDataSource('public.requerimientos_x_cursos_disponibles')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Requerimientos x Cursos Disponibles'), 'public.requerimientos_x_cursos_disponibles.php', $this->RenderText('Requerimientos x Cursos Disponibles'), $currentPageCaption == $this->RenderText('Requerimientos x Cursos Disponibles')));

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
            $grid->SearchControl = new SimpleSearch('public_cursosC_x_perfilesssearch', $this->dataset,
                array('cursoC_titulo', 'perfil_estado', 'fecha_fin', 'lugar'),
                array($this->RenderText('CursoC'), $this->RenderText('Perfil'), $this->RenderText('Fecha Fin'), $this->RenderText('Lugar')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('public_cursosC_x_perfilesasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->setTimerInterval(1000);
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."cursos_culminados"');
            $field = new IntegerField('cod_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('titulo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('contenido');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_inicio');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_fin');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('usuario');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('archivo');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('calificacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('lugar');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('cursoC', $this->RenderText('CursoC'), $lookupDataset, 'cod_curso', 'titulo', false));
            
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
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('perfil', $this->RenderText('Perfil'), $lookupDataset, 'perfil', 'estado', false));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('fecha_fin', $this->RenderText('Fecha Fin')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('lugar', $this->RenderText('Lugar')));
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actionsBandName = 'actions';
            $grid->AddBandToBegin($actionsBandName, $this->GetLocalizerCaptions()->GetMessageString('Actions'), true);
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
                $column->SetImagePath('images/view_action.png');
            }
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
                $column->SetImagePath('images/edit_action.png');
                $column->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
                $column->SetImagePath('images/delete_action.png');
                $column->OnShow->AddListener('ShowDeleteButtonHandler', $this);
            $column->SetAdditionalAttribute("data-modal-delete", "true");
            $column->SetAdditionalAttribute("data-delete-handler-name", $this->GetModalGridDeleteHandler());
            }
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
                $column->SetImagePath('images/copy_action.png');
            }
        }
    
        protected function AddFieldColumns(Grid $grid)
        {
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('cursoC_titulo', 'CursoC', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for cursoC field
            //
            $editor = new ComboBox('cursoc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."cursos_culminados"');
            $field = new IntegerField('cod_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('titulo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('contenido');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_inicio');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_fin');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('usuario');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('archivo');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('calificacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('lugar');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'CursoC', 
                'cursoC', 
                $editor, 
                $this->dataset, 'cod_curso', 'titulo', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for cursoC field
            //
            $editor = new ComboBox('cursoc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."cursos_culminados"');
            $field = new IntegerField('cod_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('titulo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('contenido');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_inicio');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_fin');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('usuario');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('archivo');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('calificacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('lugar');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'CursoC', 
                'cursoC', 
                $editor, 
                $this->dataset, 'cod_curso', 'titulo', $lookupDataset);
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
            $column = new TextViewColumn('perfil_estado', 'Perfil', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for perfil field
            //
            $editor = new ComboBox('perfil_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
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
            $lookupDataset->SetOrderBy('estado', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Perfil', 
                'perfil', 
                $editor, 
                $this->dataset, 'perfil', 'estado', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for perfil field
            //
            $editor = new ComboBox('perfil_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
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
            $lookupDataset->SetOrderBy('estado', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Perfil', 
                'perfil', 
                $editor, 
                $this->dataset, 'perfil', 'estado', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
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
            $editColumn = new CustomEditColumn('Lugar', 'lugar', $editor, $this->dataset);
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
            // View column for titulo field
            //
            $column = new TextViewColumn('cursoC_titulo', 'CursoC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for estado field
            //
            $column = new TextViewColumn('perfil_estado', 'Perfil', $this->dataset);
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
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for cursoC field
            //
            $editor = new ComboBox('cursoc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."cursos_culminados"');
            $field = new IntegerField('cod_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('titulo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('contenido');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_inicio');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_fin');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('usuario');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('archivo');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('calificacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('lugar');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'CursoC', 
                'cursoC', 
                $editor, 
                $this->dataset, 'cod_curso', 'titulo', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for perfil field
            //
            $editor = new ComboBox('perfil_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
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
            $lookupDataset->SetOrderBy('estado', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Perfil', 
                'perfil', 
                $editor, 
                $this->dataset, 'perfil', 'estado', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
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
            $editColumn = new CustomEditColumn('Lugar', 'lugar', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for cursoC field
            //
            $editor = new ComboBox('cursoc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."cursos_culminados"');
            $field = new IntegerField('cod_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('titulo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('contenido');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_inicio');
            $lookupDataset->AddField($field, false);
            $field = new DateField('fecha_fin');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('usuario');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('archivo');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('calificacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('lugar');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'CursoC', 
                'cursoC', 
                $editor, 
                $this->dataset, 'cod_curso', 'titulo', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for perfil field
            //
            $editor = new ComboBox('perfil_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
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
            $lookupDataset->SetOrderBy('estado', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Perfil', 
                'perfil', 
                $editor, 
                $this->dataset, 'perfil', 'estado', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
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
            $editColumn = new CustomEditColumn('Lugar', 'lugar', $editor, $this->dataset);
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
            // View column for titulo field
            //
            $column = new TextViewColumn('cursoC_titulo', 'CursoC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for estado field
            //
            $column = new TextViewColumn('perfil_estado', 'Perfil', $this->dataset);
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
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('cursoC_titulo', 'CursoC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for estado field
            //
            $column = new TextViewColumn('perfil_estado', 'Perfil', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'public_cursosC_x_perfiles_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'public_cursosC_x_perfilesGrid');
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
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
            $this->SetExportToExcelAvailable(true);
            $this->SetExportToWordAvailable(true);
            $this->SetExportToXmlAvailable(true);
            $this->SetExportToCsvAvailable(true);
            $this->SetExportToPdfAvailable(true);
            $this->SetPrinterFriendlyAvailable(true);
            $this->SetSimpleSearchAvailable(true);
            $this->SetAdvancedSearchAvailable(true);
            $this->SetFilterRowAvailable(true);
            $this->SetVisualEffectsEnabled(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
    
            //
            // Http Handlers
            //
    
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
        $Page = new public_cursosC_x_perfilesPage("public.cursosC_x_perfiles.php", "public_cursosC_x_perfiles", GetCurrentUserGrantForDataSource("public.cursosC_x_perfiles"), 'UTF-8');
        $Page->SetShortCaption('Public.CursosC X Perfiles');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('Public.CursosC X Perfiles');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("public.cursosC_x_perfiles"));
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
	
