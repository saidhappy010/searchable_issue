<?php

namespace App\Http\Livewire\Admin\School;

use App\Models\School;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Index extends Component implements HasTable {
    use AuthorizesRequests, InteractsWithTable;
    public $establishment;

    public function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return School::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make( 'name' )
                ->label( __( 'name' ) )
                ->searchable( 'name' ),
            TextColumn::make( 'address' )
                ->label( __( 'address' ) )
                ->searchable(),
            TextColumn::make( 'email' )
                ->label( __( 'email' ) )
                ->searchable( query:function ( Builder $query, string $search ): Builder {

                    // dd( DB::getQueryLog() );
                    return $query;
                    // ->join( 'towns', 'establishments.town_id', '=', 'towns.id' )
                    // ->join( 'cities', 'towns.city_id', '=', 'cities.id' )
                    // ->where( 'cities.name', 'like', "%{$search}%" )->select( 'cities.name', );
                    // dd( $query->toSql() );
                }, ),
            TextColumn::make( 'city.state.name' )
                ->label( __( 'name of state' ) )
                ->searchable(),

        ];
    }

    public function render(): \Illuminate\Contracts\View\Factory | \Illuminate\Contracts\View\View | \Illuminate\Contracts\Foundation\Application
    {

        return view( 'livewire.admin.school.index' );
    }
}
