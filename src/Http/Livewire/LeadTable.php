<?php

namespace Osoobe\CRM\Http\Livewire;

use Osoobe\CRM\Models\Lead;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

class LeadTable extends PowerGridComponent
{
    public string $name = 'Leads';
    public string $tableName = 'Leads';
    public bool $showExporting = true;
    public bool $hasLazyEnabled = false;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput()
                ->showToggleColumns(),
            PowerGrid::exportable($this->tableName)
                ->stripTags(true)
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            PowerGrid::footer()
                ->showPerPage(perPage: 10, perPageValues: [10, 25, 50, 100])
                ->showRecordCount()
        ];
    }

    public function datasource(): Builder
    {
        return Lead::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('created_at_formatted', function(Lead $model) {
                return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
            })
            ->add('updated_at_formatted', function(Lead $model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id', 'id')
                ->sortable()
                ->searchable()
                ->hidden(true, false),
            Column::make('Name', 'name', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Category', 'category', 'category')
                ->sortable()
                ->searchable(),
            Column::make('Lead Type', 'lead_type', 'lead_type')
                ->sortable()
                ->searchable(),
            Column::make('Email', 'email', 'email')
                ->sortable()
                ->searchable()
                ->hidden(true, false),
            Column::make('Phone Number', 'phone_number', 'phone_number')
                ->sortable()
                ->searchable(),
            Column::make('Website', 'website', 'website')
                ->sortable()
                ->searchable()
                ->hidden(true, false),
            Column::make('Gender', 'gender', 'gender')
                ->sortable()
                ->searchable()
                ->hidden(true, false),
            Column::make('Country', 'country', 'country')
                ->sortable()
                ->searchable()
                ->hidden(true, false),
            Column::make('Zip Code', 'zip_code', 'zip_code')
                ->sortable()
                ->searchable()
                ->hidden(true, false),
            Column::make('State', 'state', 'state')
                ->sortable()
                ->searchable()
                ->hidden(true, false),
            Column::make('City', 'city', 'city')
                ->sortable()
                ->searchable()
                ->hidden(true, false),
            Column::make('Street Address', 'street_address', 'street_address')
                ->sortable()
                ->searchable()
                ->hidden(true, false),
            Column::make('Status', 'status', 'status')
                ->sortable()
                ->searchable(),
            Column::make('Source', 'source', 'source')
                ->sortable()
                ->searchable()
                ->hidden(true, false),
            Column::make('Created At', 'created_at_formatted', 'created_at')
                ->sortable()
                ->searchable(),
            Column::make('Updated At', 'updated_at_formatted', 'updated_at')
                ->sortable()
                ->searchable(),
        ];
    }

    public function filters(): array
    {
        return [
            Filter::number('id', 'id'),
            Filter::inputText('name', 'name'),
            Filter::inputText('category', 'category'),
            Filter::inputText('lead_type', 'lead_type'),
            Filter::inputText('email', 'email'),
            Filter::inputText('phone_number', 'phone_number'),
            Filter::inputText('website', 'website'),
            Filter::inputText('gender', 'gender'),
            Filter::inputText('country', 'country'),
            Filter::inputText('zip_code', 'zip_code'),
            Filter::inputText('state', 'state'),
            Filter::inputText('city', 'city'),
            Filter::inputText('street_address', 'street_address'),
            Filter::inputText('status', 'status'),
            Filter::inputText('source', 'source'),
            Filter::inputText('created_at_formatted', 'created_at'),
            Filter::inputText('updated_at_formatted', 'updated_at'),
        ];
    }
}
