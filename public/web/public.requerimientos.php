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
    
    
    
    class public_requerimientos_x_cursos_disponiblesDetailView0public_requerimientosPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."requerimientos_x_cursos_disponibles"');
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('cursoD');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('titulo');
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('requerimiento', 'public.requerimientos', new IntegerField('requerimiento'), new StringField('cargo', 'requerimiento_cargo', 'requerimiento_cargo_public_requerimientos'), 'requerimiento_cargo_public_requerimientos');
            $this->dataset->AddLookupField('cursoD', 'public.cursos_disponibles', new IntegerField('cod_curso'), new StringField('titulo', 'cursoD_titulo', 'cursoD_titulo_public_cursos_disponibles'), 'cursoD_titulo_public_cursos_disponibles');
        }
    
        protected function AddFieldColumns(Grid $grid)
        {
            //
            // View column for cargo field
            //
            $column = new TextViewColumn('requerimiento_cargo', 'Requerimiento', $this->dataset);
            $column->SetOrderable(false);
            
            /* <inline edit column> */
            //
            // Edit column for requerimiento field
            //
            $editor = new ComboBox('requerimiento_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."requerimientos"');
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('titulo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('visa');
            $lookupDataset->AddField($field, false);
            $field = new DateField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('pais');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('cargo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Requerimiento', 
                'requerimiento', 
                $editor, 
                $this->dataset, 'requerimiento', 'cargo', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for requerimiento field
            //
            $editor = new ComboBox('requerimiento_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."requerimientos"');
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('titulo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('visa');
            $lookupDataset->AddField($field, false);
            $field = new DateField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('pais');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('cargo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Requerimiento', 
                'requerimiento', 
                $editor, 
                $this->dataset, 'requerimiento', 'cargo', $lookupDataset);
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
            $column = new TextViewColumn('cursoD_titulo', 'CursoD', $this->dataset);
            $column->SetOrderable(false);
            
            /* <inline edit column> */
            //
            // Edit column for cursoD field
            //
            $editor = new ComboBox('cursod_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."cursos_disponibles"');
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
            $field = new StringField('lugar');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('costo');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'CursoD', 
                'cursoD', 
                $editor, 
                $this->dataset, 'cod_curso', 'titulo', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for cursoD field
            //
            $editor = new ComboBox('cursod_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."cursos_disponibles"');
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
            $field = new StringField('lugar');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('costo');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'CursoD', 
                'cursoD', 
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
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
            $column->SetOrderable(false);
            
            /* <inline edit column> */
            //
            // Edit column for titulo field
            //
            $editor = new TextEdit('titulo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for titulo field
            //
            $editor = new TextEdit('titulo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
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
            $result = new Grid($this, $this->dataset, 'public_requerimientos_x_cursos_disponiblesDetailViewGrid0public_requerimientos');
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
    
    
    
    class public_requerimientos_x_cursos_disponiblesDetailEdit0public_requerimientosPage extends DetailPageEdit
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."requerimientos_x_cursos_disponibles"');
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('cursoD');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('titulo');
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('requerimiento', 'public.requerimientos', new IntegerField('requerimiento'), new StringField('cargo', 'requerimiento_cargo', 'requerimiento_cargo_public_requerimientos'), 'requerimiento_cargo_public_requerimientos');
            $this->dataset->AddLookupField('cursoD', 'public.cursos_disponibles', new IntegerField('cod_curso'), new StringField('titulo', 'cursoD_titulo', 'cursoD_titulo_public_cursos_disponibles'), 'cursoD_titulo_public_cursos_disponibles');
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
            $grid->SearchControl = new SimpleSearch('public_requerimientos_x_cursos_disponiblesDetailEdit0public_requerimientosssearch', $this->dataset,
                array('requerimiento_cargo', 'cursoD_titulo', 'titulo'),
                array($this->RenderText('Requerimiento'), $this->RenderText('CursoD'), $this->RenderText('Titulo')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('public_requerimientos_x_cursos_disponiblesDetailEdit0public_requerimientosasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->setTimerInterval(1000);
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."requerimientos"');
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('titulo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('visa');
            $lookupDataset->AddField($field, false);
            $field = new DateField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('pais');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('requerimiento', $this->RenderText('Requerimiento'), $lookupDataset, 'requerimiento', 'cargo', false));
            
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."cursos_disponibles"');
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
            $field = new StringField('lugar');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('costo');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('cursoD', $this->RenderText('CursoD'), $lookupDataset, 'cod_curso', 'titulo', false));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('titulo', $this->RenderText('Titulo')));
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
            // View column for cargo field
            //
            $column = new TextViewColumn('requerimiento_cargo', 'Requerimiento', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for requerimiento field
            //
            $editor = new ComboBox('requerimiento_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."requerimientos"');
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('titulo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('visa');
            $lookupDataset->AddField($field, false);
            $field = new DateField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('pais');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('cargo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Requerimiento', 
                'requerimiento', 
                $editor, 
                $this->dataset, 'requerimiento', 'cargo', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for requerimiento field
            //
            $editor = new ComboBox('requerimiento_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."requerimientos"');
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('titulo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('visa');
            $lookupDataset->AddField($field, false);
            $field = new DateField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('pais');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('cargo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Requerimiento', 
                'requerimiento', 
                $editor, 
                $this->dataset, 'requerimiento', 'cargo', $lookupDataset);
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
            $column = new TextViewColumn('cursoD_titulo', 'CursoD', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for cursoD field
            //
            $editor = new ComboBox('cursod_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."cursos_disponibles"');
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
            $field = new StringField('lugar');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('costo');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'CursoD', 
                'cursoD', 
                $editor, 
                $this->dataset, 'cod_curso', 'titulo', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for cursoD field
            //
            $editor = new ComboBox('cursod_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."cursos_disponibles"');
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
            $field = new StringField('lugar');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('costo');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'CursoD', 
                'cursoD', 
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
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for titulo field
            //
            $editor = new TextEdit('titulo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for titulo field
            //
            $editor = new TextEdit('titulo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
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
            // View column for cargo field
            //
            $column = new TextViewColumn('requerimiento_cargo', 'Requerimiento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('cursoD_titulo', 'CursoD', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for requerimiento field
            //
            $editor = new ComboBox('requerimiento_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."requerimientos"');
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('titulo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('visa');
            $lookupDataset->AddField($field, false);
            $field = new DateField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('pais');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('cargo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Requerimiento', 
                'requerimiento', 
                $editor, 
                $this->dataset, 'requerimiento', 'cargo', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for cursoD field
            //
            $editor = new ComboBox('cursod_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."cursos_disponibles"');
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
            $field = new StringField('lugar');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('costo');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'CursoD', 
                'cursoD', 
                $editor, 
                $this->dataset, 'cod_curso', 'titulo', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for titulo field
            //
            $editor = new TextEdit('titulo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for requerimiento field
            //
            $editor = new ComboBox('requerimiento_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."requerimientos"');
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('cargo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('titulo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('visa');
            $lookupDataset->AddField($field, false);
            $field = new DateField('antiguedad');
            $lookupDataset->AddField($field, false);
            $field = new StringField('pais');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('cargo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Requerimiento', 
                'requerimiento', 
                $editor, 
                $this->dataset, 'requerimiento', 'cargo', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for cursoD field
            //
            $editor = new ComboBox('cursod_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."cursos_disponibles"');
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
            $field = new StringField('lugar');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
            $lookupDataset->AddField($field, false);
            $field = new StringField('costo');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('titulo', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'CursoD', 
                'cursoD', 
                $editor, 
                $this->dataset, 'cod_curso', 'titulo', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for titulo field
            //
            $editor = new TextEdit('titulo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
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
            // View column for cargo field
            //
            $column = new TextViewColumn('requerimiento_cargo', 'Requerimiento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('cursoD_titulo', 'CursoD', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for cargo field
            //
            $column = new TextViewColumn('requerimiento_cargo', 'Requerimiento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('cursoD_titulo', 'CursoD', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'public_requerimientos_x_cursos_disponiblesDetailEdit0public_requerimientos_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'public_requerimientos_x_cursos_disponiblesDetailEditGrid0public_requerimientos');
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
    
    
    
    class public_requerimientosPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new PgConnectionFactory(),
                GetConnectionOptions(),
                '"public"."requerimientos"');
            $field = new IntegerField('requerimiento');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('cargo');
            $this->dataset->AddField($field, false);
            $field = new StringField('titulo');
            $this->dataset->AddField($field, false);
            $field = new StringField('visa');
            $this->dataset->AddField($field, false);
            $field = new DateField('antiguedad');
            $this->dataset->AddField($field, false);
            $field = new StringField('pais');
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('fecha_creacion');
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('fecha_modificacion');
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
            $grid->SearchControl = new SimpleSearch('public_requerimientosssearch', $this->dataset,
                array('requerimiento', 'cargo', 'titulo', 'visa', 'antiguedad', 'pais', 'fecha_creacion', 'fecha_modificacion'),
                array($this->RenderText('Requerimiento'), $this->RenderText('Cargo'), $this->RenderText('Titulo'), $this->RenderText('Visa'), $this->RenderText('Antiguedad'), $this->RenderText('Pais'), $this->RenderText('Fecha Creacion'), $this->RenderText('Fecha Modificacion')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('public_requerimientosasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->setTimerInterval(1000);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('requerimiento', $this->RenderText('Requerimiento')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('cargo', $this->RenderText('Cargo')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('titulo', $this->RenderText('Titulo')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('visa', $this->RenderText('Visa')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('antiguedad', $this->RenderText('Antiguedad')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('pais', $this->RenderText('Pais')));
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
            if (GetCurrentUserGrantForDataSource('public.requerimientos.public.requerimientos_x_cursos_disponibles')->HasViewGrant())
            {
              //
            // View column for public_requerimientos_x_cursos_disponiblesDetailView0public_requerimientos detail
            //
            $column = new DetailColumn(array('requerimiento'), 'detail0public_requerimientos', 'public_requerimientos_x_cursos_disponiblesDetailEdit0public_requerimientos_handler', 'public_requerimientos_x_cursos_disponiblesDetailView0public_requerimientos_handler', $this->dataset, 'Public.Requerimientos X Cursos Disponibles', $this->RenderText('Public.Requerimientos X Cursos Disponibles'));
              $grid->AddViewColumn($column);
            }
            
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
            // View column for cargo field
            //
            $column = new TextViewColumn('cargo', 'Cargo', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for cargo field
            //
            $editor = new TextEdit('cargo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Cargo', 'cargo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for cargo field
            //
            $editor = new TextEdit('cargo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Cargo', 'cargo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
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
            
            /* <inline edit column> */
            //
            // Edit column for titulo field
            //
            $editor = new TextEdit('titulo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for titulo field
            //
            $editor = new TextEdit('titulo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for visa field
            //
            $column = new TextViewColumn('visa', 'Visa', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for visa field
            //
            $editor = new TextEdit('visa_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Visa', 'visa', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for visa field
            //
            $editor = new TextEdit('visa_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Visa', 'visa', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for antiguedad field
            //
            $column = new DateTimeViewColumn('antiguedad', 'Antiguedad', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for antiguedad field
            //
            $editor = new DateTimeEdit('antiguedad_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Antiguedad', 'antiguedad', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for antiguedad field
            //
            $editor = new DateTimeEdit('antiguedad_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Antiguedad', 'antiguedad', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for pais field
            //
            $column = new TextViewColumn('pais', 'Pais', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for pais field
            //
            $editor = new TextEdit('pais_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Pais', 'pais', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for pais field
            //
            $editor = new TextEdit('pais_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Pais', 'pais', $editor, $this->dataset);
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
            // View column for requerimiento field
            //
            $column = new TextViewColumn('requerimiento', 'Requerimiento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for cargo field
            //
            $column = new TextViewColumn('cargo', 'Cargo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for visa field
            //
            $column = new TextViewColumn('visa', 'Visa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for antiguedad field
            //
            $column = new DateTimeViewColumn('antiguedad', 'Antiguedad', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for pais field
            //
            $column = new TextViewColumn('pais', 'Pais', $this->dataset);
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
            // Edit column for requerimiento field
            //
            $editor = new TextEdit('requerimiento_edit');
            $editColumn = new CustomEditColumn('Requerimiento', 'requerimiento', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for cargo field
            //
            $editor = new TextEdit('cargo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Cargo', 'cargo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for titulo field
            //
            $editor = new TextEdit('titulo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for visa field
            //
            $editor = new TextEdit('visa_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Visa', 'visa', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for antiguedad field
            //
            $editor = new DateTimeEdit('antiguedad_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Antiguedad', 'antiguedad', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for pais field
            //
            $editor = new TextEdit('pais_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Pais', 'pais', $editor, $this->dataset);
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
            // Edit column for requerimiento field
            //
            $editor = new TextEdit('requerimiento_edit');
            $editColumn = new CustomEditColumn('Requerimiento', 'requerimiento', $editor, $this->dataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for cargo field
            //
            $editor = new TextEdit('cargo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Cargo', 'cargo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for titulo field
            //
            $editor = new TextEdit('titulo_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Titulo', 'titulo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for visa field
            //
            $editor = new TextEdit('visa_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Visa', 'visa', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for antiguedad field
            //
            $editor = new DateTimeEdit('antiguedad_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Antiguedad', 'antiguedad', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for pais field
            //
            $editor = new TextEdit('pais_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Pais', 'pais', $editor, $this->dataset);
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
            // View column for requerimiento field
            //
            $column = new TextViewColumn('requerimiento', 'Requerimiento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for cargo field
            //
            $column = new TextViewColumn('cargo', 'Cargo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for visa field
            //
            $column = new TextViewColumn('visa', 'Visa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for antiguedad field
            //
            $column = new DateTimeViewColumn('antiguedad', 'Antiguedad', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for pais field
            //
            $column = new TextViewColumn('pais', 'Pais', $this->dataset);
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
            // View column for requerimiento field
            //
            $column = new TextViewColumn('requerimiento', 'Requerimiento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for cargo field
            //
            $column = new TextViewColumn('cargo', 'Cargo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for visa field
            //
            $column = new TextViewColumn('visa', 'Visa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for antiguedad field
            //
            $column = new DateTimeViewColumn('antiguedad', 'Antiguedad', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for pais field
            //
            $column = new TextViewColumn('pais', 'Pais', $this->dataset);
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
    
        function CreateMasterDetailRecordGridForpublic_requerimientos_x_cursos_disponiblesDetailEdit0public_requerimientosGrid()
        {
            $result = new Grid($this, $this->dataset, 'MasterDetailRecordGridForpublic_requerimientos_x_cursos_disponiblesDetailEdit0public_requerimientos');
            $result->SetAllowDeleteSelected(false);
            $result->SetShowFilterBuilder(false);
            $result->SetAdvancedSearchAvailable(false);
            $result->SetFilterRowAvailable(false);
            $result->SetShowUpdateLink(false);
            $result->SetEnabledInlineEditing(false);
            $result->SetName('master_grid');
            //
            // View column for requerimiento field
            //
            $column = new TextViewColumn('requerimiento', 'Requerimiento', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for cargo field
            //
            $column = new TextViewColumn('cargo', 'Cargo', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for visa field
            //
            $column = new TextViewColumn('visa', 'Visa', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for antiguedad field
            //
            $column = new DateTimeViewColumn('antiguedad', 'Antiguedad', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $result->AddViewColumn($column);
            
            //
            // View column for pais field
            //
            $column = new TextViewColumn('pais', 'Pais', $this->dataset);
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
            // View column for requerimiento field
            //
            $column = new TextViewColumn('requerimiento', 'Requerimiento', $this->dataset);
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for cargo field
            //
            $column = new TextViewColumn('cargo', 'Cargo', $this->dataset);
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for titulo field
            //
            $column = new TextViewColumn('titulo', 'Titulo', $this->dataset);
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for visa field
            //
            $column = new TextViewColumn('visa', 'Visa', $this->dataset);
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for antiguedad field
            //
            $column = new DateTimeViewColumn('antiguedad', 'Antiguedad', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $result->AddPrintColumn($column);
            
            //
            // View column for pais field
            //
            $column = new TextViewColumn('pais', 'Pais', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'public_requerimientos_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'public_requerimientosGrid');
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
            $pageView = new public_requerimientos_x_cursos_disponiblesDetailView0public_requerimientosPage($this, 'Public.Requerimientos X Cursos Disponibles', 'Public.Requerimientos X Cursos Disponibles', array('requerimiento'), GetCurrentUserGrantForDataSource('public.requerimientos.public.requerimientos_x_cursos_disponibles'), 'UTF-8', 20, 'public_requerimientos_x_cursos_disponiblesDetailEdit0public_requerimientos_handler');
            
            $pageView->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('public.requerimientos.public.requerimientos_x_cursos_disponibles'));
            $handler = new PageHTTPHandler('public_requerimientos_x_cursos_disponiblesDetailView0public_requerimientos_handler', $pageView);
            GetApplication()->RegisterHTTPHandler($handler);
            $pageEdit = new public_requerimientos_x_cursos_disponiblesDetailEdit0public_requerimientosPage($this, array('requerimiento'), array('requerimiento'), $this->GetForeingKeyFields(), $this->CreateMasterDetailRecordGridForpublic_requerimientos_x_cursos_disponiblesDetailEdit0public_requerimientosGrid(), $this->dataset, GetCurrentUserGrantForDataSource('public.requerimientos.public.requerimientos_x_cursos_disponibles'), 'UTF-8');
            
            $pageEdit->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('public.requerimientos.public.requerimientos_x_cursos_disponibles'));
            $pageEdit->SetShortCaption('Public.Requerimientos X Cursos Disponibles');
            $pageEdit->SetHeader(GetPagesHeader());
            $pageEdit->SetFooter(GetPagesFooter());
            $pageEdit->SetCaption('Public.Requerimientos X Cursos Disponibles');
            $pageEdit->SetHttpHandlerName('public_requerimientos_x_cursos_disponiblesDetailEdit0public_requerimientos_handler');
            $handler = new PageHTTPHandler('public_requerimientos_x_cursos_disponiblesDetailEdit0public_requerimientos_handler', $pageEdit);
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
        $Page = new public_requerimientosPage("public.requerimientos.php", "public_requerimientos", GetCurrentUserGrantForDataSource("public.requerimientos"), 'UTF-8');
        $Page->SetShortCaption('Public.Requerimientos');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('Public.Requerimientos');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("public.requerimientos"));
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
	
