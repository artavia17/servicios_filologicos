<div class="mdc-layout-grid">
<div class="mdc-layout-grid__inner">
    <div class="mdc-layout-grid__cell--span-12">
        <div class="mdc-card">

            @if(Request::routeIs('admin_servicios_portada'))
                @include('admin.admins.servicios-components.portada')
            @elseif(Request::routeIs('admin_servicios_nuevo'))
                @include('admin.admins.servicios-components.nuevo')
            @elseif(Request::routeIs('admin_servicios_public'))
                @include('admin.admins.servicios-components.public')
            @elseif(Request::routeIs('admin_servicios_papelera'))
                @include('admin.admins.servicios-components.papelera')
            @elseif(Request::routeIs('admin_servicios_individual'))
                @include('admin.admins.servicios-components.individual')
            @endif


        </div>
    </div>
</div>
</div>
