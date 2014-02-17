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
    
    
    
    class public_carreras_x_perfilesDetailView0public_carreras_admPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."carreras_x_perfiles"');
            $field = new IntegerField('carrera');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $this->dataset->AddLookupField('carrera', 'public.carreras_adm', new IntegerField('carrera'), new StringField('titulo_cargo', 'carrera_titulo_cargo', 'carrera_titulo_cargo_public_carreras_adm'), 'carrera_titulo_cargo_public_carreras_adm');
            $this->dataset->AddLookupField('perfil', 'public.perfiles', new IntegerField('perfil'), new StringField('estado', 'perfil_estado', 'perfil_estado_public_perfiles'), 'perfil_estado_public_perfiles');
        }
    
        protected function AddFieldColumns(Grid $grid)
        {
            //
            // View column for titulo_cargo field
            //
            $column = new TextViewColumn('carrera_titulo_cargo', 'Carrera', $this->dataset);
            $column->SetOrderable(false);
            
            /* <inline edit column> */
            //
            // Edit column for carrera field
            //
            $editor = new ComboBox('carrera_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."carreras_adm"');
            $field = new IntegerField('carrera');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('titulo_cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('numero_doc');
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
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new StringField('entidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('rubro');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bonificaciones');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo_cargo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Carrera', 
                'carrera', 
                $editor, 
                $this->dataset, 'carrera', 'titulo_cargo', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for carrera field
            //
            $editor = new ComboBox('carrera_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."carreras_adm"');
            $field = new IntegerField('carrera');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('titulo_cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('numero_doc');
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
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new StringField('entidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('rubro');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bonificaciones');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo_cargo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Carrera', 
                'carrera', 
                $editor, 
                $this->dataset, 'carrera', 'titulo_cargo', $lookupDataset);
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
            $column->SetOrderable(false);
            
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
        }
        
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetShowSetToNullCheckBox(false);
        }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'public_carreras_x_perfilesDetailViewGrid0public_carreras_adm');
            $result->SetAllowDeleteSelected(false);
            $result->SetUseFixedHeader(false);
            
            $result->SetShowLineNumbers(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->AddFieldColumns($result);
    
            return $result;
        }
    }
    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class public_carreras_x_perfilesDetailEdit0public_carreras_admPage extends DetailPageEdit
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."carreras_x_perfiles"');
            $field = new IntegerField('carrera');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('perfil');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $this->dataset->AddLookupField('carrera', 'public.carreras_adm', new IntegerField('carrera'), new StringField('titulo_cargo', 'carrera_titulo_cargo', 'carrera_titulo_cargo_public_carreras_adm'), 'carrera_titulo_cargo_public_carreras_adm');
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
            return null;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function CreateGridSearchControl(Grid $grid)
        {
            $grid->UseFilter = true;
            $grid->SearchControl = new SimpleSearch('public_carreras_x_perfilesDetailEdit0public_carreras_admssearch', $this->dataset,
                array('carrera_titulo_cargo', 'perfil_estado'),
                array($this->RenderText('Carrera'), $this->RenderText('Perfil')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('public_carreras_x_perfilesDetailEdit0public_carreras_admasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->setTimerInterval(1000);
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."carreras_adm"');
            $field = new IntegerField('carrera');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('titulo_cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('numero_doc');
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
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new StringField('entidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('rubro');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bonificaciones');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('carrera', $this->RenderText('Carrera'), $lookupDataset, 'carrera', 'titulo_cargo', false));
            
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
        }
    
        public function GetPageDirection()
        {
            return null;
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
            // View column for titulo_cargo field
            //
            $column = new TextViewColumn('carrera_titulo_cargo', 'Carrera', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for carrera field
            //
            $editor = new ComboBox('carrera_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."carreras_adm"');
            $field = new IntegerField('carrera');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('titulo_cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('numero_doc');
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
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new StringField('entidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('rubro');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bonificaciones');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo_cargo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Carrera', 
                'carrera', 
                $editor, 
                $this->dataset, 'carrera', 'titulo_cargo', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for carrera field
            //
            $editor = new ComboBox('carrera_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."carreras_adm"');
            $field = new IntegerField('carrera');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('titulo_cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('numero_doc');
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
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new StringField('entidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('rubro');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bonificaciones');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo_cargo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Carrera', 
                'carrera', 
                $editor, 
                $this->dataset, 'carrera', 'titulo_cargo', $lookupDataset);
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
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for titulo_cargo field
            //
            $column = new TextViewColumn('carrera_titulo_cargo', 'Carrera', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for estado field
            //
            $column = new TextViewColumn('perfil_estado', 'Perfil', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for carrera field
            //
            $editor = new ComboBox('carrera_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."carreras_adm"');
            $field = new IntegerField('carrera');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('titulo_cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('numero_doc');
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
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new StringField('entidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('rubro');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bonificaciones');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo_cargo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Carrera', 
                'carrera', 
                $editor, 
                $this->dataset, 'carrera', 'titulo_cargo', $lookupDataset);
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
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for carrera field
            //
            $editor = new ComboBox('carrera_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."carreras_adm"');
            $field = new IntegerField('carrera');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('titulo_cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('numero_doc');
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
            $field = new StringField('dependencia');
            $lookupDataset->AddField($field, false);
            $field = new StringField('entidad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('rubro');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bonificaciones');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo_cargo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Carrera', 
                'carrera', 
                $editor, 
                $this->dataset, 'carrera', 'titulo_cargo', $lookupDataset);
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
            // View column for titulo_cargo field
            //
            $column = new TextViewColumn('carrera_titulo_cargo', 'Carrera', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for estado field
            //
            $column = new TextViewColumn('perfil_estado', 'Perfil', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for titulo_cargo field
            //
            $column = new TextViewColumn('carrera_titulo_cargo', 'Carrera', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for estado field
            //
            $column = new TextViewColumn('perfil_estado', 'Perfil', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
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
        
        public function GetModalGridDeleteHandler() { return 'public_carreras_x_perfilesDetailEdit0public_carreras_adm_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'public_carreras_x_perfilesDetailEditGrid0public_carreras_adm');
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
    
    // OnBeforePageExecute event handler
    
    
    
    class public_carreras_admPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."carreras_adm"');
            $field = new IntegerField('carrera');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('titulo_cargo');
            $this->dataset->AddField($field, false);
            $field = new StringField('numero_doc');
            $this->dataset->AddField($field, false);
            $field = new DateField('fecha_inicio');
            $this->dataset->AddField($field, false);
            $field = new DateField('fecha_fin');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('usuario');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('archivo');
            $this->dataset->AddField($field, false);
            $field = new StringField('dependencia');
            $this->dataset->AddField($field, false);
            $field = new StringField('entidad');
            $this->dataset->AddField($field, false);
            $field = new StringField('rubro');
            $this->dataset->AddField($field, false);
            $field = new StringField('bonificaciones');
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('usuario', 'public.users', new IntegerField('usuario'), new IntegerField('administrador', 'usuario_administrador', 'usuario_administrador_public_users'), 'usuario_administrador_public_users');
            $this->dataset->AddLookupField('archivo', 'public.archivos', new IntegerField('archivo'), new StringField('tipo_doc', 'archivo_tipo_doc', 'archivo_tipo_doc_public_archivos'), 'archivo_tipo_doc_public_archivos');
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
            $grid->SearchControl = new SimpleSearch('public_carreras_admssearch', $this->dataset,
                array('carrera', 'titulo_cargo', 'numero_doc', 'fecha_inicio', 'fecha_fin', 'usuario_administrador', 'archivo_tipo_doc', 'dependencia', 'entidad', 'rubro', 'bonificaciones', 'fecha_creacion', 'fecha_modificacion'),
                array($this->RenderText('Carrera'), $this->RenderText('Titulo Cargo'), $this->RenderText('Numero Doc'), $this->RenderText('Fecha Inicio'), $this->RenderText('Fecha Fin'), $this->RenderText('Usuario'), $this->RenderText('Archivo'), $this->RenderText('Dependencia'), $this->RenderText('Entidad'), $this->RenderText('Rubro'), $this->RenderText('Bonificaciones'), $this->RenderText('Fecha Creacion'), $this->RenderText('Fecha Modificacion')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('public_carreras_admasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->setTimerInterval(1000);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('carrera', $this->RenderText('Carrera')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('titulo_cargo', $this->RenderText('Titulo Cargo')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('numero_doc', $this->RenderText('Numero Doc')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('fecha_inicio', $this->RenderText('Fecha Inicio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('fecha_fin', $this->RenderText('Fecha Fin')));
            
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."users"');
            $field = new IntegerField('usuario');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('administrador');
            $lookupDataset->AddField($field, false);
            $field = new StringField('user');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('nombre');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('email');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('perfil');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('usuario', $this->RenderText('Usuario'), $lookupDataset, 'usuario', 'administrador', false));
            
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."archivos"');
            $field = new IntegerField('archivo');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('tipo_doc');
            $lookupDataset->AddField($field, false);
            $field = new StringField('adjunto');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('archivo', $this->RenderText('Archivo'), $lookupDataset, 'archivo', 'tipo_doc', false));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('dependencia', $this->RenderText('Dependencia')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('entidad', $this->RenderText('Entidad')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('rubro', $this->RenderText('Rubro')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('bonificaciones', $this->RenderText('Bonificaciones')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('fecha_creacion', $this->RenderText('Fecha Creacion')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('fecha_modificacion', $this->RenderText('Fecha Modificacion')));
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
            if (GetCurrentUserGrantForDataSource('public.carreras_adm.public.carreras_x_perfiles')->HasViewGrant())
            {
              //
            // View column for public_carreras_x_perfilesDetailView0public_carreras_adm detail
            //
            $column = new DetailColumn(array('carrera'), 'detail0public_carreras_adm', 'public_carreras_x_perfilesDetailEdit0public_carreras_adm_handler', 'public_carreras_x_perfilesDetailView0public_carreras_adm_handler', $this->dataset, 'Public.Carreras X Perfiles', $this->RenderText('Public.Carreras X Perfiles'));
              $grid->AddViewColumn($column);
            }
            
            //
            // View column for carrera field
            //
            $column = new TextViewColumn('carrera', 'Carrera', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for carrera field
            //
            $editor = new TextEdit('carrera_edit');
            $editColumn = new CustomEditColumn('Carrera', 'carrera', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for carrera field
            //
            $editor = new TextEdit('carrera_edit');
            $editColumn = new CustomEditColumn('Carrera', 'carrera', $editor, $this->dataset);
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
            // View column for titulo_cargo field
            //
            $column = new TextViewColumn('titulo_cargo', 'Titulo Cargo', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('titulo_cargo_handler');
            
            /* <inline edit column> */
            //
            // Edit column for titulo_cargo field
            //
            $editor = new TextAreaEdit('titulo_cargo_edit', 50, 8);
            $editColumn = new CustomEditColumn('Titulo Cargo', 'titulo_cargo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for titulo_cargo field
            //
            $editor = new TextAreaEdit('titulo_cargo_edit', 50, 8);
            $editColumn = new CustomEditColumn('Titulo Cargo', 'titulo_cargo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for numero_doc field
            //
            $column = new TextViewColumn('numero_doc', 'Numero Doc', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('numero_doc_handler');
            
            /* <inline edit column> */
            //
            // Edit column for numero_doc field
            //
            $editor = new TextAreaEdit('numero_doc_edit', 50, 8);
            $editColumn = new CustomEditColumn('Numero Doc', 'numero_doc', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for numero_doc field
            //
            $editor = new TextAreaEdit('numero_doc_edit', 50, 8);
            $editColumn = new CustomEditColumn('Numero Doc', 'numero_doc', $editor, $this->dataset);
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
            // View column for administrador field
            //
            $column = new TextViewColumn('usuario_administrador', 'Usuario', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for usuario field
            //
            $editor = new ComboBox('usuario_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."users"');
            $field = new IntegerField('usuario');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('administrador');
            $lookupDataset->AddField($field, false);
            $field = new StringField('user');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('nombre');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('email');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('perfil');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('administrador', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Usuario', 
                'usuario', 
                $editor, 
                $this->dataset, 'usuario', 'administrador', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for usuario field
            //
            $editor = new ComboBox('usuario_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."users"');
            $field = new IntegerField('usuario');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('administrador');
            $lookupDataset->AddField($field, false);
            $field = new StringField('user');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('nombre');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('email');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('perfil');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('administrador', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Usuario', 
                'usuario', 
                $editor, 
                $this->dataset, 'usuario', 'administrador', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for tipo_doc field
            //
            $column = new TextViewColumn('archivo_tipo_doc', 'Archivo', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for archivo field
            //
            $editor = new ComboBox('archivo_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."archivos"');
            $field = new IntegerField('archivo');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('tipo_doc');
            $lookupDataset->AddField($field, false);
            $field = new StringField('adjunto');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('tipo_doc', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Archivo', 
                'archivo', 
                $editor, 
                $this->dataset, 'archivo', 'tipo_doc', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for archivo field
            //
            $editor = new ComboBox('archivo_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."archivos"');
            $field = new IntegerField('archivo');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('tipo_doc');
            $lookupDataset->AddField($field, false);
            $field = new StringField('adjunto');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('tipo_doc', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Archivo', 
                'archivo', 
                $editor, 
                $this->dataset, 'archivo', 'tipo_doc', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for dependencia field
            //
            $column = new TextViewColumn('dependencia', 'Dependencia', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for dependencia field
            //
            $editor = new TextEdit('dependencia_edit');
            $editor->SetSize(50);
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Dependencia', 'dependencia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for dependencia field
            //
            $editor = new TextEdit('dependencia_edit');
            $editor->SetSize(50);
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Dependencia', 'dependencia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for entidad field
            //
            $column = new TextViewColumn('entidad', 'Entidad', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for entidad field
            //
            $editor = new TextEdit('entidad_edit');
            $editor->SetSize(50);
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Entidad', 'entidad', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for entidad field
            //
            $editor = new TextEdit('entidad_edit');
            $editor->SetSize(50);
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Entidad', 'entidad', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for rubro field
            //
            $column = new TextViewColumn('rubro', 'Rubro', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for rubro field
            //
            $editor = new TextEdit('rubro_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Rubro', 'rubro', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for rubro field
            //
            $editor = new TextEdit('rubro_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Rubro', 'rubro', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for bonificaciones field
            //
            $column = new TextViewColumn('bonificaciones', 'Bonificaciones', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for bonificaciones field
            //
            $editor = new TextEdit('bonificaciones_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Bonificaciones', 'bonificaciones', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for bonificaciones field
            //
            $editor = new TextEdit('bonificaciones_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Bonificaciones', 'bonificaciones', $editor, $this->dataset);
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
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for carrera field
            //
            $column = new TextViewColumn('carrera', 'Carrera', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for titulo_cargo field
            //
            $column = new TextViewColumn('titulo_cargo', 'Titulo Cargo', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('titulo_cargo_handler');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for numero_doc field
            //
            $column = new TextViewColumn('numero_doc', 'Numero Doc', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('numero_doc_handler');
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
            // View column for administrador field
            //
            $column = new TextViewColumn('usuario_administrador', 'Usuario', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for tipo_doc field
            //
            $column = new TextViewColumn('archivo_tipo_doc', 'Archivo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for dependencia field
            //
            $column = new TextViewColumn('dependencia', 'Dependencia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for entidad field
            //
            $column = new TextViewColumn('entidad', 'Entidad', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for rubro field
            //
            $column = new TextViewColumn('rubro', 'Rubro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for bonificaciones field
            //
            $column = new TextViewColumn('bonificaciones', 'Bonificaciones', $this->dataset);
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
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for carrera field
            //
            $editor = new TextEdit('carrera_edit');
            $editColumn = new CustomEditColumn('Carrera', 'carrera', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for titulo_cargo field
            //
            $editor = new TextAreaEdit('titulo_cargo_edit', 50, 8);
            $editColumn = new CustomEditColumn('Titulo Cargo', 'titulo_cargo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for numero_doc field
            //
            $editor = new TextAreaEdit('numero_doc_edit', 50, 8);
            $editColumn = new CustomEditColumn('Numero Doc', 'numero_doc', $editor, $this->dataset);
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
            // Edit column for usuario field
            //
            $editor = new ComboBox('usuario_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."users"');
            $field = new IntegerField('usuario');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('administrador');
            $lookupDataset->AddField($field, false);
            $field = new StringField('user');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('nombre');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('email');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('perfil');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('administrador', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Usuario', 
                'usuario', 
                $editor, 
                $this->dataset, 'usuario', 'administrador', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for archivo field
            //
            $editor = new ComboBox('archivo_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."archivos"');
            $field = new IntegerField('archivo');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('tipo_doc');
            $lookupDataset->AddField($field, false);
            $field = new StringField('adjunto');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('tipo_doc', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Archivo', 
                'archivo', 
                $editor, 
                $this->dataset, 'archivo', 'tipo_doc', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for dependencia field
            //
            $editor = new TextEdit('dependencia_edit');
            $editor->SetSize(50);
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Dependencia', 'dependencia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for entidad field
            //
            $editor = new TextEdit('entidad_edit');
            $editor->SetSize(50);
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Entidad', 'entidad', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for rubro field
            //
            $editor = new TextEdit('rubro_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Rubro', 'rubro', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for bonificaciones field
            //
            $editor = new TextEdit('bonificaciones_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Bonificaciones', 'bonificaciones', $editor, $this->dataset);
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
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for carrera field
            //
            $editor = new TextEdit('carrera_edit');
            $editColumn = new CustomEditColumn('Carrera', 'carrera', $editor, $this->dataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for titulo_cargo field
            //
            $editor = new TextAreaEdit('titulo_cargo_edit', 50, 8);
            $editColumn = new CustomEditColumn('Titulo Cargo', 'titulo_cargo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for numero_doc field
            //
            $editor = new TextAreaEdit('numero_doc_edit', 50, 8);
            $editColumn = new CustomEditColumn('Numero Doc', 'numero_doc', $editor, $this->dataset);
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
            // Edit column for usuario field
            //
            $editor = new ComboBox('usuario_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."users"');
            $field = new IntegerField('usuario');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('administrador');
            $lookupDataset->AddField($field, false);
            $field = new StringField('user');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('nombre');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('estado');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('email');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('perfil');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('administrador', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Usuario', 
                'usuario', 
                $editor, 
                $this->dataset, 'usuario', 'administrador', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for archivo field
            //
            $editor = new ComboBox('archivo_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."archivos"');
            $field = new IntegerField('archivo');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('tipo_doc');
            $lookupDataset->AddField($field, false);
            $field = new StringField('adjunto');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('tipo_doc', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Archivo', 
                'archivo', 
                $editor, 
                $this->dataset, 'archivo', 'tipo_doc', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for dependencia field
            //
            $editor = new TextEdit('dependencia_edit');
            $editor->SetSize(50);
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Dependencia', 'dependencia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for entidad field
            //
            $editor = new TextEdit('entidad_edit');
            $editor->SetSize(50);
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Entidad', 'entidad', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for rubro field
            //
            $editor = new TextEdit('rubro_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Rubro', 'rubro', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for bonificaciones field
            //
            $editor = new TextEdit('bonificaciones_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Bonificaciones', 'bonificaciones', $editor, $this->dataset);
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
            // View column for carrera field
            //
            $column = new TextViewColumn('carrera', 'Carrera', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for titulo_cargo field
            //
            $column = new TextViewColumn('titulo_cargo', 'Titulo Cargo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for numero_doc field
            //
            $column = new TextViewColumn('numero_doc', 'Numero Doc', $this->dataset);
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
            // View column for administrador field
            //
            $column = new TextViewColumn('usuario_administrador', 'Usuario', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for tipo_doc field
            //
            $column = new TextViewColumn('archivo_tipo_doc', 'Archivo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for dependencia field
            //
            $column = new TextViewColumn('dependencia', 'Dependencia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for entidad field
            //
            $column = new TextViewColumn('entidad', 'Entidad', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for rubro field
            //
            $column = new TextViewColumn('rubro', 'Rubro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for bonificaciones field
            //
            $column = new TextViewColumn('bonificaciones', 'Bonificaciones', $this->dataset);
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
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for carrera field
            //
            $column = new TextViewColumn('carrera', 'Carrera', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for titulo_cargo field
            //
            $column = new TextViewColumn('titulo_cargo', 'Titulo Cargo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for numero_doc field
            //
            $column = new TextViewColumn('numero_doc', 'Numero Doc', $this->dataset);
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
            // View column for administrador field
            //
            $column = new TextViewColumn('usuario_administrador', 'Usuario', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for tipo_doc field
            //
            $column = new TextViewColumn('archivo_tipo_doc', 'Archivo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for dependencia field
            //
            $column = new TextViewColumn('dependencia', 'Dependencia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for entidad field
            //
            $column = new TextViewColumn('entidad', 'Entidad', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for rubro field
            //
            $column = new TextViewColumn('rubro', 'Rubro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for bonificaciones field
            //
            $column = new TextViewColumn('bonificaciones', 'Bonificaciones', $this->dataset);
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
    
        function CreateMasterDetailRecordGridForpublic_carreras_x_perfilesDetailEdit0public_carreras_admGrid()
        {
            $result = new Grid($this, $this->dataset, 'MasterDetailRecordGridForpublic_carreras_x_perfilesDetailEdit0public_carreras_adm');
            $result->SetAllowDeleteSelected(false);
            $result->SetShowFilterBuilder(false);
            $result->SetAdvancedSearchAvailable(false);
            $result->SetFilterRowAvailable(false);
            $result->SetShowUpdateLink(false);
            $result->SetEnabledInlineEditing(false);
            $result->SetName('master_grid');
            //
            // View column for carrera field
            //
            $column = new TextViewColumn('carrera', 'Carrera', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for titulo_cargo field
            //
            $column = new TextViewColumn('titulo_cargo', 'Titulo Cargo', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('titulo_cargo_handler');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for numero_doc field
            //
            $column = new TextViewColumn('numero_doc', 'Numero Doc', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('numero_doc_handler');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for fecha_inicio field
            //
            $column = new DateTimeViewColumn('fecha_inicio', 'Fecha Inicio', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for fecha_fin field
            //
            $column = new DateTimeViewColumn('fecha_fin', 'Fecha Fin', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for administrador field
            //
            $column = new TextViewColumn('usuario_administrador', 'Usuario', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for tipo_doc field
            //
            $column = new TextViewColumn('archivo_tipo_doc', 'Archivo', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for dependencia field
            //
            $column = new TextViewColumn('dependencia', 'Dependencia', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for entidad field
            //
            $column = new TextViewColumn('entidad', 'Entidad', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for rubro field
            //
            $column = new TextViewColumn('rubro', 'Rubro', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for bonificaciones field
            //
            $column = new TextViewColumn('bonificaciones', 'Bonificaciones', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for fecha_creacion field
            //
            $column = new DateTimeViewColumn('fecha_creacion', 'Fecha Creacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for fecha_modificacion field
            //
            $column = new DateTimeViewColumn('fecha_modificacion', 'Fecha Modificacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for carrera field
            //
            $column = new TextViewColumn('carrera', 'Carrera', $this->dataset);
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for titulo_cargo field
            //
            $column = new TextViewColumn('titulo_cargo', 'Titulo Cargo', $this->dataset);
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for numero_doc field
            //
            $column = new TextViewColumn('numero_doc', 'Numero Doc', $this->dataset);
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for fecha_inicio field
            //
            $column = new DateTimeViewColumn('fecha_inicio', 'Fecha Inicio', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for fecha_fin field
            //
            $column = new DateTimeViewColumn('fecha_fin', 'Fecha Fin', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for administrador field
            //
            $column = new TextViewColumn('usuario_administrador', 'Usuario', $this->dataset);
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for tipo_doc field
            //
            $column = new TextViewColumn('archivo_tipo_doc', 'Archivo', $this->dataset);
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for dependencia field
            //
            $column = new TextViewColumn('dependencia', 'Dependencia', $this->dataset);
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for entidad field
            //
            $column = new TextViewColumn('entidad', 'Entidad', $this->dataset);
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for rubro field
            //
            $column = new TextViewColumn('rubro', 'Rubro', $this->dataset);
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for bonificaciones field
            //
            $column = new TextViewColumn('bonificaciones', 'Bonificaciones', $this->dataset);
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for fecha_creacion field
            //
            $column = new DateTimeViewColumn('fecha_creacion', 'Fecha Creacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for fecha_modificacion field
            //
            $column = new DateTimeViewColumn('fecha_modificacion', 'Fecha Modificacion', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            return $result;
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
        
        public function GetModalGridDeleteHandler() { return 'public_carreras_adm_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'public_carreras_admGrid');
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
            $pageView = new public_carreras_x_perfilesDetailView0public_carreras_admPage($this, 'Public.Carreras X Perfiles', 'Public.Carreras X Perfiles', array('carrera'), GetCurrentUserGrantForDataSource('public.carreras_adm.public.carreras_x_perfiles'), 'UTF-8', 20, 'public_carreras_x_perfilesDetailEdit0public_carreras_adm_handler');
            
            $pageView->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('public.carreras_adm.public.carreras_x_perfiles'));
            $handler = new PageHTTPHandler('public_carreras_x_perfilesDetailView0public_carreras_adm_handler', $pageView);
            GetApplication()->RegisterHTTPHandler($handler);
            $pageEdit = new public_carreras_x_perfilesDetailEdit0public_carreras_admPage($this, array('carrera'), array('carrera'), $this->GetForeingKeyFields(), $this->CreateMasterDetailRecordGridForpublic_carreras_x_perfilesDetailEdit0public_carreras_admGrid(), $this->dataset, GetCurrentUserGrantForDataSource('public.carreras_adm.public.carreras_x_perfiles'), 'UTF-8');
            
            $pageEdit->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('public.carreras_adm.public.carreras_x_perfiles'));
            $pageEdit->SetShortCaption('Public.Carreras X Perfiles');
            $pageEdit->SetHeader(GetPagesHeader());
            $pageEdit->SetFooter(GetPagesFooter());
            $pageEdit->SetCaption('Public.Carreras X Perfiles');
            $pageEdit->SetHttpHandlerName('public_carreras_x_perfilesDetailEdit0public_carreras_adm_handler');
            $handler = new PageHTTPHandler('public_carreras_x_perfilesDetailEdit0public_carreras_adm_handler', $pageEdit);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for titulo_cargo field
            //
            $column = new TextViewColumn('titulo_cargo', 'Titulo Cargo', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for titulo_cargo field
            //
            $editor = new TextAreaEdit('titulo_cargo_edit', 50, 8);
            $editColumn = new CustomEditColumn('Titulo Cargo', 'titulo_cargo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for titulo_cargo field
            //
            $editor = new TextAreaEdit('titulo_cargo_edit', 50, 8);
            $editColumn = new CustomEditColumn('Titulo Cargo', 'titulo_cargo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'titulo_cargo_handler', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for numero_doc field
            //
            $column = new TextViewColumn('numero_doc', 'Numero Doc', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for numero_doc field
            //
            $editor = new TextAreaEdit('numero_doc_edit', 50, 8);
            $editColumn = new CustomEditColumn('Numero Doc', 'numero_doc', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for numero_doc field
            //
            $editor = new TextAreaEdit('numero_doc_edit', 50, 8);
            $editColumn = new CustomEditColumn('Numero Doc', 'numero_doc', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'numero_doc_handler', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for titulo_cargo field
            //
            $column = new TextViewColumn('titulo_cargo', 'Titulo Cargo', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'titulo_cargo_handler', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for numero_doc field
            //
            $column = new TextViewColumn('numero_doc', 'Numero Doc', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'numero_doc_handler', $column);
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
        $Page = new public_carreras_admPage("public.carreras_adm.php", "public_carreras_adm", GetCurrentUserGrantForDataSource("public.carreras_adm"), 'UTF-8');
        $Page->SetShortCaption('Public.Carreras Adm');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('Public.Carreras Adm');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("public.carreras_adm"));
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
	