<?php

namespace App\Providers;

use App\Models\AgeRange;
use App\Models\AuthorityType;
use App\Models\City;
use App\Models\Establishment;
use App\Models\EstablishmentType;
use App\Models\FrontOfficeDatas;
use App\Models\PopulationType;
use App\Models\Structure;
use App\Models\Town;
use App\Models\User;
use App\Policies\AgeRangePolicy;
use App\Policies\AuthorityTypePolicy;
use App\Policies\CityPolicy;
use App\Policies\EstablishmentPolicy;
use App\Policies\FrontOfficePolicy;
use App\Policies\PopulationTypePolicy;
use App\Policies\StructurePolicy;
use App\Policies\TownPolicy;
use App\Policies\Type_etablissementPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Contracts\Role;

class AuthServiceProvider extends ServiceProvider {
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class              => UserPolicy::class,
        PopulationType::class    => PopulationTypePolicy::class,
        AgeRange::class          => AgeRangePolicy::class,
        City::class              => CityPolicy::class,
        Town::class              => TownPolicy::class,
        EstablishmentType::class => Type_etablissementPolicy::class,
        Structure::class         => StructurePolicy::class,
        AuthorityType::class     => AuthorityTypePolicy::class,
        Establishment::class     => EstablishmentPolicy::class,
        FrontOfficeDatas::class  => FrontOfficePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();

        Gate::define('viewDassDashboard', function(User $user){
            if($user->hasRole("dass-admin")){
             return true ;
            }
        });
        Gate::define('viewSuperDashboard', function(User $user){
            if($user->hasRole("super-admin")){
             return true ;
            }
        });
        Gate::define('viewCentralDashboard', function(User $user){
            if($user->hasRole("central-admin")){
             return true ;
            }
        });
        
    }
}
