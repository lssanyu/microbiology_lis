@section ("reportHeader")
    <style type="text/css">
    </style>
    <table style="text-align:center;">
            <tr>
                <td colspan="12"></td>
            </tr>
            <tr>
            <td colspan="2" style="text-align:left;">
                {{ HTML::image(Config::get('kblis.organization-logo'),  Config::get('kblis.country') . trans('messages.court-of-arms'), ['height' => '120', 'width' => '120']) }}</td>
            <td colspan="8">
                    <span style="font-size:12px;"><b>Uganda National Health Laboratory Services | UNHLS,</b></span><br>
                    <b>Central Public Health Laboratories | CPHL,</b><br>
                    {{ Config::get('kblis.organization') }},<br>
                    {{ Config::get('kblis.address-info') }}<br>
                    {{ trans('messages.laboratory-report')}}<br>
                </td>
            <td  colspan="2" style="text-align:right;">
                {{ HTML::image(Config::get('kblis.cphl-logo'),  Config::get('kblis.country') . trans('messages.court-of-arms'), ['height' => '120', 'width' => '120']) }}</td>
            </tr>
    </table>
@show