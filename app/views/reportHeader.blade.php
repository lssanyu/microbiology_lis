@section ("reportHeader")
    <table width="100%" style="font-size:12px;">
        <thead>
            <tr>
                <td>{{ HTML::image(Config::get('kblis.organization-logo'),  Config::get('kblis.country') . trans('messages.court-of-arms'), array('width' => '90px')) }}</td>
                <td style="text-align:center;">
                    <h3>Uganda National Health Laboratory Services | UNHLS</h3>
                    <strong>Central Public Health Laboratories | CPHL</strong><br>
                    {{ Config::get('kblis.organization') }}<br>
                    {{ Config::get('kblis.address-info') }}</br>
                    {{ trans('messages.laboratory-report')}}<br>
                </td>
                <td>{{ HTML::image(Config::get('kblis.cphl-logo'),  Config::get('kblis.country') . trans('messages.court-of-arms'), array('width' => '90px')) }}</td>
            </tr>
        </thead>
    </table>
@show