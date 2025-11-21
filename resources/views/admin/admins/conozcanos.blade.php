<div class="mdc-layout-grid">
<div class="mdc-layout-grid__inner">
    <div class="mdc-layout-grid__cell--span-12">
        <div class="mdc-card">

            @if(Request::routeIs('admin_nuevo_conozca'))
                @include('admin.admins.conozcanos-components.nuevo')
            @elseif(Request::routeIs('admin_public_conozca'))
                @include('admin.admins.conozcanos-components.publicados')
            @elseif(Request::routeIs('admin_servicios_papelera'))
                @include('admin.admins.servicios-components.papelera')
            @elseif(Request::routeIs('admin_individual_conozca'))
                @include('admin.admins.conozcanos-components.individual')
            @elseif(Request::routeIs('admin_papelera_conozca'))
                @include('admin.admins.conozcanos-components.papelera')
            @endif


        </div>
    </div>
</div>
</div>
