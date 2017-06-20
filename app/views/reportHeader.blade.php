@section ("reportHeader")
    <table width="100%" style="font-size:12px;">
        <thead>
            <tr>
                <td style="text-align:center;">
                    {{ HTML::image(Config::get('kblis.organization-logo'),  Config::get('kblis.country') . trans('messages.court-of-arms'), array('width' => '90px')) }}</br>
                    UGANDA NATIONAL HEALTH LABORATORY SERVICES<br>
                    {{ strtoupper(Config::get('kblis.organization')) }}<br>
                    {{ strtoupper(Config::get('kblis.address-info')) }}</br>
                    {{ trans('messages.laboratory-report')}}<br>
                </td>
            </tr>
        </thead>
    </table>
@show